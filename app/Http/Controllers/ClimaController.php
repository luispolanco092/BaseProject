<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class ClimaController extends Controller
{
    public function index()
    {
        return view('clima');
    }
}
