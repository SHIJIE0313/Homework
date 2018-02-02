(function() {
	var form = document.getElementById('login');
	addEvent(form, 'submit', function(e) {
		e.preventDefault();
		var elements = this.elements;
		var username = elements.username.value;
		var msg = '登陆成功'+'Welcome' + username;
		document.getElementById('main').textContent = msg;
	});
}());