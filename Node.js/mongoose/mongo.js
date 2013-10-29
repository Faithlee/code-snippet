var mongoose = require('mongoose');

var db = mongoose.connect('mongodb://127.0.0.1:27017/test');

mongoose.connection.once('connected', function(){
	console.log('Connected to database!');
});
