//服务器模块
var http = require('http');

function onRequest(require, response){
	console.log('Request recieved!');
	response.writeHead(200, {"Content-type": "text/plain"});
	response.write('Hello, nodejs!');
	response.end();
}

http.createServer(onRequest).listen(8888);

console.log('Sever has Started!');


