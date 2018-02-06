<?
include('ipfs_class.php');
class balance {
     public function check ($path='/json/balance.json') {

     $balance_url = $_SERVER['DOCUMENT_ROOT'].$path;

     $json = @file_get_contents($balance_url);

     $json = json_decode($json,true);

     echo $json ['data']['available_balance'];
        
     } 
  }
$balance = new balance;

  class func {
    public function init_trig () {
        echo 'func()';
    }
 }
$func = new func;
