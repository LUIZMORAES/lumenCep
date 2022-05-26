<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\cep;

class BuscarcepController extends Controller
{

    public $listarcep;

    public function __construct(cep $listarcep)
    {
        $this->cep = $listarcep;
    }

    public function search(Request $cep)
    {

        $buscaUrl= trim($_SERVER['REQUEST_URI']);

        $trataUrl = str_replace("/search/local/","", $buscaUrl);

        $s_palavra = explode(",",$trataUrl);

        $n_palavras=count($s_palavra);

        cep::truncate();

        for($i=0 ; $i < $n_palavras ; $i++ ){
            //print "$s_palavra[$i] \n";
            $cep = $s_palavra[$i];

            $response = Http::get("http://viacep.com.br/ws/$cep/json/")->throw()->json();

            $colecoes_cep[$i] = json_decode(collect($response));

            $cep = $colecoes_cep[$i]->cep;
            $logradouro = $colecoes_cep[$i]->logradouro;
            $complemento = $colecoes_cep[$i]->complemento;
            $bairro = $colecoes_cep[$i]->bairro;
            $localidade = $colecoes_cep[$i]->localidade;
            $uf = $colecoes_cep[$i]->uf;
            $ibge = $colecoes_cep[$i]->ibge;
            $gia =  $colecoes_cep[$i]->gia;
            $ddd =  $colecoes_cep[$i]->ddd;
            $siafi =  $colecoes_cep[$i]->siafi;
            $label = $logradouro.",".$localidade;

            cep::create([

                'cep' => $cep,
                'logradouro' => $logradouro,
                'complemento' => $complemento,
                'bairro' => $bairro,
                'localidade' => $localidade,
                'uf' => $uf,
                'ibge' => $ibge,
                'gia' =>  $gia,
                'ddd' =>  $ddd,
                'siafi' =>  $siafi,
                'label' => $label,

            ]);

        }

        //dd('Pause...');

        $listarcep = cep::all();

        $jsoncep = json_decode($listarcep, true);

        return response()->json($jsoncep, 200);

    }
}
