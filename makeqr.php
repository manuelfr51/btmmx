<?php
$data= $_POST["address"];
$ammount= $_POST["bitcoin"];
$label= $_POST["label"];
$message= $_POST["message"];
$tipo= $_POST["tipo"];
$tarifa= $_POST["tarifa"];
$porcent = ($ammount*$tarifa/100);

if($tipo=='compra') {
$total = $ammount - $porcent;
} elseif ($tipo=='venta') {
$total = $ammount + $porcent;
} else {
 $total = $ammount + "0";   
}

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
<link rel="stylesheet" href="bitcoin-link.css"></link>
<script type="text/javascript">
function hideshow(which){
if (!document.getElementById)
return
if (which.style.display=="block")
which.style.display="none"
else
which.style.display="block"
}
</script>

</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-6">
<center>
<h3>Escanea este QR</h3>
<?php echo "<img src=\"https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=bitcoin:$data%3Famount%3D$total%3Flabel%3D$label%3Fmessage%3D$message\" />"; ?></br>
<?php echo "<a class=\"bitcoin-address\" href=bitcoin:$data%3Famount%3D$total%3Flabel%3D$label%3Fmessage%3D$message>Enviar con blockchain.info</a>"; ?>
</center>
</div>
<div class="col-md-6">
<center>
<h3>Estos son los datos de tu pago</h3></br>
<?php echo htmlspecialchars($data, ENT_QUOTES, 'UTF-8');  ?>
</br>
Cantidad original: <?php echo htmlspecialchars($ammount, ENT_QUOTES, 'UTF-8'); ?>
</br>
Monto a cobrar: <?php echo htmlspecialchars($total, ENT_QUOTES, 'UTF-8');   ?>
</br>
Diferencia porcentual: <?php echo htmlspecialchars($porcent, ENT_QUOTES, 'UTF-8'); ?>
</br>
<div>
  <div id="effect" style="display:none;">
    <h3>Habilitar blockchain.info</h3>
    <p>
      Para habilitar los pagos con tu wallet de blockchain.info dando click en el enlace "Enviar con blockchain.info", deberas habilitar la lectura de enlaces bitcoin desde tu cartera en: Configuracion de cuenta/General/ como se muestra en la siguiente imagen</br>
      <img src=uri.png /></br>
      Con esto, al hacer click en "Enviar con blockchain.info", se enviara a tu cartera automaticamente los datos de transferencia.
    </p>
  </div>
  <a href="javascript:hideshow(document.getElementById('effect'))">Habilitar blockchain.info</a>
</div>
</div>
</div>
</div>
</div>
</body>
</html>