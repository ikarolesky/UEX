<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Actions\GoogleApi;


class GoogleApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGoogleApiAddress(): void
    {

        $google = new GoogleApi;

        $endereco = 'Rua União da Vitória 590, Goioerê';

        $array =  $google->getCoordinates($endereco);
        
        $this->assertTrue(array_key_exists('endereco', $array));
        $this->assertTrue(array_key_exists('lat', $array));
        $this->assertTrue(array_key_exists('lon', $array));
    }
}
