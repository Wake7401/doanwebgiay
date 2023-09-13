<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this -> productService = $productService;
    }

    public function index(){
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('frontend.shop.cart', compact('carts', 'total','subtotal'));
    }

    public function add($id){
        $product = $this -> productService-> find($id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' =>1,
            'price'=> $product->discount ?? $product->price,
            'weight'=> $product->weight ?? 0,
            'options' => [
                'images' => $product->productImages,
            ],
        ]);
        return back();
    }

    public function delete(Request $request)
    {
        if($request -> ajax()){
            $response['cart'] = Cart::remove($request -> rowId);
            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }

        return back();
    }

    public function update(Request $request){
        if($request -> ajax()){
            $response['cart'] = Cart::update($request -> rowId, $request -> qty);
            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }

        return back();
    }
}
