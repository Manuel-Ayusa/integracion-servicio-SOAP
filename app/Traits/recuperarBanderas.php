<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

trait RecuperarBanderas{

    public function recuperarBanderas($paises, $clienteSOAP)
    {
        $banderas = [];
            
        foreach ($paises as $pais) {
            $params = ['sCountryISOCode' => $pais->sISOCode];
            $bandera = $clienteSOAP->CountryFlag($params);
            
            array_push($banderas, $bandera->CountryFlagResult);
        }

        return $banderas;
    }
}