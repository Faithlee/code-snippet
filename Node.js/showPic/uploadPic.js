//引用node-formidable包实现图片上传
//PS:需要把当前项目放置到node.js安装目录下

var formidable = require('formidable'),
	http = require('http'),
	sys = require('sys');

http.createServer(function(req, res) {
	if (req.url == '/upload' && req.method.toLowerCase() == 'post')	{
		console.log('parse a file upload');
		//parse a file upload
		var form = new formidable.IncomingForm();

		form.parse(req, function(error, fields, files) {
			res.writeHead(200, {'content-type': 'text/plain'});
			res.write('received upload:\n\n');
			res.end(sys.inspect({fields: fields, files: files}));
		});

		return;
	}

	//show a file upload form
	res.writeHead(200, {'content-type': 'text/html'});
	res.end(
		'<form action="/upload" enctype="multipart/form-data" method="post">' +
		'<input type="text" name="title"><br/>' + 
		'<input type="file" name="upload" multiple="multiple"><br>' +
		'<input type="submit" value="upload">' +
		'</form>'
	);
}).listen(8888);

console.log('Server has started!');
