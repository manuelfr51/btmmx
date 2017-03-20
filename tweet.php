<?php
//dolares
setlocale(LC_MONETARY, 'en_US.UTF-8');
function getPriceusd($url) {
$decode = file_get_contents ($url);
return json_decode ($decode, true);
}

$btcUSD = getPriceusd('https://bitpay.com/api/rates/usd');
$btcPriceusd = $btcUSD ["rate"];
//pesos
function getPricemxn($url2) {
$decode2 = file_get_contents ($url2);
return json_decode ($decode2, true);
}

$btcMXN = getPricemxn('https://api.bitso.com/v2/ticker');
$btcPricemxn = $btcMXN ["last"];
//coindesk

function getPriceusd2($url3) {
$decode3 = file_get_contents ($url3);
return json_decode ($decode3);
}

$btcUSD2 = getPriceusd2('http://api.coindesk.com/v1/bpi/currentprice.json');
$btcPriceusd2 = $btcUSD2->bpi->USD->rate;


$btcDisplay1 = round($btcPriceusd, 2);
$btcDisplay2 = round($btcPricemxn, 2);
$btcDisplay3 = round($btcPriceusd2, 2);
//tipo de cambio

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BitcoinMTY Virtual ATM</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
El precio de #Bitcoin en México es de 1 BTC = <?php echo money_format('%.2n', $btcDisplay2); ?> Pesos (#Bitso) = <?php echo money_format('%.2n', $btcDisplay1); ?> Dlls (#BitPay) http://www.bitcoinmty.com 
</body>
</html>
