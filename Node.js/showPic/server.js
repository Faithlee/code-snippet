//在浏览器中显示图片

var fs = require('fs');
var http = require('http');

http.createServer(function(request, response) {
	fs.readFile('./test.jpg', 'binary', function(error, file) {
		if (error) {
			response.writeHead(500, {'content-type': 'text/plain'});
			response.write(error + "\n");
			response.end();
		} else {
			response.writeHead(200, {'content-type': 'image/jpeg'});
			response.write(file, 'binary');
			response.end();
		}
	});
}).listen(8888);

console.log('Server has started!');
