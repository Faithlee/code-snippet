//处理URL的请求并返回结果

var queryString = require('querystring');

function start(response, postData) {
	console.log("Request handle 'start' was called!");

	var body = 
		'<html>' +
		'<head>' +
		'<meta http-equiv="Content-type" content="text/html; ' +
		'charset=UTF-8"/>' +
		'</head>' +
		'<body>' + 
		'<form action="/upload" method="post">' +
		'<textarea name="text" rows="20" cols="60"></textarea>' +
		'<input type="submit" value="Submit text">' +
		'</form>' +
		'</body>' +
		'</html>';

	response.writeHead(200, {'content-type': 'text/html'});
	response.write(body);
	response.end();
}

function upload(response, postData) {
	console.log("Request handle 'upload' was called!");

	response.writeHead(200, {'content-type': 'text/html'});
	response.write('output post data:');
	response.write('You have sent ' + queryString.parse(postData).text);
	response.end();
}

exports.start = start;
exports.upload = upload;

