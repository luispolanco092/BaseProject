<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;

class CalculadoraController extends Controller
{
    public function index()
    {
        return view('frontend.calculadora');
    }

    public function calcular(Request $request)
    {
        $numero1 = $request->input('num1');
        $numero2 = $request->input('num2');
        $operacion = $request->input('operacion');

        $client = new \SoapClient("http://www.dneonline.com/calculator.asmx?WSDL");

        try {
            $params = ['intA' => $numero1, 'intB' => $numero2];
            $resultado = null;

            if ($operacion === 'sumar') {
                $response = $client->Add($params);
                $resultado = $response->AddResult;
            } elseif ($operacion === 'multiplicar') {
                $response = $client->Multiply($params);
                $resultado = $response->MultiplyResult;
            }
            return view('frontend.calculadora', compact('resultado', 'numero1', 'numero2', 'operacion'));

        } catch (\Exception $e) {
            return back()->with('error', 'Error al consumir el servicio SOAP' . $e->getMessage());
        }
    }
}
