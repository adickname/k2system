<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;


class PaymentWebhookController extends Controller
{
    function handleWebhook(Request $request)
    {
        $payload = $request->all();
        $eventType = $payload['type'];

        if ($eventType == 'checkout.session.completed') {

            $order =  Order::where('session_id', $request['data']['object']['id'])->first();
            $order->payment_id = $request['data']['object']['payment_intent'];
            $order->payment_status = $request['data']['object']['payment_status'];
            $order->save();
        }
    }
}
