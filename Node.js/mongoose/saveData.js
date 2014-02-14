var mongoose = require('mongoose');
var db = mongoose.createConnection('mongodb://localhost:test');

//注册error事件，监听是否启动
db.on('error', function(err) {
	console.log(err);
})

//console.log('Server Has Started')

//定义添加数据模式
var schema = new mongoose.Schema({
	name : {type : String, default : '名字'},
	age : {type : Number, defautl : 0},
	sex : {type : Boolean, default : true}
});

var mongodbModel = db.model('new_person', schema);

var person = {name : 'Bruce', age : 25, sex : false};
var personEntity = new mongodbModel(person);

personEntity.save(function(err) {
	if (err) {
		console.log(err);
	} else {
		console.log('save data!');
	}

	db.close();
});


