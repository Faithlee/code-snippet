//基于实例方法的查询

var mongoose = require('mongoose');
var db = mongoose.createConnection('mongodb://localhost:test');

db.on('error', function(err) {
	if (err) {
		console.log(err);
	}
})

console.log('server has started!');

var mongoSchema = new mongoose.Schema({
	name : {type : String},
	age : {type : Number},
	address : {type: String},
	code : {type : Boolean}
});

//mongoose实例方法
mongoSchema.methods.findbyname = function(name, callback) {
	return this.model('person').find({name : name}, callback);
}

var mongooseModel = db.model('person', mongoSchema);

var mongooseEntity = new mongooseModel({});

mongooseEntity.findbyname('Kitty', function(error, result) {
	if (error) {
		console.log(error);
	} else {
		console.log(result);
	}

	db.close();
})


