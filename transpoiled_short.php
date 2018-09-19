<?php
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
