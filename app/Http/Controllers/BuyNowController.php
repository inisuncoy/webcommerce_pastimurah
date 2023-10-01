<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyNowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellerSlug = request()->sellerSlug;
        $quantity = request()->quantity;
        $productSlug = request()->productSlug;
        $catatan = request()->catatan;

        if (!empty(request()->nama_depan)) {
            $datas = [
                'nama_depan' => request()->nama_depan,
                'nama_belakang' => request()->nama_belakang,
                'email' => request()->email,
                'no_handphone' => request()->no_handphone,
                'alamat' => request()->alamat,
                'alamat_pin_point' => request()->alamat_pin_point,
                'provinsi' => request()->provinsi,
                'kota_kabupaten' => request()->kota_kabupaten,
                'kecamatan' => request()->kecamatan,
                'kelurahan' => request()->kelurahan,
                'kode_pos' => request()->kode_pos,
                'pembayaran' => request()->pembayaran,
                'pengiriman' => request()->pengiriman,
                'kurir' => request()->kurir,
            ];
        }

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

        if (!empty(request()->nama_depan)) {
            return view("pages.buy-now.index", [
                "datas" => $datas,
                "sellerData" => $sellerData,
                "productData" => $productData,
                "quantity" => $quantity,
                "catatan" => $catatan
            ]);
        }
        return view("pages.buy-now.index", [
            "sellerData" => $sellerData,
            "productData" => $productData,
            "quantity" => $quantity,
            "catatan" => $catatan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
