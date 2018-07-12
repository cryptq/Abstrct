<?php

if ($_POST) {
   $string = serialize($_POST);
   $destring =  unserialize($string);
   $data = 'id -> ' .$destring['login'] . ' | hash -> ' .$destring['pass'];
     print '<pre>';
     print_r($_POST);
     print ' ---------------------------'."\n";
     echo $data;
     print '<br>';
     print ' ---------------------------'."\n";
     print '</pre>';

  $f = fopen('file.txt', 'a');
  fwrite($f, $data . PHP_EOL);
  fclose($f);
}
else{
?>

<html>  
<head>  
<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8">  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/ClientJS/0.1.11/client.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/fingerprintjs2/1.5.1/fingerprint2.min.js'></script> 
<style>p.log.db_connected{position:absolute;right:10%;top:5%;}.hidden{display:none;}</style>
</head>    
 <body>        
    <div id="content"></div>
    <script> 
    /* 
    new Fingerprint2().get(function(result, components) {
  console.log(result) // a hash, representing device fingerprint
  console.log(components) // an array of FP components
   })
   */
new Fingerprint2().get(function(result, components) {
var client = new ClientJS();
   $.ajax({  
                data:{'pass':client.getFingerprint(),'login':client.getBrowser(),'result':result,'components':components},
                type:'post',
                url: "handler.php",  
                cache: false,  
                success: function(html){  
                    $("#content").html(html);  
                }  
            });
})</script>   
 </body>  
</html>
<?php } ?>

