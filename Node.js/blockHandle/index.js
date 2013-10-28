//主文件，演示阻塞(start)与非阻塞(upload)操作

var server = require('./start');
var router = require('./route');
var requestHandlers = require('./requestHandlers');

var handler = {};
handler['/'] = requestHandlers.start;
handler['/start'] = requestHandlers.start;
handler['/upload'] = requestHandlers.upload;

server.start(router.route, handler);
