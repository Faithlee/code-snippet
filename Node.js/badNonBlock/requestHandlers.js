//错误的使用非阻塞操作方式

var exec = require('child_process').exec;

function start() {
	console.log('Request handle "start" was called!');
	var content = 'empty';
//"find /"
	exec("ls -lah", function(error, stdout, stderr){
		content = stdout;
	});

	return content;
}

function upload() {
	console.log("Request handle 'upload' was called!");
	return "Hello Upload!";
}

exports.start = start;
exports.upload = upload;
