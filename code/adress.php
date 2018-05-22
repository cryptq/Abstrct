       <?php 
                if(  !isset($_SESSION))
                {
             }
        else
       {
echo '<pre>';
$point = 'https://block.io/api/v2/get_address_balance/?api_key=';
$key = '0000-0000-0000-0000';
$pin = "0000000000000000";
$labl =  time();
$version = 2; // API version
$block_io = new BlockIo($key, $pin, $version);
$newAddr = $block_io->get_new_address(array('label' => $labl));
if (!empty($newAddr->data->address))
{
session_start();
$_SESSION['addr'] = $newAddr->data->address;
echo $_SESSION['addr'].'<br>'; 
}
else { 
echo 'Заполните поля'; 
}     
echo 'Статус операции : '.$newAddr->status.'<br>';
echo 'BTC адресс : '.$newAddr->data->address.'<br>';
echo 'Метка адресса : id '.$newAddr->data->label.'<br>';
}
       
     function get_adr(){
$key = '0000-0000-0000-0000';
$pin = "0000000000000000";
$labl =  time();
$version = 2; // API version
$block_io = new BlockIo($key, $pin, $version);
$newAddr = $block_io->get_new_address(array('label' => $labl));  
return $newAddr->data->address;
}  
    session_start();
    
    $today = date("Y-m-d H:i:s");
    
    if(!isset($_SESSION['countdown'])){
    //Set the countdown to 120 seconds.
    $_SESSION['countdown'] = 5400;
    //Store the timestamp of when the countdown began.
    $_SESSION['time_started'] = time();
    $_SESSION['time_started1'] = date("H:i:s");
}
 
//Get the current timestamp.
$now = time();
$now1 = date("H:i:s");

//Calculate how many seconds have passed since
//the countdown began.
echo $now1 .' - сейчас <br>'.$_SESSION['time_started1'].' - сессия <br>';
$timeSince = $now - $_SESSION['time_started'];
 
//How many seconds are remaining?
$remainingSeconds = abs($_SESSION['countdown'] - $timeSince);
 
//Print out the countdown.
$reslt = $remainingSeconds / 60;

//echo (int)$reslt.' - минут на оплату';
 
//  print_r($_SESSION);
//Check if the countdown has finished.
if($remainingSeconds < 1){
   //Finished! Do something.
}
    
    if(  !isset(  $_SESSION['time']   )  )  $_SESSION['time']  =  $today;
    if(  !isset(  $_SESSION['count']  )  )  $_SESSION['count']  =  0;
    if(  !isset(  $_SESSION['addrs']  )  )  $_SESSION['addrs']  = get_adr();
    $_SESSION['count']++;
    $point = 'https://block.io/api/v2/get_address_balance/?api_key=';
    $key = '0000-0000-0000-0000';
    $page = file_get_contents($point.$key.'&addresses='.$_SESSION['addrs']);
    $obj = json_decode($page,true);
?>
<div class="container">
<h1>Одноразовый кошелёк</h1>
<p>&lt;address&gt; <a href="<?=$point.$key.'&addresses='.$_SESSION['addrs'];
                             ?>" target="blank"><?=$_SESSION['addrs'];?>
                             </a>  &lt;/address&gt; <span style="color:grey;">// адресс пополнения</span></p>
                                                          
                             <p>&lt;balance&gt; <a href="<?=$point.$key.'&addresses='.$_SESSION['addrs'];
                             ?>" target="blank"><?= $obj[data][balances][0][pending_received_balance]?></a> &lt;/balance&gt; <span style="color:grey;">// ждёт подтверждения</span></p>
                            
<p>&lt;balance&gt; <a href="<?=$point.$key.'&addresses='.$_SESSION['addrs'];
                             ?>" target="blank"><?= $obj[data][balances][0][available_balance]?></a> &lt;/balance&gt; <span style="color:grey;">// баланс</span></p>
                                                       
<p>&lt;time&gt; <a href="<?=$_SERVER['SCRIPT_NAME']?>">другой адрес через <?=(int)$reslt?> мин.</a> &lt;/time&gt;</p>
 
  </div>                           
<!--
       <p>&lt;exit&gt; <a href="<?=$_SERVER['SCRIPT_NAME']?>">выход</a> &lt;/exit&gt;</p>
       -->
