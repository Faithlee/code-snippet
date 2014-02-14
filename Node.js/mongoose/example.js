//mongoose参考实例，需要将此文件在node/bin下运行

var mongoose = require('mongoose');

var db = mongoose.createConnection('mongodb://localhost/test');

db.on('error', function(error) {
	console.log(error);
})

//console.log('Server Has Started!');

//schema结构, PS: schema是mongoose的，不是db的
//default：设置注释
var mongooseSchema = mongoose.Schema({
	username : {type : String, default : '用户'},
	title : {type : String},
	content : {type : String},
	time : {type : Date},
	age : {type : Number}
});

//添加 mongoose 实例方法 findbyusername
mongooseSchema.methods.findbyusername = function(username, callback) {
	return this.model('mongoose').find({username : username}, callback);
}

//#####注意区分静态方法与非静态方法#####
//添加 mongoose 静态方法 findbytitle, 静态方法在Model层就能使用；
mongooseSchema.statics.findbytitle = function(title, callback) {
	return this.model('mongoose').find({title: title}, callback);
}

var mongooseModel = db.model('mongoose', mongooseSchema);

var doc = {username : 'Node.js', title: 'MongoDB Test', content : 'test entity content'};

var mongooseEntity = new mongooseModel(doc);
mongooseEntity.save(function(error) {
	if (error) {
		console.log(error);
	} else {
		console.log('save OK!');
	}

	db.close();
});
