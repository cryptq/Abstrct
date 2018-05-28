<style>
    p{text-align: center;}
        </style>
<?php $link = "https://chain.api.btc.com/v3/block/date/".date("Ymd");
      $json = @file_get_contents($link);
      $blocks = json_decode($json,true);
   echo '<p>'.date("Y/m/d").'</p><pre>';
print_r ($blocks);                        ///
?>
