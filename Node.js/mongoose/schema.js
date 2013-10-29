//mongodb schema

var mongoose = require('mongoose');
var db = mongoose.createConnection('mongodb://localhost:test');

var kittySchema = mongoose.Schema({
	name : {type :String, default : '名字'}
});

//note: method must be added to the schema before compiling it with mongoose.model()
kittySchema.methods.speak = function() {
	var greeting = this.name 
		? 'My name is ' + this.name
		: 'I don\' have a name!';

	console.log(greeting);
}

var Kitten =  db.model('Kitten', kittySchema);
var kitty = new Kitten({name : 'kitty'});

//console.log(kitty.name);

kitty.save(function(err, kitty) {
	if (err) {
		console.log(err);
	} else {
		console.log(12131231)
	}
});
/**/

/*
Kitten.find(function(err, kitty) {
	if (err) {
		console.log(kitty);
	}
});
*/

