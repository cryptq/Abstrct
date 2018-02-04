/*
function WsTest()
  {
     if ("WebSocket" in window)
     {
      console.log("ws = 'true'");
       else {
       console.log("ws = 'false'")
       }
     }
  */  
    function makeconnect()
{
   if ("WebSocket" in window) {
    console.log("- WebSocket Ready = " +'"'+"true"+'"');
   var ws = new WebSocket("wss://echo.websocket.org");     
      console.log('+ Сервер = '+ws.url);
        ws.onopen = function (){
         console.log("- Соединение установлено !)"); 
document.getElementById("status").classList.add('connected');
                                 

console.log('+ У нас ['+localStorage.length+'] записи')

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
     function send(ws) {
       for (var i = 0; i < localStorage.length; i++) {
        var key = localStorage.key(i);
        ws.send('{' + '"' + key + '"' + ':' + '"' + localStorage[key] + '"' + '}');
        }
      }
    }
  }
};
