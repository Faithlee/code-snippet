//基于静态方法查询
var mongoose = require('mongoose');
var db = mongoose.createConnection('mongodb://localhost:test');

db.on('error', function(err) {
	if (err) {
		console.log(err);
	}
})

console.log('server has started!');

//Schema 结构,注意需大小写, 以对象的形式输出
var mongoSchema = new mongoose.Schema({
	name : 	{type: String},
	age : {type : Number},
	address : {type : String},
	code : {type: Boolean}
});

//静态查询方法(statics)，在model层就能使用
mongoSchema.statics.findByAge = function(age, callback) {
	return this.model('person').find({age: age}, callback);
}

var mongooseModel = db.model('person', mongoSchema);

//静态方法的查询
mongooseModel.findByAge(30, function(error, result) {
	if (error) {
		console.log(error);
	} else {
		console.log(result);
	}

	db.close();
});
