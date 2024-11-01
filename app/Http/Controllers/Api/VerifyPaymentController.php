<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VerifyPaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Log::info('Incoming payment verification request', ['request_data' => $request->all()]);

        $orderId = $request->order_id;
        $statusCode = $request->status_code;
        $grossAmount = $request->gross_amount;

        $signature = hash('sha512', $orderId . $statusCode . $grossAmount . env('MIDTRANS_SERVER_KEY'));
        Log::info('Generated signature', ['generated_signature' => $signature, 'provided_signature' => $request->signature_key]);

        if ($signature !== $request->signature_key) {
            Log::error('Signature mismatch', ['generated_signature' => $signature, 'provided_signature' => $request->signature_key]);
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid signature',
            ], 400);
        }

        $transaction = Transaction::find($request->order_id);

        if ($transaction) {
            Log::info('Transaction found', ['transaction_id' => $transaction->id]);

            $status = 'PENDING';
            if ($request->transaction_status == 'settlement') {
                $status = 'PAID';
            } elseif ($request->transaction_status == 'expired') {
                $status = 'EXPIRED';
            }

            $transaction->update(['status' => $status]);
            Log::info('Transaction status updated', ['transaction_id' => $transaction->id, 'new_status' => $status]);
        } else {
            Log::warning('Transaction not found', ['order_id' => $request->order_id]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Pembayaran terverifikasi',
        ]);
    }
}
