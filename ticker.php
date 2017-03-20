<?php
//dolares

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
</head>
<body>
USD <?php echo $btcDisplay1; ?> (Bitpay)</br>
USD <?php echo $btcDisplay3; ?> (Coindesk)</br>
MXN <?php echo $btcDisplay2; ?> (Bitso)</br>
</body>
</html>