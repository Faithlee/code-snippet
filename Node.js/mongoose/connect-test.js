var db = require('mongoose').connection;

db.on('error', console.error.bind(console, 'connection error'));
db.once('open', function callback(){
	console.log('hello')	
});

console.log('Server has started!');
