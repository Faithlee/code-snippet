//路由器模块，解析请求并分发

function route(handle, pathName, response, postData) {
	console.log("About to route a request for " + pathName);

	if (typeof handle[pathName] === 'function') {
		handle[pathName](response, postData);
	} else {
		console.log("No request handle found for " + pathName);

		response.writeHead(404, {"content-type": "text/plain"});
		response.write('404 Not found!');
		response.end();
	}
}

exports.route = route;
