<?
$ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "$protocol_1"."$active_node_1".':5001'.'/api/v0/add?'.'pin=true');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, "------IPFSMini53160.30807506951.44259.48279814342\r\nContent-Disposition: form-data; \r\nContent-Type: application/octet-stream\r\n\r\n ".$var1."\n".$var2."\n".$var." \r\n------IPFSMini53160.30807506951.44259.48279814342--");
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 YaBrowser/17.7.1.791 Yowser/2.5 Safari/537.36');
//curl_setopt($ch, CURLOPT_POSTFIELDS, "ipfs add -r ~/files");
$headers = array();
$headers[] = "Accept-Language: ru,en;q=0.8";
$headers[] = "X-Compress: null";
$headers[] = "Content-Type: multipart/form-data; boundary=----IPFSMini53160.30807506951.44259.48279814342";
$headers[] = "Accept: application/json";          
$headers[] = "Connection: keep-alive";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
$abc = $result[9].$result[10].$result[11].$result[12].$result[13].$result[14].$result[15].$result[16].$result[17].$result[18].$result[19].$result[20].$result[21].$result[22].$result[23].$result[24].$result[25].$result[26].$result[27].$result[28].$result[29].$result[30].$result[31].$result[32].$result[33].$result[34].$result[35].$result[36].$result[37].$result[38].$result[39].$result[40].$result[41].$result[42].$result[43].$result[44].$result[45].$result[46].$result[47].$result[48].$result[49].$result[50].$result[51].$result[52].$result[53].$result[54];
