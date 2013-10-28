//主文件，演示非阻塞操作

var server = require('./server');
var router = require('./route');
var requestHandlers = require('./requestHandlers');

var handler = {};
handler['/'] = requestHandlers.start;
handler['/start'] = requestHandlers.start;
handler['/upload'] = requestHandlers.upload;

server.start(router.route, handler);

