var mongoose = require('mongoose');
var db = mongoose.createConnection('mongodb://localhost:test');

db.on('error', function(err) {
	console.log(err);
});

console.log('server has started!');

//mongo储存数据类型，另一种方式是对象方式： mongoSchema = mongoose.Schema({});
//需要注意这两种情况，后者在查询是要用到，而前者无法执行
var mongoSchema = {
	name : {type : String},
	age : {type : Number},
	address : {type: String},
	code : {type : Boolean}
};

//修改记录,基于model的
var mongooseModel = db.model('person', mongoSchema);

var conditions = {name : 'Kitty'};
var update = {$set : {age : 30, address : '北京海淀区'}};
var option = {upsert: true};

mongooseModel.update(conditions, update, option, function(error) {
	if (error) {
		console.log(error);
	} else {
		console.log('update ok!');
	}

	db.close();
})


