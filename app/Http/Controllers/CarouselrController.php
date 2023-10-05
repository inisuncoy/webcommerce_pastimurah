<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class CarouselrController extends Controller
{
    public function index()
    {
        $apiBaseUrl = 'https://api.andamantau.com/api/w/highlights';
        
    
        $client = new Client();
       
        try {
          
            $response = $client->get($apiBaseUrl, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]);

        
            if ($response->getStatusCode() === 200) {
                $response = json_decode($response->getBody(), true);       
                // dd($response);
                
                return [
                    'carousel_data' => $response, 
                ];
            } else {
                // return abort(404);
                return [
                    'carousel_data' => []
                ];
            }



        } catch (RequestException $e) {
            return view('pages.404.index');
        }




    }
}
