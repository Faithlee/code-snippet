//处理URL的请求并返回执行结果

var exec = require('child_process').exec;

function start(response) {
	console.log("Request handle 'start' was called!");
	
	exec('find /',
		{timeout: 10000, maxBuffer: 20000 * 1024},
		function(error, stdout, stderr) {
			response.writeHead(200, {'content-type':'text/plain'});
			response.write(stdout);
			response.end();
		});
}

function upload(response) {
	console.log("Request Handle 'upload' was called!");

	response.writeHead(200, {'content-type': 'text/plain'});
	response.write('Hello, upload!');
	response.end();
}

exports.start = start;
exports.upload = upload;

