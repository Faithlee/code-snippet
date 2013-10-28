//路由器模块解析url参数

function route(handle, pathName) {
	console.log("About to route a request for " + pathName);

	if (typeof handle[pathName] === 'function') {
		handle[pathName]();
	} else {
		console.log("No request handle found for " + pathName);
	}
}

exports.route = route;
