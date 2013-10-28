//URL解析，服务器程序

var http = require('http'),
	url = require('url');

function start(router, handle) {
	function onRequest(request, response) {
		console.log("Request was received!");
		
		var pathName = url.parse(request.url).pathname;
		router(handle, pathName, request, response);
	}

	http.createServer(onRequest).listen(8888);
	console.log('Server has started!');
}

exports.start = start;
