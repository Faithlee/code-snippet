//引入mongodb模块包
var includePath = '../lib/mongodb';

var mongodb = require(includePath);
var Client = mongodb.MongoClient,
	Server = mongodb.Server,
	Db = mongodb.Db;
	assert = require('assert');

var db = new Db('test', new Server('localhost', 27017));

db.open(function(err, db) {
	var collection = db.collection('newuser');
	collection.insert({name : 'mongodb'});

	setTimeout(function() {
		collection.findOne({name : 'mongodb'}, function(err, item) {
			assert.equal('null', err);
			assert.equal('mongodb1', item.name);

			db.close();
		});
	});
});


