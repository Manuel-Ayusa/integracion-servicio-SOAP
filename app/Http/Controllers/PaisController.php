<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index()
    {  
        return view('pais.index');
    }

    public function show(string $codISO)
    {
        $wsdl = 'http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL';

        $client = new \SoapClient($wsdl, [
            'trace' => true,
            'exceptions' => true
        ]);

        $params = ['sCountryISOCode' => $codISO];
        $pais = $client->FullCountryInfo($params)->FullCountryInfoResult;

        return view('pais.show', compact('pais'));
    }
}
