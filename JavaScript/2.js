//debug调试信息
function debug(msg) {
	var log = document.getElementById('debuglog');

	if (!log) {
		log = document.createElement('div');
		log.id = 'debuglog';
		log.innerHTML = '<h1>DEBUG LOG</h1>';
		document.body.appendChild(log);
	}

	var pre = document.createElement('pre');
	var text = document.createTextNode(mgs);
	pre.appendChild(text);
	log.appendChild(pre);
}


//设置元素的显隐
function hide(e, reflow) {
	if (reflow)	{
		e.style.display = 'none';
	} else {
		e.style.visibility = 'hidden';
	}
}


//高亮显示
function highlight(e) {
	if (!e.className) {
		e.className = 'hilite';
	} else {
		e.className += ' hilete';
	}
}



