//条件查询
var mongoose = require('mongoose');
var db = mongoose.createConnection('mongodb://localhost:test');

//监听db
db.on('error', function(err) {
	console.log(err);
})

console.log('server has started!');

//Schema结构
var mongoSchema = new mongoose.Schema({
	name : {type : String},
	age : {type : Number},
	address : {type : String},
	code : {type : Boolean}
});

//model应用层
var mongoModel = db.model('person', mongoSchema);

//查询条件
var criteria = {name : 'Kitty'};
//注意：fields中显示字段为1即可，为0会报警告，全显示为{}即可
var fields = {code : 1, address : 1, age : 0};//{address : 1, age : 0};
var options = {};

mongoModel.find(criteria, fields, options, function(error, result) {
	if (error) {
		console.log(error);
	} else {
		console.log(result);
	}

	db.close();
})
