//mongoDB连接类,注意此文件必须放置在node的bin目录

var mongoose = require('mongoose');

//链接mongodb的test库
mongoose.connect('mongdb://localhost/test');

