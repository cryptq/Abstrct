<?
class ipfs{
     public function put () {         
         if (isset($_POST['put_this'])) { $var = $_POST['put_this'];            
             include ('_param.php');                     // параметры    
             echo '<pre>';
             print ($var);       
             include ('_headers.php');                // заголовки выполнения запроса
                 if (curl_errno($ch)) {
              echo 'Error:' . curl_error($ch);
                 }             
              echo '</p>',
               '<br><key>'.$abc.'</key>';
              curl_close ($ch);
          } else {
              echo '<br><div class="">else</div>';
                 }            
          }
        public function get () {
            if (isset($_POST['get_this'])) { 
                $var = $_POST['get_this'] ;
                include ('_param.php');                                         
                echo '<pre>'.$hash.'</pre>'."\n",
                 '<key id="'.$var.'"'.' alt="'.$var.'"'.'>'.'&gt;_ ~ Key: '.$var.'</key>',
                 '<key style="margin-left:5px;" id="'.$var.'"'.' alt="'.$var.'"'.'>'.'&gt;_ ~ S: '."SAVE".'</key>';
            }
              else { 
               }
            }
         }
         $ipfs = new ipfs;
