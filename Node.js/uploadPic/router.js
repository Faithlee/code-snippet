//路由器分发请求

function router(handle, pathName, request, response) {
	if (typeof handle[pathName] === 'function') {
		handle[pathName](request, response);
	} else {
		console.log("No request handle found for " + pathName);
		response.writeHead(404, {'content-type': 'text/plain'});
		response.write('404 Not found!');
		response.end();
	}
}

exports.router = router;
