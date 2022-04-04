<?php
/* CODIGO FEITO POR JOHN KAI$3R */
/* ADQUIRIR A API_KEY EM https://serpapi.com/ navegar até https://serpapi.com/manage-api-key */

function gravar($nome, $texto){
	$arquivo = preg_replace('/\s/','',$nome.".txt");
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

echo "[INFORME A DORK *]: ";
$stdindork = fopen ("php://stdin","r");
$dork = fgets($stdindork);
echo "[GRAVAR RESULTADOS EM *]: ";
$stdingravar = fopen ("php://stdin","r");
$gravar = fgets($stdingravar);

$query = [
    "api_key" => "INSIRA AQUI SUA API_KEY", // INSIRA AQUI SUA API KEY
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
    $i=0;
    foreach($results['organic_results'] as $result){
        echo "[$i] => ".$result['link']."\n";
        gravar($gravar, $result['link']."\n");
        $i++;
    }

}elseif(array_key_exists('error', $results)){
    echo "\e[31mCHAVE DA API INVALIDA OU EXPIRADA\033[0m \n";
    echo "\e[33mADQUIRA UMA CHAVE ACESSANDO https://serpapi.com/ E NAVEGANDO ATÉ https://serpapi.com/manage-api-key \033[0m";
}else{
    echo "\e[31m ERRO NÃO FILTRADO REPORTADO \033[0m \n";
}