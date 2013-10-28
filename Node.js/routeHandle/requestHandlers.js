//执行URL请求的处理

function started() {
	console.log("Request handler 'started' was called.");
}

function upload() {
	console.log("Request handler 'start' was called.");
}

exports.started = started;
exports.upload = upload;
