window.onload = function() {
	history.pushState(null, null, document.URL);
	window.addEventListener('popstate', function() {
		history.pushState(null, null, document.URL);
	});
//	var t = 10;
//	var time = document.getElementById("time");
//	//console.log(time);
//	setInterval(function() {
//		if(t > 1) {
//			t -= 1;
//			time.innerHTML = t;
//		} else if(t == 1) {
//			这个php中js重定向的页面关闭代码无效..	
//		}
//	}, 1000);
}