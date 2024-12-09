<?php
namespace App\Http\Actions;
use Illuminate\Support\Facades\Http;


class ViaCep {
    public function getAddress(string $cep)
    {
        //Faz a chamada para viacep e em caso de erros retorna para o formulário com a mensagem de erro.
        try {
        $url = 'https://viacep.com.br/ws/'.$cep.'/json/';
        $response = Http::get($url);
        $dados = $response->json();
        } catch (\Throwable $th) {
            return back()->withInput()->with('error', 'Viacep indisponível, tente novamente mais tarde!');
        }

        $address = $this->getAddressInfo($dados);

        return $address;
    }
    private function getAddressInfo($response): array
    {
        $enderecoCompleto = [
            "rua" => $response['logradouro'],
            "bairro" => $response['bairro'],
            "uf" => $response['uf'],
            "cidade" => $response['localidade'],
        ];

        return $enderecoCompleto;    
    }       
}


