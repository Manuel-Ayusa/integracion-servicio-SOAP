<?php

namespace App\Livewire;

use Livewire\Component;
use App\Traits\Paginate;
use App\Traits\RecuperarBanderas;

class PaisesIndex extends Component
{   
    use Paginate, RecuperarBanderas;

    public $search = '';

    public function render()
    {   
        $wsdl = 'http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL';

        // Crear una instancia de SoapClient
        $client = new \SoapClient($wsdl, [
            'trace' => true,  // Permite rastrear la solicitud/respuesta
            'exceptions' => true,  // Lanza excepciones en caso de error
        ]);

        if ($this->search == '') {
            $paises = $client->ListOfCountryNamesByName()->ListOfCountryNamesByNameResult->tCountryCodeAndName;

            $paises = $this->paginate($paises, 8);

            $paises->setPath('http://app.viajera.test/');

            $banderas = $this->recuperarBanderas($paises, $client);
            
            $pais = null;
        } else {
            $this->search = ucfirst($this->search);

            $params = ['sCountryName' => $this->search];
            $codISOpais = $client->CountryISOCode($params)->CountryISOCodeResult;

            $params = ['sCountryISOCode' => $codISOpais];
            $pais =  $client->CountryName($params);

            $pais->sISOCode = $codISOpais;

            $banderas = $client->CountryFlag($params)->CountryFlagResult;

            $paises = null;
        }
        
        
        return view('livewire.paises-index', compact('paises', 'pais', 'banderas'));
    }
}
