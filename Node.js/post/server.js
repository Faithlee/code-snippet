//URL请求处理程序,应用层

var http = require('http');
var url = require('url');

function start(route, handle) {
	function onRequest(request, response) {
		var postData = '';
		var pathName = url.parse(request.url).pathname;
		console.log('Request for ' + pathName + ' received!');

		//设置字符集
		request.setEncoding("utf8");

		//注册监听器
		request.addListener('data', function(postDataChunk){
			postData += postDataChunk;
			console.log("Received POST data chunk '" + postDataChunk + "'!");
		});

		//执行特定事件end，直到所有提交数据结束交由路由器处理
		request.addListener('end', function(){
			route(handle, pathName, response, postData);
		});
	}

	http.createServer(onRequest).listen(8888);
	console.log("Server has started!");
}

exports.start = start;
