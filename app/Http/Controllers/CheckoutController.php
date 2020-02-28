<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Models\Cake;
use App\Models\Image;
use App\Models\Order;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades;
use App\Http\Controllers\admin\CategoryController;
use App\Repositories\cake\CakeRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Mail\OrderConfirmation;

class CheckoutController extends Controller
{
    public function getCheckout(Request $request)
    {
        $cart = unserialize($request->cookie('cart')) ? unserialize($request->cookie('cart')) : [];
        $data['cake'] = [];
        $data['total'] = 0;
        if(count($cart) > 0) {
            $cakes = Cake::whereIn('id', array_keys($cart))->get();
            $total = 0;
            foreach ($cakes as $cake) {
                if (array_key_exists($cake->id, $cart)) {
                    $cake->quanity = $cart[$cake->id]['quanity'];
                    $cake->subtotal = $cake->quanity * $cake->price;
                    $total += $cake->subtotal;

                    if ($cart[$cake->id]['name'] != $cake->name) {
                        $cart[$cake->id]['name'] = $cake->name;
                    }
                } else {
                    unset($cart[$cake->id]);
                }
            }
            $data['cakes'] = $cakes;

            $data['total'] = $total;


        } else{
            return redirect()->route('homepages');

        }
        $cookie = cookie('cart', serialize($cart) , 720);

        return view('pages.Checkout', $data)->withCookie($cookie);
    }

    public function playOrder(Request $request) {
         $cart = unserialize($request->cookie('cart')) ? unserialize($request->cookie('cart')) : [];
         if (count($cart) > 0) {
            $cakes = Cake::whereIn('id', array_keys($cart))->get();


            $cakesID = [];
            foreach($cakes as $cake){
                if (array_key_exists($cake->id, $cart)) {
                    $cakesID[$cake->id] = [
                        'quanity' => $cart[$cake->id]['quanity'],
                        'price' => $cart[$cake->id]['price'],
                    ];
                }
            }
            $sumPrice = 0;
            foreach ($cart as $value) {
            $sumPrice += $value['quanity'] * $value['price'];
            }

            $order = Order::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' =>$request->input('address'),
                'note' => $request->input('note'),
                'user_id' => auth()->check() ? auth()->user()->id : null,
                'total_quanity' => count($cart),
                'total_price' => $sumPrice,
            ]);
            $order->cakes()->sync($cakesID);

            $cookie = cookie('cart', serialize([]) , 720);

            Mail::to($order->email)
                ->send(new OrderConfirmation($order));



            return redirect()->route('thankYou')
                ->with('orderId', $order->id)
                ->withCookie($cookie);
         } else {
            
            return redirect()->route('homepages');
         }

    }

    public function thankYou()
    {
        return view('pages.ThankYou');
    }
}
