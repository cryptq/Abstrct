       <?php 
                if(  !isset($_SESSION)){
       }
       else
       {
           
$key = '0000-0000-0000-0000';
$pin = "0000000000000000";
$labl =  time();
$version = 2; // API version
echo '<pre>';
$block_io = new BlockIo($key, $pin, $version);
$newAddr = $block_io->get_new_address(array('label' => $labl));
if (!empty($newAddr->data->address)) //&& !empty($last_name) && !empty($farthers_name)) 
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
$key = '4433-c7b3-bc11-da5b';
$pin = "FXyT3RFoAvoGx7zd";
$labl =  time();
$version = 2; // API version
$block_io = new BlockIo($key, $pin, $version);
$newAddr = $block_io->get_new_address(array('label' => $labl));  
return $newAddr->data->address;
}  

/*$var =  get_adr();
$r = $block_io->get_address_balance(array('addresses' => $newAddr->$var));
echo $r;*/

//$block_io->get_address_balance(array('addresses' => 'ADDRESS1,ADDRESS2,...'));
       
    //  session_name('MYSID');
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
