<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    // Function to fetch and display news
    public function showNews()
    {
        // URL for the API to get the news data
        $url = 'https://newsapi.org/v2/top-headlines?apiKey=064383c9fa314fa384fdae200018f03e&category=science';
        
        // Make a GET request to the API
        $response = Http::get($url);

        // Check if the request was successful
        if ($response->successful()) {
            // Decode the JSON response into an associative array
            $newsData = $response->json();
            return view('News', compact('newsData'));
        } else {
            // If the request fails, pass an error to the view
            return view('News')->with('error', 'Unable to fetch data.');
        }
    }
}
