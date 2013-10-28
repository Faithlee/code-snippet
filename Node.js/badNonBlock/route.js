//路由器模块，将解析的URL分发requestHandlers

function route(handle, pathName) {
	console.log("About to route a request for" + pathName);

	if (typeof handle[pathName] === 'function') {
		return handle[pathName]();
	} else {
		console.log('No request handle found for' + pathName);
		return "404 Not found";
	}
}

exports.route = route;
