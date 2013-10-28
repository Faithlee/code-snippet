//路由器模块，解析URL参数

var http = require('http');
var url = require('url');

function start() {
	function onRequest(request, response) {
		var pathname = url.parse(request.url).pathname;

		console.log('Request for ' + pathname + ' receivedd!');

		response.writeHead(200, {"Content-type":"text/plain"});
		response.write('Hello, Nodejs!');
		response.end();
	}

	http.createServer(onRequest).listen(8888);
	console.log('Server has started!');
}

//导出模块，在新文件中引用
exports.start = start;
