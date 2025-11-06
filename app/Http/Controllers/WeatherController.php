<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    //


    public function index(){
        return view('weather.weather');
    }

    public function getWeather( Request $request ){
        $city = $request->city;
        // dd($city);

        $apiKey = "eaf7ab7da3438eb5358aab32abee8409";
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

        $response = Http::get($url);

        // dd($response);


        if( $response->successful() ){
            // dd("200");
            $data = $response->json();
            return view('weather.weather' , [ 'data' => $data ]);
        }else{
            return view('weather.weather' , [ 'error' => 'City Not Found Or API Error' ]);
        }
    }

}
