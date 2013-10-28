//URL解析请求的处理

function start() {
	console.log("Request handle 'start' was called!");
	
	//模拟阻塞操作
	function sleep(times) {
		var current = new Date().getTime();

		while(new Date().getTime() < current + times);
	}

	sleep(10000);

	return "Hello start!";
}

function upload() {
	console.log("Request handle 'upload' was called!");

	return "Hello upload!";
}

exports.start = start;
exports.upload = upload;
