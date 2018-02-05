class Blockchain
{
constructor()
{
  this.chain = [this.createGenesisBlock()];
      this.difficulty=2;                                                                                                          //How many 0's must start in the hash
}

createGenesisBlock()
{
  return new Block(0,"01/01/2017","Genesis Block","0");
}

getLatestBlock()
{
  return this.chain[this.chain.length - 1];
}

addBlock(newBlock)
{
  newBlock.previousHash = this.getLatestBlock().hash;
  newBlock.mineBlock(this.difficulty);
  this.chain.push(newBlock);
}

isChainValid()
{
  for (var i = 1 ; i< this.chain.length ; i++)
    {
      const currentBlock = this.chain[i];
      const previousBlock = this.chain[i-1];
      
      if (currentBlock.hash !== currentBlock.calculateHash())
      {
         return false;
      }
      if (currentBlock.previousHash !== previousBlock.hash)
      {
          return false;
      }
      return true;
    }
  }
}
