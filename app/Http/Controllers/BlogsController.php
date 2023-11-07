<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
            
            if ($responseNews->getStatusCode() === 200) {
                $responseData = json_decode($response->getBody(), true);       
                
                // $news = collect($responseNewsData['data']); // Convert the data to a collection
    
                // // Paginate the data
                // $perPage = 9; // Set the number of items per page to 20
                // $currentPage = request()->input('page', 1); // Get the current page from the request
                // $pagedData = $news->forPage($currentPage, $perPage);
    
                // $news = new LengthAwarePaginator(
                //     $pagedData,
                //     $news->count(),
                //     $perPage,
                //     $currentPage,
                //     [
                //         'path' => url('berita') // Set the path to 'toko' route
                //     ]
                // );
                return view('pages.blogs.index', [
                    'umkm_data' => $responseData['data'],
                    // 'seller' => $sellers,
                    'news' => $responseNewsData,
                ]);
            } else {
                $errorMessages = [];
                if ($response->getStatusCode() !== 200) {
                    $errorMessages[] = 'Error fetching UMKM data: ' . $response->getReasonPhrase();
                }
                if ($responseNews->getStatusCode() !== 200) {
                    $errorMessages[] = 'Error fetching news data: ' . $responseNews->getReasonPhrase();
                }
    
                return view('pages.404.index', ['errorMessage' => implode(', ', $errorMessages)]);
            }
        } catch (RequestException $e) {
            Log::error('An error occurred: ' . $e->getMessage());
            return view('pages.404.index', ['errorMessage' => 'Ada Kesalahan saat Mengambil data. Coba Lagi Nanti: ' . $e->getMessage()]);
        } catch (ConnectException $e) {
            Log::error('Connection error: ' . $e->getMessage());
            return view('pages.Connection_Error.index', ['errorMessage' => 'Ada Kesalahan koneksi. Cek kembali koneksi internet Anda: ' . $e->getMessage()]);
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
        $newsName = $request->input('newsName');
    
       
        $requestDataNews = [
            "query" => $newsName,
        ];

        $client = new Client();
       
        
            
          
        try {
          
            $responseUMKMPNEWS = $client->post('https://api.andamantau.com/api/w/news', [
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
                    'news' => $responseBodyDetail['data'],
                ]);
            } else {
                $errorMessages = [];
               
                if ($responseUMKMPNEWS->getStatusCode() !== 200) {
                    $errorMessages[] = 'Error fetching news data: ' . $responseUMKMPNEWS->getReasonPhrase();
                }
    
                return view('pages.404.index', ['errorMessage' => implode(', ', $errorMessages)]);
            }
        } catch (RequestException $e) {
            Log::error('An error occurred: ' . $e->getMessage());
            return view('pages.Fetch_Error.index', ['errorMessage' => 'Ada Kesalahan saat Mengambil data. Coba Lagi Nanti: ' . $e->getMessage()]);
        } catch (ConnectException $e) {
            Log::error('Connection error: ' . $e->getMessage());
            return view('pages.Connection_Error.index', ['errorMessage' => 'Ada Kesalahan koneksi. Cek kembali koneksi internet Anda: ' . $e->getMessage()]);
        }
    }
    
    

    
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
                'news' => $responseNewsData,
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
                'news' => $responseNewsData,
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