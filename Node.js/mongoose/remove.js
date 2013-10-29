//删除操作
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

var mongoModel = db.model('person', mongoSchema);

var conditions = {name : 'Kitty'};
//执行删除
mongoModel.remove(conditions, function(error) {
	if (error) {
		console.log(error);
	} else {
		console.log('delete ok!');
	}

	db.close();
})

