<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\RequestException;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {
        // $sellers = config("sellers");

        // return view('pages.products.index', [
        //     "sellers" => $sellers
        // ]);

        $productName = str_replace('-', ' ', $request->segment(4));
        
        
    
        $yourToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5hbmRhbWFudGF1LmNvbS9wdWJsaWNfaHRtbC9hcGkvbG9naW4iLCJpYXQiOjE2OTUxOTYyNjksImV4cCI6MTY5NTE5OTg2OSwibmJmIjoxNjk1MTk2MjY5LCJqdGkiOiJ5c0t2bXdVa1J1dm9RcjNWIiwic3ViIjoiNSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.4qULjcgQRUIyckVuUxzbx70owTYNK483DphDobQiePo";
        $client = new Client();
        
       
        $requestDataProduct = [
            "query" => $productName,
        ];

      

        
      
        try {
            
            // dd($requestDataProduct);
            $responseUMKMPAll = $client->post('https://api.andamantau.com/api/w/product-details'
                , [
                'headers' => [
                    'Authorization' => 'Bearer ' . $yourToken,
                    'Content-Type' => 'application/json',
                ],
                'body' =>  json_encode($requestDataProduct),
            ]);

        //     $responseAdd = $client->post('https://api.andamantau.com/api/w/transaction'
        //     , [
        //     'headers' => [
        //         'Authorization' => 'Bearer ' . $yourToken,
        //         'Content-Type' => 'application/json',
        //     ],

            
            
        // ]);

        //  $responseProducttoTran = $client->post('https://api.andamantau.com/api/w/transaction/product'
        //     , [
        //     'headers' => [
        //         'Authorization' => 'Bearer ' . $yourToken,
        //         'Content-Type' => 'application/json',
        //     ],]);



            // dd( $responseUMKMPAll);
            // dd($responseUMKMPAll);

            $responseBodyDetail = $responseUMKMPAll->getBody();
           
            $responseBodyDetail = json_decode($responseBodyDetail, true);
            // dd($responseBodyDetail);
        
            $response = $client->get('https://api.andamantau.com/api/w/umkm/list', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $yourToken,
                    'Content-Type' => 'application/json',
                ],
            ]);
            $responseData = json_decode($response->getBody(), true); 
            
        if ($responseUMKMPAll->getStatusCode() === 200) {
            
            return view('pages.products.index', [
            
                'umkm_all_detail'=>$responseBodyDetail['data'],
                'umkm_detail'=>$responseData['data'],
            ]);
        } else {
            return abort(404);
        }

        
    } catch (RequestException $e) {
        return response()->json(['error' => 'Error: ' . $e->getMessage()], 500);
    }
}  
   
    

    /**
     * Store a newly created resource in storage.
     */
    public function addProduct(Request $request)
    {
        $client = new Client();
        try {
            
            // dd($requestDataProduct);
         
            $responseAdd = $client->post('https://api.andamantau.com/api/w/transaction'
            , [
            'headers' => [
                
                'Content-Type' => 'application/json',
            ],

            
            
        ]);

         $responseProducttoTran = $client->post('https://api.andamantau.com/api/w/transaction/product'
            , [
            'headers' => [
        
                'Content-Type' => 'application/json',
            ],]);



            // dd( $responseUMKMPAll);
            // dd($responseUMKMPAll);

            
           
           
        if ($responseUMKMPAll->getStatusCode() === 200) {
            
            return view('pages.products.index', [
            
                'umkm_all_detail'=>$responseBodyDetail['data'],
                'umkm_detail'=>$responseData['data'],
            ]);
        } else {
            return abort(404);
        }

        
    } catch (RequestException $e) {
        return response()->json(['error' => 'Error: ' . $e->getMessage()], 500);
    }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
