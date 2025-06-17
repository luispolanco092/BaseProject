<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class ClimaController extends Controller
{
    public function index() {
        $apiKey = env('OPENWEATHERMAP_API_KEY');
        return view('clima', compact('apiKey'));
    }
}
