<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

use GuzzleHttp\Exception\ConnectException;

use Illuminate\Support\Facades\Log;


class SellersController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $data = [
            'query' => $request->input('query'),

        ];
        $checkboxStates = [];
        
        // dd($sendData);
        $apiBaseUrl = 'https://api.andamantau.com/public_html/api/w/umkm/list';
        $yourToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5hbmRhbWFudGF1LmNvbS9wdWJsaWNfaHRtbC9hcGkvbG9naW4iLCJpYXQiOjE2OTUxOTYyNjksImV4cCI6MTY5NTE5OTg2OSwibmJmIjoxNjk1MTk2MjY5LCJqdGkiOiJ5c0t2bXdVa1J1dm9RcjNWIiwic3ViIjoiNSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.4qULjcgQRUIyckVuUxzbx70owTYNK483DphDobQiePo";
        $client = new Client();


        try {
            //   dd($requestDataProduct);
            $response = $client->get('https://api.andamantau.com/api/w/umkm/list', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $yourToken,
                    'Content-Type' => 'application/json',
                ],
            ]);
            if ($response->getStatusCode() === 200) {
                $responseData = json_decode($response->getBody(), true);
                return view('pages.sellers.index', [
                    'umkm_data' => $responseData['data'],
                    'checkboxStates' => $checkboxStates,

                ]);
            } else {
                $errorMessages = [];
               
                if ($response->getStatusCode() !== 200) {
                    $errorMessages[] = 'Error fetching UMKM data: ' . $response->getReasonPhrase();
                }

               
    
                return view('pages.Fetch_Error.index', ['errorMessage' => implode(', ', $errorMessages)]);
            }
        } catch (RequestException $e) {
            Log::error('An error occurred: ' . $e->getMessage());
            return view('pages.Fetch_Error.index', ['errorMessage' => 'Ada Kesalahan saat Mengambil data. Coba Lagi Nanti: ' . $e->getMessage()]);
        } catch (ConnectException $e) {
            Log::error('Connection error: ' . $e->getMessage());
            return view('pages.Connection_Error.index', ['errorMessage' => 'Ada Kesalahan koneksi. Cek kembali koneksi internet Anda: ' . $e->getMessage()]);
        
    }}


    public function SearchUMKM(Request $request)
    {
        $checkboxStates = [];
        $yourToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5hbmRhbWFudGF1LmNvbS9hcGkvbG9naW4iLCJpYXQiOjE2OTU5MTUyOTYsImV4cCI6MTY5NjUyMDA5NiwibmJmIjoxNjk1OTE1Mjk2LCJqdGkiOiJIOFlIWUNwZkpxWGJKMG96Iiwic3ViIjoiNSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.Oof2r4AqxMOvSMgzMW_JzDSiTsSfESDa538O5tlr6vI";
        $request->validate([
            'query' => 'required|string|',
        ]);


        $Search = [
            'query' =>$request->input('query'),

        ];




        $client = new Client();


        try {
            $responseSearch = $client->post(
                'https://api.andamantau.com/api/w/umkm/search/name',
                [
                    'headers' => [
                        'Content-Type' => 'application/json',

                    ],
                    'body' =>  json_encode($Search),
                ]
            );



            if ($responseSearch->getStatusCode() === 200) {
                $responseData = json_decode($responseSearch->getBody(), true);
                // dd($responseData);
                return view('pages.sellers.index', [
                    'umkm_data' => $responseData['data'],
                    'checkboxStates' => $checkboxStates,

                ]);
            }  else {
                $errorMessages = [];
               
                if ($responseSearch->getStatusCode() !== 200) {
                    $errorMessages[] = 'Error Search UMKM data: ' . $responseSearch->getReasonPhrase();
                }

               
    
                return view('pages.404-Search.index', ['errorMessage' => implode(', ', $errorMessages)]);
            }
        } catch (RequestException $e) {
            Log::error('An error occurred: ' . $e->getMessage());
            return view('pages.Fetch_Error.index', ['errorMessage' => 'Ada Kesalahan saat Mengambil data. Coba Lagi Nanti: ' . $e->getMessage()]);
        } catch (ConnectException $e) {
            Log::error('Connection error: ' . $e->getMessage());
            return view('pages.Connection_Error.index', ['errorMessage' => 'Ada Kesalahan koneksi. Cek kembali koneksi internet Anda: ' . $e->getMessage()]);
        
    }}

    public function filter(Request $request)
    {
        $yourToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5hbmRhbWFudGF1LmNvbS9wdWJsaWMvYXBpL2xvZ2luIiwiaWF0IjoxNjk2MjI3NTQyLCJleHAiOjE2OTY4MzIzNDIsIm5iZiI6MTY5NjIyNzU0MiwianRpIjoiNWpQNlZ5M2prN1FSMkpDYyIsInN1YiI6IjEwIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.FM4EGFRGS91QkLTHdJL-zXpNRIy6_Iz9If6BwhdsOME";
        $client = new Client();

        $provinces =  $request->input('province', []);

        // Join the "province" values with commas
        $provinceQueryParam = implode(',', $provinces);
        session(['checkboxStates' => $provinces]);
        
        $queryParams = [
            'province' => $provinceQueryParam,
        ];


        try {


            $response = $client->get(
                'https://api.andamantau.com/api/w/umkm/filter/?province=',
                [
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer ' . $yourToken,
                    ],
                    'query' => $queryParams,

                ]
            );




            if ($response->getStatusCode() === 200) {
                $responseData = json_decode($response->getBody(), true);
                $savedCheckboxStates = session('checkboxStates', []);
                return view('pages.sellers.index', [
                    'umkm_data' => $responseData['data'],
                    // 'selectedOptions'=>$selectedOptions,
                    'checkboxStates' => $savedCheckboxStates,

                ]);


               
            }
            else {
                $errorMessages = [];
               
                if ($response->getStatusCode() !== 200) {
                    $errorMessages[] = 'Error Search UMKM data: ' . $response->getReasonPhrase();
                }
    
               
    
                return view('pages.Fetch_Error.index', ['errorMessage' => implode(', ', $errorMessages)]);
            }
        } catch (RequestException $e) {
            Log::error('An error occurred: ' . $e->getMessage());
            return view('pages.Fetch_Error.index', ['errorMessage' => 'Ada Kesalahan saat Mengambil data. Coba Lagi Nanti: ' . $e->getMessage()]);
        } catch (ConnectException $e) {
            Log::error('Connection error: ' . $e->getMessage());
            return view('pages.Connection_Error.index', ['errorMessage' => 'Ada Kesalahan koneksi. Cek kembali koneksi internet Anda: ' . $e->getMessage()]);
        
    }}

    public function filterCard(Request $request)
    {
        $yourToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5hbmRhbWFudGF1LmNvbS9wdWJsaWMvYXBpL2xvZ2luIiwiaWF0IjoxNjk2MjI3NTQyLCJleHAiOjE2OTY4MzIzNDIsIm5iZiI6MTY5NjIyNzU0MiwianRpIjoiNWpQNlZ5M2prN1FSMkpDYyIsInN1YiI6IjEwIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.FM4EGFRGS91QkLTHdJL-zXpNRIy6_Iz9If6BwhdsOME";
        $client = new Client();
        $selectedOptions = $selectedOptions ?? [];
        $provinces =  $request->input('province', []);
        session(['checkboxStates' => $provinces]);
        
        $provinceQueryParam = implode(',', $provinces);
        
        $queryParams = [
            'province' => $provinceQueryParam,
        ];
   

        try {


            $response = $client->get(
                'https://api.andamantau.com/api/w/umkm/filter/?province=',
                [
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer ' . $yourToken,
                    ],
                    'query' => $queryParams,

                ]
            );




            if ($response->getStatusCode() === 200) {
                $responseData = json_decode($response->getBody(), true);
                // dd($responseData);
                $savedCheckboxStates = session('checkboxStates', []);
                return view('pages.sellers.index', [
                    'umkm_data' => $responseData['data'],
                    // 'selectedOptions'=>$selectedOptions,
                    'checkboxStates' => $savedCheckboxStates,

                ]);
            }
        else {
            $errorMessages = [];
           
            if ($response->getStatusCode() !== 200) {
                $errorMessages[] = 'Error Search UMKM data: ' . $response->getReasonPhrase();
            }

           

            return view('pages.Fetch_Error.index', ['errorMessage' => implode(', ', $errorMessages)]);
        }
    } catch (RequestException $e) {
        Log::error('An error occurred: ' . $e->getMessage());
        return view('pages.Fetch_Error.index', ['errorMessage' => 'Ada Kesalahan saat Mengambil data. Coba Lagi Nanti: ' . $e->getMessage()]);
    } catch (ConnectException $e) {
        Log::error('Connection error: ' . $e->getMessage());
        return view('pages.Connection_Error.index', ['errorMessage' => 'Ada Kesalahan koneksi. Cek kembali koneksi internet Anda: ' . $e->getMessage()]);
    
}}
    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $umkm_name = str_replace('-', ' ', $request->segment(2));
       
        
        $yourToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5hbmRhbWFudGF1LmNvbS9wdWJsaWNfaHRtbC9hcGkvbG9naW4iLCJpYXQiOjE2OTUxOTYyNjksImV4cCI6MTY5NTE5OTg2OSwibmJmIjoxNjk1MTk2MjY5LCJqdGkiOiJ5c0t2bXdVa1J1dm9RcjNWIiwic3ViIjoiNSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.4qULjcgQRUIyckVuUxzbx70owTYNK483DphDobQiePo";
        $client = new Client();

        $requestDataProduct = [
            "query" => $umkm_name,
        ];
        try {
           

            $responseUMKMPAll = $client->post(
                'https://api.andamantau.com/api/w/umkm-details',
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $yourToken,
                        'Content-Type' => 'application/json',
                    ],
                    'body' =>  json_encode($requestDataProduct),
                ]
            );
           
            $responseBodyDetail = $responseUMKMPAll->getBody();

            $responseBodyDetail = json_decode($responseBodyDetail, true);
          

            if ($responseUMKMPAll->getStatusCode() === 200) {

                return view('pages.sellers.seller.index', [

                    'umkm_all_detail' => $responseBodyDetail['data'],

                ]);
            } else {
                $errorMessages = [];
               
                if ($responseUMKMPAll->getStatusCode() !== 200) {
                    $errorMessages[] = 'Error Search UMKM data: ' . $responseUMKMPAll->getReasonPhrase();
                }

               
    
                return view('pages.404-Search.index', ['errorMessage' => implode(', ', $errorMessages)]);
            }
        } catch (RequestException $e) {
            Log::error('An error occurred: ' . $e->getMessage());
            return view('pages.Fetch_Error.index', ['errorMessage' => 'Ada Kesalahan saat Mengambil data. Coba Lagi Nanti: ' . $e->getMessage()]);
        } catch (ConnectException $e) {
            Log::error('Connection error: ' . $e->getMessage());
            return view('pages.Connection_Error.index', ['errorMessage' => 'Ada Kesalahan koneksi. Cek kembali koneksi internet Anda: ' . $e->getMessage()]);
        
    }}
    

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