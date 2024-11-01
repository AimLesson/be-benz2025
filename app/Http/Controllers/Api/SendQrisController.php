<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SendQrisController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $qrCodeUrl = $request->input('qr_code_url');
        $amount = number_format($request->input('amount'), 0, ',', '.');  // Format amount
        $phoneNumber = $request->input('phone_number');  // Use passed phone number

        // Initialize cURL to send QR code message
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $phoneNumber,
                'message' => "Silahkan melakukan pembayaran sejumlah: Rp. $amount berikut payment link : $qrCodeUrl",
                'countryCode' => '62',
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . env('FONNTE_TOKEN')
            ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        // Handle any errors in sending the message
        if (isset($error_msg)) {
            Log::error('Fonnte API Error:', ['error' => $error_msg]);
            return response()->json(['message' => 'Failed to send QR code to WhatsApp', 'error' => $error_msg], 500);
        }

        Log::info('Fonnte API Response:', ['response' => $response]);

        // Create or update user based on email
        $user = User::updateOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->nama,
                'alamat' => $request->alamat,
                'nomer_whatsapp' => $request->nomer_whatsapp,
                'password' => Hash::make('password'), // Temporary password
            ]
        );

        // Create a new order associated with the user
        $order = Order::create([
            'user_id' => $user->id,
            'price_range' => $request->price_range,
            'nik' => $request->nik,
            'gender' => $request->gender,
        ]);

        $invoiceNumber = 'INV-' . time();

        $transaction = Transaction::create([
            'invoice_number' => $invoiceNumber,
            'amount' => $request->amount,
            'status' => 'CREATED',
        ]);

        return response()->json([
            'message' => 'QR code sent to WhatsApp',
            'response' => $response,
            'user' => $user,
            'order' => $order
        ]);
    }
}
