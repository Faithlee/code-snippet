//mongodb链接测试
var mongodb = require('mongodb');

//链接本地数据库
var server = new mongodb.Server("127.0.0.1", 27017, {});
//选择mongotest数据库
var mongotest = new mongodb.Db('mongotest', server, {});

//创建mongo客户端
mongotest.open(function(error, client) {
	if (error) {
		throw error;
	}

	var collection = new mongodb.Collection(client, 'user');
	collection.find(function(error, cursor) {
		cursor.each(function(error, doc) {
			console.log('name: ' + doc.name);
	});	   
});

//	collection.find().toArray(function(err, results) {
//		console.log(results);
//	});
});
console.log('server has started!');
