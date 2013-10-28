//处理路由器分发

var exec = require("child_process").exec;

function start(response) {
	console.log("Request handle 'start' was called!");
	exec("ls -lah", function(err, stdout, stderr){
		response.writeHead(200, {'content-type': 'text/plain'});
		response.write(stdout);
		response.end();
	});
}

function upload(response) {
	console.log("Request handler 'upload' was called!");

	response.writeHead(200, {'content-type': 'text/plain'});
	response.write('Hello upload');
	response.end();
}

exports.start = start;
exports.upload = upload;
