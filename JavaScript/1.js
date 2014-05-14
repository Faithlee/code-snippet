var object = {
	test1: [[1, 2], [3, 4]],
	test2: [[5, 6], [7, 8]]
};

var points = [
	{x: 0, y: 1},
	{x: 1, y: 0}
]

console.log(object.test1[0][1])
console.log(points)

var count =0;
var a = count++;
console.log(a, count);


var a = [];
//添加多个元素
a.push(1, 2, 3);
console.log(a)
a.reverse()
console.log(a)



points.dist = function () {
	var p1 = this[0];
	var p2 = this[1];
	var a = p2.x - p1.x;
	var b = p2.y - p1.y;

	return Math.sqrt(a * a + b*b);
}



console.log(points.dist(), points[0], points[1]);


//abs function
function abs (x) {
	if (x > 0)	{
		return x;	
	} else {
		return -x;	
	}
}

console.log(abs(-5));

//阶乘
function factorial(n){
	var product = 1;
	while(n > 1) {
		product *= n;	
		n--;
	}

	return product;
}

function factorial2(n) {
	var product = 1;
	for (var i = 1; i <= n; i++) {
		product *= i;	
	}

	return product;
}

console.log(factorial(4));
console.log(factorial2(4))


//构造函数
function Point(x, y) {
	this.x = x;
	this.y = y;
}

var p = new Point(1, 1);

//console.log(p)
Point.prototype.r = function () {
	return Math.sqrt(
		this.x * this.x + this.y * this.y
	)	
}

console.log(p.r());
