<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\Image;
use App\Repositories\cake\CakeRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    protected $cake;

    public function __construct(CakeRepositoryInterface $cake)
    {
        $this->cake = $cake;
    }

    public function index(Request $request)
    {
        $cart = unserialize($request->cookie('cart')) ? unserialize($request->cookie('cart')) : [];

        $images = $this->cake->getAllCake();

        $sumPrice = 0;

        foreach ($cart as $value) {
            $sumPrice += $value['quanity'] * $value['price'];
        }

        $data = [
            'message' => 'Dat hang thanh cong',
            'total' => count($cart),
            'sumPrice' => number_format($sumPrice) . 'Đ',
            'cart' => $cart
        ];

        return view('pages.Cart', $data);
    }

    public function updateCart(Request $request)
    {
        $cart = unserialize($request->cookie('cart')) ? unserialize($request->cookie('cart')) : [];

            foreach ($request->input('cart') as $key => $quanity)
        {
            if (isset($cart[$key]) && $quanity > 0){
                $cart[$key]['quanity'] = $quanity;
            }else if (isset($cart[$key])){
                unset($cart[$key]);
            }
        }

        $cookie = cookie('cart', serialize($cart), 720);

        return redirect()->route('cart.index')->withCookie($cookie);

    }

    public function deleteCart(Request $request, $id)
    {
        $cart = unserialize($request->cookie('cart')) ? unserialize($request->cookie('cart')) : [];

        if (isset($cart[$id])){
            unset($cart[$id]);
        }
        $cookie = cookie('cart', serialize($cart), 720);

        return redirect()->route('cart.index')->withCookie($cookie);
    }

    public function  deleteAll()
    {
        $cookie = cookie('cart', serialize([]), 720);

        return redirect()->route('cart.index')->withCookie($cookie);
    }

    public function addToCart(Request $request)
    {
        $id = $request->input('id');
        if ($request->ajax() && is_numeric($id)) {
            $cake = $this->cake->find($id);
            $imageCake = $cake->images->first();
            $cart = unserialize($request->cookie('cart')) ? unserialize($request->cookie('cart')) : [];
            if (!array_key_exists($id, $cart)) {
                $cart[$id] = [
                    'name' => $cake->name,
                    'price' => $cake->price,
                    'image' => $imageCake->image ? asset('upload/user/' . $imageCake->image) : asset("deocoanh.jpg"),
                    'quanity' => is_numeric($request->input('quanity')) && $request->input('quanity') > 0 ? $request->input('quanity') : 1
                ];
            } else {
                $cart[$id]['quanity'] += is_numeric($request->input('quanity')) && $request->input('quanity') > 0 ? $request->input('quanity') : 1;
            }

            $cookie = cookie('cart', serialize($cart), 720);

            $sumPrice = 0;

            foreach ($cart as $value) {
                $sumPrice += $value['quanity'] * $value['price'];
            }

            return response()->json([
                'message' => 'Dat hang thanh cong',
                'total' => count($cart),
                'sumPrice' => $sumPrice,
                'cart' => $cart
            ])->withCookie($cookie);
        }
    }

    public function getCart(Request $request)
    {
        $cart = unserialize($request->cookie('cart')) ? unserialize($request->cookie('cart')) : [];

        $sumPrice = 0;

        foreach ($cart as $value) {
            $sumPrice += $value['quanity'] * $value['price'];
        }

        return response()->json([
            'message' => 'Dat hang thanh cong',
            'total' => count($cart),
            'sumPrice' => number_format($sumPrice) . 'Đ',
            'cart' => $cart
        ]);
    }


}
