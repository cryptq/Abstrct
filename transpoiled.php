<?php
function makeconnect() {
if (isset($window["WebSocket"])) {
$console->log("- WebSocket Ready = " + '"' + "true" + '"');
$ws = new WebSocket("wss://echo.websocket.org");
$console->log('+ Сервер = ' + $ws->url);
$ws->onopen = function () use (&$ws) {
$console->log("- Соединение установлено !)");
$document->getElementById("status")->classList->add('connected');
$console->log('+ У нас [' + count($localStorage) + '] записи');
send($ws);
$ws->onmessage = function ($evt) {
$console->log('+ ' + $evt->data + " Отправлено ");
function kvl($evt) use (&$evt) {
for ($i = 0;
$i < $evt->data;$i++) {$key = $evt->data->key($i);
}$console->log(kvl(), $key + ' = ' + $evt->data[$key]);
$console->log(kvl(), $evt->data[$key]);
}
}
;
function send($ws) use (&$ws) {
for ($i = 0;
$i < count($localStorage);$i++) {$key = $localStorage->key($i);
$ws->send('{' + '"' + $key + '"' + ':' + '"' + $localStorage[$key] + '"' + '}');
}}
}
;
}}
function date_time() {
$Data_Now = new Date();
$Year = Data_Now::getFullYear();
$Month = Data_Now::getMonth();
$Day = Data_Now::getDate();
$Hour = Data_Now::getHours();
$Minutes = Data_Now::getMinutes();
$Seconds = Data_Now::getSeconds();
switch ($Month){case 0:
$fMonth = "января";
break;
case 1:
$fMonth = "февраля";
break;
case 2:
$fMonth = "марта";
break;
case 3:
$fMonth = "апреля";
break;
case 4:
$fMonth = "мая";
break;
case 5:
$fMonth = "июня";
break;
case 6:
$fMonth = "июля";
break;
case 7:
$fMonth = "августа";
break;
case 8:
$fMonth = "сентября";
break;
case 9:
$fMonth = "октября";
break;
case 10:
$fMonth = "ноября";
break;
case 11:
$fMonth = "декабря";
break;
}return time_date();
function time_date() use (&$Day, &$fMonth, &$Year, &$Hour, &$Minutes, &$Seconds) {
return $Day + " " + $fMonth + " " + $Year + ' года' + ' ' + $Hour + ":" + $Minutes + ":" + $Seconds;
}
}
class Block
{
public $nonce;
public function __construct($index, $timeStamp, $data, $previousHash) {
$this->index = $index;
$this->timeStamp = date_time();
$this->data = $data;
$this->previousHash = $previousHash;
$this->hash = $this->calculateHash();
$this->nonce = 0;
}
public function calculateHash() {
return ();
}
public function mineBlock($difficulty) {
while ($this->hash->substring(0, $difficulty) !== join("0", Array($difficulty + 1))) {$this->nonce++;
$this->hash = $this->calculateHash();
}$console->log("Блок создан: " + $this->hash);
}

}
class Blockchain
{
public $difficulty;
public function __construct() {
$this->chain = array($this->createGenesisBlock());
$this->difficulty = 2;
}
public function createGenesisBlock() {
return new Block(0, date_time(), "Genesis Block", "0");
}
public function getLatestBlock() {
return $this->chain[count($this->chain) - 1];
}
public function addBlock($newBlock) {
$newBlock->previousHash = $this->getLatestBlock()->hash;
$newBlock->mineBlock($this->difficulty);
array_push($this->chain, $newBlock);
}
public function isChainValid() {
for ($i = 1;
$i < count($this->chain);$i++) {$currentBlock = $this->chain[$i];
$previousBlock = $this->chain[$i - 1];
if ($currentBlock->hash !== $currentBlock->calculateHash()) {
return false;
}if ($currentBlock->previousHash !== $previousBlock->hash) {
return false;
}return true;
}}

}
makeconnect();
