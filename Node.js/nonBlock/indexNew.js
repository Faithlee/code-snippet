//主文件,将模块包含进来

var server = require('./server');
var router = require('./route');
var requestHandlers = require('./requestHandlers1');

var handle = {};
handle['/'] = requestHandlers.start;
handle['/start'] = requestHandlers.start;
handle['/upload'] = requestHandlers.upload;

server.start(router.route, handle);

