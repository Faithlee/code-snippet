//主文件,包含应用模块

var server = require('./server');
var router = require('./route');
var requestHandlers = require('./requestHandlers1');

var handler = {};
handler['/'] = requestHandlers.start;
handler['/start'] = requestHandlers.start;
handler['/upload'] = requestHandlers.upload;

server.start(router.route, handler);

