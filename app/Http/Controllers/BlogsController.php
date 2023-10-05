<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        

        $apiBaseUrl = 'https://api.andamantau.com/api/w/popular-umkm';
        $yourToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5hbmRhbWFudGF1LmNvbS9wdWJsaWNfaHRtbC9hcGkvbG9naW4iLCJpYXQiOjE2OTUxMjU5NTcsImV4cCI6MTY5NTEyOTU1NywibmJmIjoxNjk1MTI1OTU3LCJqdGkiOiIwcmdONVNvaE5XMUpPZVV4Iiwic3ViIjoiNSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.VKsvsR0bqSV_yL4rSNhkqtto1Tn9mfsoImEdcF4IlAI';
    
        $client = new Client();
       
        try {
            
            $response = $client->get($apiBaseUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $yourToken,
                    'Content-Type' => 'application/json',
                ],
            ]);
            
            $responseNews = $client->get('https://api.andamantau.com/api/w/latest-news', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]);

            
            $responseNewsData = json_decode($responseNews->getBody(), true);   
            // dd($response);

            // dd($responseNewsData);
            $news = [];
            if ($responseNews->getStatusCode() === 200) {
                $responseData = json_decode($response->getBody(), true);       
                
                // dd($responseData['data']);
                // dd($responseData['data']);
                return view('pages.blogs.index', [
                    'umkm_data' => $responseData['data'],
                    // 'seller' => $sellers,
                    'news' => $responseNewsData['data'],
                ]);
            } else {
                return abort(404);
            }



        } catch (RequestException $e) {
            return view('pages.404.index');
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Request $request)
    {
        
        $client = new Client();
        $NewsName = str_replace('-', ' ', $request->segment(4));
        // dd($NewsName);
        $requestDataNews = [
            "query" => $NewsName,
        ];
    //   dd($requestDataNews);
    try {
        $responseUMKMPNEWS = $client->post('https://api.andamantau.com/api/w/news'
                , [
                'headers' => [
                    
                    'Content-Type' => 'application/json',
                ],
                'body' =>  json_encode($requestDataNews),
            ]);

            $responseBodyDetail = $responseUMKMPNEWS->getBody();
           
            $responseBodyDetail = json_decode($responseBodyDetail, true);

            // dd($responseBodyDetail);

            if ($responseUMKMPNEWS->getStatusCode() === 200) {
            
                return view('pages.blogs.blog.index', [
                
                    'news'=>$responseBodyDetail['data'],
                  
                ]);
            } else {
                return abort(404);
            }

        }catch (RequestException $e) {
            return view('pages.404.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function Oldest_News(Request $request)
{
    $sortingOption = $request->input('sorting_option');

    $client = new Client();
    try{
    if ($sortingOption === 'terlama') {
        $responseNews = $client->get('https://api.andamantau.com/api/w/oldest-news', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);

        

        if ($responseNews->getStatusCode() === 200) {
            $responseNewsData = json_decode($responseNews->getBody(), true);
            
            return view('pages.blogs.index', [
                'news' => $responseNewsData['data'],
            ]);
        } else {
            return abort(404);
        }
    }

    if ($sortingOption === 'terbaru') {
        $responseNews = $client->get('https://api.andamantau.com/api/w/latest-news', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);
        if ($responseNews->getStatusCode() === 200) {
            $responseNewsData = json_decode($responseNews->getBody(), true);
            
            return view('pages.blogs.index', [
                'news' => $responseNewsData['data'],
            ]);
        } else {
            return abort(404);
        }
    }}catch (RequestException $e) {
        return view('pages.404.index');
    }
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
