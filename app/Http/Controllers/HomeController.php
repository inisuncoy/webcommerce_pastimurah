<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\CarouselrController;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CarouselrController $carousel)
    {

        $data_highlight = $carousel->index();
        // dd($data_highlight["carousel_data"]);
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
           
            if ($response->getStatusCode() === 200) {
                $responseData = json_decode($response->getBody(), true);       
                $umkm_data = array_slice($responseData['data'], 0, 10);
               
                return view('pages.landing-page.index', [
                    'umkm_data' =>$umkm_data ,
                    'news' => $responseNewsData['data'],
                    'carousel_data'=>$data_highlight['carousel_data']["data"]
                ]);
            } else {
                $errorMessages = [];
               
                if ($response->getStatusCode() !== 200) {
                    $errorMessages[] = 'Error fetching UMKM data: ' . $response->getReasonPhrase();
                }
                if ($responseNews->getStatusCode() !== 200) {
                    $errorMessages[] = 'Error fetching news data: ' . $responseNews->getReasonPhrase();
                }
               
    
                return view('pages.Fetch_Error.index', ['errorMessage' => implode(', ', $errorMessages)]);
            }
        } catch (RequestException $e) {
            Log::error('An error occurred: ' . $e->getMessage());
            return view('pages.Fetch_Error.index', ['errorMessage' => 'Ada Kesalahan saat Mengambil data. Coba Lagi Nanti: ' . $e->getMessage()]);
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
