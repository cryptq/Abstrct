class Block
{
	constructor(index, timeStamp, data, previousHash)
	{
		this.index = index;                                                                                                             
		this.timeStamp = timeStamp;                                                                                                                 
		this.data = data;
		this.previousHash = previousHash;
		this.hash = this.calculateHash();
    		this.nonce = 0;                         //Случайное значение, используемое при расчете добычи
	}

	calculateHash()			             //Используем sha256 алгоритм для создания хэша на основе переданной строки
	{
  		return TryTry.SHA256(this.index + this.previousHash + this.timeStamp + JSON.stringify(this.data) + this.nonce).toString();
	}
  
  mineBlock(difficulty)                         //Доказываем выполнение работы "Proof-of-work"
  {
    while(this.hash.substring(0,difficulty) !== Array(difficulty + 1).join("0"))
      {
        this.nonce++;
        this.hash = this.calculateHash();
      }
    console.log("блок успешно сгенерирован : " + this.hash);
  }
}
