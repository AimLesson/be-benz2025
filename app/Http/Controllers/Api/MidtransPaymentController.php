<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaction;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MidtransPaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation error',
                'messages' => $validator->errors()
            ], 422);
        }

        $invoiceNumber = 'INV-' . time();

        $transaction = Transaction::create([
            'invoice_number' => $invoiceNumber,
            'amount' => $request->amount,
            'status' => 'CREATED',
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->withBasicAuth(env('MIDTRANS_SERVER_KEY'), '')
            ->post('https://api.sandbox.midtrans.com/v2/charge', [
                'payment_type' => 'qris',
                'transaction_details' => [
                    'order_id' => $transaction->id,
                    'gross_amount' => $transaction->amount,
                ],
            ]);

        if ($response->status() == 201 || $response->status() == 200) {
            $actions = $response->json('actions');
            if (empty($actions)) {
                return response()->json([
                    'message' => $response->json('status_message'),
                    'data' => $transaction,
                ], 500);
            }

            $actionMap = [];
            foreach ($actions as $action) {
                $actionMap[$action['name']] = $action['url'];
            }

            $qrCodeUrl = $actionMap['generate-qr-code'] ?? null;

            $sendQrisRequest = new Request([
                'qr_code_url' => $qrCodeUrl,
                'amount' => $request->amount,
                'phone_number' => $request->phone_number, // Pass phone number here
            ]);
            app(\App\Http\Controllers\Api\SendQrisController::class)->__invoke($sendQrisRequest);
            return response()->json([
                'qr' => $qrCodeUrl,
                'amount' => $request->amount,
            ]);
        }

        Log::error('Failed to create Midtrans transaction', ['response' => $response->body()]);
        return response()->json(['message' => $response->body()], 500);
    }
}
