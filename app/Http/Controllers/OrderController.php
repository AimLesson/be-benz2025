<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\MidtransPaymentController;

class OrderController extends Controller
{
    public function create()
    {
        return view('order.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'nomer_whatsapp' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
            'price_range' => 'required|integer',
        ]);

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

        // Create new order
        $order = Order::create([
            'user_id' => $user->id,
            'price_range' => $request->price_range,
            'nik' => $request->nik,
            'gender' => $request->gender,
        ]);

        // Create an instance of MidtransPaymentController and call its __invoke method directly
        $midtransController = new MidtransPaymentController();

        // Pass the amount in the request format expected by MidtransPaymentController
        $paymentRequest = new Request([
            'amount' => $request->price_range,
            'order_id' => $order->id,
            'phone_number' => $request->nomer_whatsapp,  // Pass phone number here
        ]);

        // Invoke the Midtrans payment processing and capture the response
        $response = $midtransController->__invoke($paymentRequest);

        // Check if the response was successful or had an error
        if ($response->getStatusCode() == 200) {
            // Decode JSON response to get data such as the QR code URL
            $responseData = json_decode($response->getContent(), true);

            return view('order.process-payment', [
                'order_id' => $order->id,
                'amount' => $request->price_range,
                'qr' => $responseData['qr'] ?? null,  // Display the QR code URL in the view if available
            ]);
        }

        return redirect()->back()->withErrors('Failed to initiate payment. Please try again.');
    }
}
