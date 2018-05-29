<style>
       p{text-align: center;}
    pre.pre_pre {
        opacity: 0.3;
    color: yellow;
    font-size: 2px;
    position: absolute;
    padding: 14px;
    background: #99999999;
    left: 36px;
    bottom: 200px;
    border-radius: 5px;
    height: 7%;
}
hash, object{transition: all 1s;}
    hash.mrkl_root {
        position: fixed;
    top: 60px;
    text-align: center;
    left: 100px;
    font-size: 13px;
}
hash.timestamp {
    position: fixed;
    top: 80px;
    text-align: center;
    left: 79px;
}
hash.hash {
    position: fixed;
    top: 380px;
    text-align: center;
    left: 93px;
    font-size: 13px;
}
hash.prev_block_hash {
    position: fixed;
    top: 192px;
    text-align: center;
    font-size: 10px;
    left: -118px;
    transform: rotate(-90deg);
    padding: 66px;
}
hash.prev_block_hash:hover {
    font-size: 25px;
    left: 32px;
    top: 130px;
    transform: rotate(-0deg);
    background: #8bc34ae8;
    color: #fff;
    padding: 62px;
    z-index: 10;
    border-radius: 5px;
}
hash.next_block_hash {
    position: fixed;
    font-size: 10px;
    top: 157px;
    left: 300px;
    padding: 66px;
    text-align: center;
    transform: rotate(-90deg);
}
hash.next_block_hash:hover{    font-size: 25px;
    left: 32px;
    top: 130px;
    transform: rotate(-0deg);
    background: #8bc34ae8;
    color: #fff;
    padding: 44px;
    z-index: 10;
    border-radius: 5px;}
pre.pre {
    position: fixed;
    font-size: 7px;
    left: 160px;
    top: 105px;
    z-index: 0;
    transition: all .3s;
}
pre.pre:active {
    font-size: 15px;
    background: #000;
    color: #fff;
    padding: 25px;
    border-radius: 10px;
}
pool.pool_link {
    position: fixed;
    bottom: 120px;
    right: 59px;
}
pool.pool_name {
    position: fixed;
    top: 397px;
    left: 410px;
}
a {
    color: inherit;
    text-decoration: none;
}
        </style>
<?php $link = "https://chain.api.btc.com/v3/block/date/".date("Ymd");
      $json = @file_get_contents($link);
      $blocks = json_decode($json,true);
   echo '<p>'.date("Y/m/d").'</p><pre>';
print_r ($blocks);                ///
?>

/////////////////////////////////////////////?/

<?php error_reporting(0);
      $link = "https://chain.api.btc.com/v3/block/date/".date("Ymd");
      $json = @file_get_contents($link);
      $blocks = json_decode($json,true);
      $a = count($blocks['data']);$b = 1;$count = $a-$b;

/*




*///print_r ($blocks['data']['0']);

$timestamp = $blocks['data'][$count]['timestamp'];
//echo $blocks['data'][$count]['timestamp'];
$datetimeFormat = 'H:i:s';

$date = new \DateTime();
// If you must have use time zones
// $date = new \DateTime('now', new \DateTimeZone('Europe/Helsinki'));
$date->setTimestamp($timestamp);
//echo $date->format($datetimeFormat);


   print '<p>'.date("Y/m/d").'</p><p>'.$count.'</p>'
   .'<hash class="timestamp" >'.$date->format($datetimeFormat).'</hash>'."\n"
   .'<hash class="mrkl_root" >'.$blocks['data'][$count]['mrkl_root'].'</hash>'."\n"
   .'<hash class="hash" >'     .$blocks['data'][$count]['hash']     .'</hash>'."\n"
   .'<hash class="prev_block_hash" >'."\n"
   .'<a href="https://chain.api.btc.com/v3/block/'.$blocks['data'][$count]['next_block_hash'].'" target="blank">'."\n"
   .$blocks['data'][$count]['prev_block_hash'].'</hash>'.'</a>'."\n"
   .'<hash class="next_block_hash" >'."\n"
   .'<a href="https://chain.api.btc.com/v3/block/'.$blocks['data'][$count]['next_block_hash'].'" target="blank">'."\n"
   .$blocks['data'][$count]['next_block_hash'].'</hash>'.'</a>'."\n"
   .'<pool class="pool_name" >'."\n"
   .'<a href="'.$blocks['data'][$count]['extras']['pool_link'].'" target="blank">'."\n"
   .$blocks['data'][$count]['extras']['pool_name'].'</a>'."\n"
   .'</pool>'."\n" //
  // .'<pool class="pool_link" >'.$blocks['data'][$count]['extras']['pool_link'].'</pool>'."\n"
  ;


echo '<pre class="pre">';
$_1_ = 1; $_1 = $count - $_1_;
   print_r ($blocks['data'][$count]); 
   echo '</pre>';?>
