function makeconnect()                         
    {                                                        // устанавливаем websocket соединения
       if ("WebSocket" in window) {                         // для мгновенной передачи данных
        console.log("- WebSocket Ready = " +'"'+"true"+'"');
       var ws = new WebSocket("wss://echo.websocket.org");     
          console.log('+ Сервер = '+ws.url);
            ws.onopen = function (){
             console.log("- Соединение установлено !)"); 
    document.getElementById("status").classList.add('connected');  //зажигаем лампочку коннект =)
    console.log('+ У нас ['+localStorage.length+'] записи')       //проверяем хранилище
                                             send(ws);
    ws.onmessage = function (evt) {
      console.log('+ '+evt.data+" Отправлено ");                                                   
      function kvl(evt) {
      for (var i = 0; i < evt.data; i++) {
        var key = evt.data.key(i);
      }
         console.log(kvl(),key + ' = ' + evt.data[key]);
         console.log(kvl(), evt.data[key]);    
      }  
      }
         function send(ws) {                                  //используем локальное хранилище
           for (var i = 0; i < localStorage.length; i++) {
            var key = localStorage.key(i);
            ws.send('{' + '"' + key + '"' + ':' + '"' + localStorage[key] + '"' + '}');
            }
          }
        }
      }
		};	
function date_time() {                                        
	Data_Now = new Date();
	Year = Data_Now.getFullYear();
	Month = Data_Now.getMonth();
	Day = Data_Now.getDate();
	Hour = Data_Now.getHours();
	Minutes = Data_Now.getMinutes();
	Seconds = Data_Now.getSeconds();
	switch (Month) {
		case 0:
			fMonth = "января";
			break;
		case 1:
			fMonth = "февраля";
			break;
		case 2:
			fMonth = "марта";
			break;
		case 3:
			fMonth = "апреля";
			break;
		case 4:
			fMonth = "мая";
			break;
		case 5:
			fMonth = "июня";
			break;
		case 6:
			fMonth = "июля";
			break;
		case 7:
			fMonth = "августа";
			break;
		case 8:
			fMonth = "сентября";
			break;
		case 9:
			fMonth = "октября";
			break;
		case 10:
			fMonth = "ноября";
			break;
		case 11:
			fMonth = "декабря";
			break;  }
	 return time_date();
	function time_date(){
		return Day + " " + fMonth + " " + Year + ' года'+' '+ Hour + ":" + Minutes + ":" + Seconds;
	}
}
class Block                                           //
{
	constructor(index, timeStamp, data, previousHash)
	{
		this.index = index;                                                                                                             
		this.timeStamp = date_time();                                                                                                                 
		this.data = data;
		this.previousHash = previousHash;
		this.hash = this.calculateHash();
    this.nonce = 0;                          //Случайное значение
	}

	calculateHash()						          //Используем sha256 алгоритм для создания хэша на основе переданной строки
	{
  		return generate.SHA256(this.index + this.previousHash + this.timeStamp + JSON.stringify(this.data) + this.nonce).toString();
	}
  
  mineBlock(difficulty)       //Доказательство выполнения работы "Proof-of-work"
  {
    while(this.hash.substring(0,difficulty) !== Array(difficulty + 1).join("0"))
      {
        this.nonce++;
        this.hash = this.calculateHash();
      }
    console.log("Блок создан: " + this.hash);
  }
}
                                   //
class Blockchain
{
	constructor()
	{
		this.chain = [this.createGenesisBlock()];
    this.difficulty=2;                                /*начальная сложность*/
	}

	createGenesisBlock()
	{
		return new Block(0,date_time(),"Genesis Block","0");
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
makeconnect()
