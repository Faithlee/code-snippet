//增加记录，基于model的操作

var mongoose = require('mongoose');
var db = mongoose.createConnection('mongodb://localhost:test');

//监听mongodb
db.on('error', function(err) {
	if (err) {
		console.log(err);
	}
}) 

console.log('server has started!');

var mongoSchema = {
	name : {type : String},
	age : {type : Number},
	address : {type: String},
	code : {type : Boolean}
};

var mongooseModel = db.model('person', mongoSchema);

var person = {name : 'Kitty', age : 23, address : '北京', code : true};
//基于模式的,使用create,基于实例的用save
mongooseModel.create(person, function(error) {
	if (error) {
		console.log(error);
	} else {
		console.log('save data!');
	}
}) 

