<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $sellerSlug = request()->sellerSlug;
        $quantity = request()->quantity;
        $productSlug = request()->productSlug;
        $catatan = request()->catatan;


        if (!$sellerSlug or !$productSlug) {
            return abort(404);
        }

        $sellers = config("sellers");

        $foundSeller = array_filter($sellers, function ($seller) use ($sellerSlug) {
            return $seller['slug'] === $sellerSlug;
        });

        if (!count($foundSeller) > 0) {
            abort(404);
        }

        $sellerData = reset($foundSeller);

        $foundProduct = array_filter($sellerData["products"], function ($product) use ($productSlug) {
            return $product['slug'] === $productSlug;
        });

        if (!count($foundProduct) > 0) {
            return abort(404);
        }

        $productData = reset($foundProduct);



        return view("pages.checkout.index", [
            "sellerData" => $sellerData,
            "productData" => $productData,
            "quantity" => $quantity,
            "catatan" => $catatan
        ]);
    }
}
