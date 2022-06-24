<?php
/* CODIGO FEITO POR JOHN KAI$3R */
/* ADQUIRIR A API_KEY EM https://serpapi.com/ navegar até https://serpapi.com/manage-api-key */

function gravar($nome, $texto){
	$arquivo = $nome.".txt";
	$fp = fopen($arquivo, "a+");
	fwrite($fp, $texto);
	fclose($fp);
}



echo "\e[32m
_______    ______   _______   __    __   ______    ______    ______   __    __           _____      __    __ 
/       \  /      \ /       \ /  |  /  | /      \  /      \  /      \ /  \  /  |         /     |    /  |  /  |
$$$$$$$  |/$$$$$$  |$$$$$$$  |$$ | /$$/ /$$$$$$  |/$$$$$$  |/$$$$$$  |$$  \ $$ |         $$$$$ |    $$ | /$$/ 
$$ |  $$ |$$ |  $$ |$$ |__$$ |$$ |/$$/  $$ \__$$/ $$ |  $$/ $$ |__$$ |$$$  \$$ |            $$ |    $$ |/$$/  
$$ |  $$ |$$ |  $$ |$$    $$< $$  $$<   $$      \ $$ |      $$    $$ |$$$$  $$ |       __   $$ |    $$  $$<   
$$ |  $$ |$$ |  $$ |$$$$$$$  |$$$$$  \   $$$$$$  |$$ |   __ $$$$$$$$ |$$ $$ $$ |      /  |  $$ |    $$$$$  \  
$$ |__$$ |$$ \__$$ |$$ |  $$ |$$ |$$  \ /  \__$$ |$$ \__/  |$$ |  $$ |$$ |$$$$ |      $$ \__$$ | __ $$ |$$  \ 
$$    $$/ $$    $$/ $$ |  $$ |$$ | $$  |$$    $$/ $$    $$/ $$ |  $$ |$$ | $$$ |      $$    $$/ /  |$$ | $$  |
$$$$$$$/   $$$$$$/  $$/   $$/ $$/   $$/  $$$$$$/   $$$$$$/  $$/   $$/ $$/   $$/        $$$$$$/  $$/ $$/   $$/ \033[0m
:::::::::::::::::::::::::::::::::::::::::::::::BY JOHN KAI$3R:::::::::::::::::::::::::::::::::::::::::::::::::\n";

$dork = readline("[INFORME A DORK *]: ");
$gravar = readline("[GRAVAR RESULTADOS EM *]: ");

$query = [
    "api_key" => "fec9d4c0640d3a9cdd23427db1618943fd5f3b445a3352eed5af28cec5979d5d", // INSIRA AQUI SUA API KEY
    "engine" => "google",
    "q" => $dork,
    "location" => "Brazil",
    "google_domain" => "google.com.br",
    "gl" => "br",
    "hl" => "pt",
    "num" => "1000"
  ];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://serpapi.com/search?'.http_build_query($query));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$results = json_decode(curl_exec($ch), true);

if(array_key_exists('organic_results', $results)){
    echo "\e[32m ENCONTRADOS [".$results['search_information']['total_results']."] \033[0m \n";
    $i=0;
    foreach($results['organic_results'] as $result){
        echo "\e[32m [$i] => ".$result['link']."\033[0m\n";
        gravar($gravar, $result['link']."\n");
        $i++;
    }

}elseif(array_key_exists('error', $results)){
    echo "\e[31mCHAVE DA API INVALIDA OU EXPIRADA\033[0m \n";
    echo "\e[33mADQUIRA UMA CHAVE ACESSANDO https://serpapi.com/ E NAVEGANDO ATÉ https://serpapi.com/manage-api-key \033[0m";
}else{
    echo "\e[31m ERRO NÃO FILTRADO REPORTADO \033[0m \n";
}
