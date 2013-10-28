//主文件，包含模块，做路由映射

var server = require('./server');
var router = require('./router');
var requestHanlers = require('./requestHandlers');

var handle = {};
handle['/'] = requestHanlers.start;
handle['/start'] = requestHanlers.start;
handle['/upload'] = requestHanlers.upload;
handle['/show'] = requestHanlers.show;

server.start(router.router, handle);
