//http模块及路由器模块

var http = require('http');
var url = require('url');

function start(route) {
	function onRequest(request, response) {
		var pathName = url.parse(request.url).pathname;

		route(pathName);

		response.writeHead(200,{"Content-type":"text/plain"});
		response.write("Nodejs, use module style realize!");
		response.end();
	}

	http.createServer(onRequest).listen(8888);

	console.log("Server has started!");
}

exports.start = start;
