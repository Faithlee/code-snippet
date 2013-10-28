//start.js请求
//var server = require('./start');

//server.start();

//start1.js请求

var server = require('./start1');
var router = require('./route');

server.start(router.route);

