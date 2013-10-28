//图片上传的请求程序，直接硬编码，不划分模块
//PS: 需要引用formidable模块，需要将项目放在node安装目录

var queryString = require('querystring'),
	fs = require('fs');
	formidable = require('formidable');

function start(request, response) {
	console.log("Request handle 'start' was called!");

	var body = '<html>' +
		'<head>' +
		'<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>' +
		'</head>' +
		'<body>' +
		'<form action="/upload" method="post" enctype="multipart/form-data">' +
		'<input type="file" name="upload"><br/>' +
		'<input type="submit" value="upload"/>' +
		'</form>' +
		'</body>' +
		'</html>';

	response.writeHead(200, {'content-type': 'text/html'});
	response.write(body);
	response.end();
}

function upload(request, response) {
	console.log("Request handle 'upload' was called!");

	var form = new formidable.IncomingForm();
	console.log('about to parse');
	
	form.parse(request, function(error, fields, files) {
		console.log('parsing done!');

		fs.renameSync(files.upload.path, "./newImg.jpg");
		response.writeHead(200, {'content-type': 'text/html'});
		response.write("received image:<br/>");
		response.write("<img src='/show' />");
		response.end();
	})
}

function show(request, response) {
	console.log("Request hanler 'show' was called!");

	fs.readFile('./newImg.jpg', 'binary', function(error, file) {
		if (error) {
			response.writeHead(500, {'content-type': 'text/plain'});
			response.write(error + "\n");
			response.end();
		} else {
			response.writeHead(200, {'content-type': 'text/jpeg'});
			response.write(file, 'binary');
			response.end();
		}
	});
}

exports.start = start;
exports.upload = upload;
exports.show = show;

