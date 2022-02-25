<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use http\Env\Response;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->qty,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->image,
                    'color' => $request->color,
                    'size' => $request->size,
                ]
            ]);

            return Response()->json([
                'success' => 'Successfully Added On Your Cart'
            ]);

        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->qty,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->image,
                    'color' => $request->color,
                    'size' => $request->size,
                ]
            ]);

            return Response()->json([
                'success' => 'Successfully Added On Your Cart'
            ]);

        }

    }
}
