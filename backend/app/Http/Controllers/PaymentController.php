<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Checkout\Session as CheckoutSession;
use Stripe\Stripe;
use App\Models\Product;
use App\DTO\Product as ProductDTO;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\Log;

function validateExistingProducts($products)
{
    foreach ($products as $item) {
        if (!Product::find($item['product_id'])) {
            return false;
        }
    }
    return true;
}

function formatLineItems($products)
{
    $all_items = [];
    foreach ($products as $item) {
        $item_info = Product::find($item['product_id']);
        //quanity is a parameter sent by user
        $product = new ProductDTO('pln', $item_info->name, $item_info->cost, $item['quantity']);
        array_push($all_items, $product->getProduct());
    }
    return $all_items;
}

function formatItemsDB($products)
{
    $items =  formatLineItems($products);
    for ($i = 0; $i < count($items); $i++) {
        $items[$i]['price_data']['product_data']['product_id'] = $products[$i]['product_id'];
    }
    return json_encode($items);
}

class PaymentController extends Controller
{
    public function createCheckoutSession(Request $request)
    {
        $user = $request->user();
        $isUser = User::where('id', $user->id)->exists();
        if ($isUser) {
            $request->validate([
                'items.*.quantity' => 'required',
                'items.*.product_id' => 'required'
            ]);
            $product = validateExistingProducts($request->items);
            if ($product) {

                Stripe::setApiKey(config('services.stripe.secret'));

                $session = CheckoutSession::create([
                    'payment_method_types' => ['card', 'blik'],
                    'line_items' => formatLineItems($request->items),
                    'mode' => 'payment',
                    'success_url' => route('payment.success'),
                    'cancel_url' => route('payment.cancel'),
                    'customer_email' => $request->user()->email,
                ]);
                if ($session) {
                    $user = $request->user();
                    $order =  Order::create(['user_id' => $user->id, 'session_id' => $session->id, 'amount' => $session->amount_total, 'currency' => $session->currency, 'payment_status' => $session->payment_status]);
                    foreach ($request->items as $item) {
                        $product = Product::find($item['product_id']);
                        Log::info($product);
                        OrderItem::create(['order_id' => $order->id, 'product_id' => $item['product_id'], 'quantity' => $item['quantity'], 'product_price' => $product->cost]);
                    }
                }
                return response()->json([
                    'id' => $session->id,
                    'url' => $session->url
                ]);
            } else {
                return response()->json([
                    "error_message" => "something went wrong"
                ], 404);
            }
        }
    }
}
