var mongoose = require('mongoose');

//mongoose的连接库的方式一：
//如果加了端口号时指定库时要用'/'
var db = mongoose.connect('mongodb://127.0.0.1:27017/test');

mongoose.connection.once('connected', function(){
	console.log('Connected to database!');
});

db.close();

//mongoose连接方式二：
//用默认端口
//var db = mongoose.createConnection('mongodb://localhost:test')



