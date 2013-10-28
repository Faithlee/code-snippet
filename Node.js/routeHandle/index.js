//主文件，接受请求

var server = require('./start');
var route = require('./route');
var requestHandlers = require('./requestHandlers');

var handle = {};
handle['/'] = requestHandlers.start;
handle['/start'] = requestHandlers.started;
handle['/upload'] = requestHandlers.upload;

server.start(route.route, handle);
