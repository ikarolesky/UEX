<?php
namespace App\Http\Actions;

use Geocoder\Query\GeocodeQuery;

class GoogleApi {

    public function getCoordinates(string $address){
        //Busca key no .env 
        $apiKey = env('GOOGLE_API_KEY');

        //Inicializa o cliente Http
        $httpClient = new \GuzzleHttp\Client();
        
        //Inicializa Geocoder GoogleMaps
        $provider = new \Geocoder\Provider\GoogleMaps\GoogleMaps($httpClient, null, $apiKey);
        $geocoder = new \Geocoder\StatefulGeocoder($provider, 'en');

        //Busca latitude e longitude
        $result = $geocoder->geocodeQuery(GeocodeQuery::create($address));

        $data = $this->extractData($result);

        return $data;
    }

    private function extractData($response){
        $latlon = $response->get(0);
        $endereco = $latlon->getFormattedAddress();
        $coordinates = $latlon->getCoordinates();
        $latitude = $coordinates->getLatitude();
        $longitude = $coordinates->getLongitude();

        return [
            'lat' => $latitude, 
            'lon' => $longitude,
            'endereco' => $endereco
        ];
    }

}

