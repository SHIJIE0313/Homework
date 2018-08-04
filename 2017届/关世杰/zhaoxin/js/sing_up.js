window.onload = function() {

	//封装一个获取元素的函数，获取时更便捷
	function byId(id) {
		return typeof(id) === "string" ? document.getElementById(id) : id;
	}
	var Name = byId("Name"),
		s1 = byId("s1"),
		s2 = byId("s2"),
		s3 = byId("s3"),
		s4 = byId("s4"),
		s5 = byId("s5"),
		s6 = byId("s6"),
		ss1 = byId("ss1"),
		ss2 = byId("ss2"),
		ss3 = byId("ss3"),
		sex = byId("sex"),
		address = byId("address"),
		tel = byId("tel"),
		schoolname = byId("schoolname"),
		idnum = byId("idnum"),
		choose1 = byId("choose1"),
		area1 = byId("area1"),
		put = byId("put"),
		choose3 = byId("choose3");
	//名字检测
	Name.onblur = function() {
		var sensitive = Name.value.split("");

		if(Name.value == "") {
			s1.style.display = "inline-block";
			s1.style.color = "red";
			s1.innerHTML = "*姓名不能为空";
		} else if(isNaN(Name.value) == false) {
			s1.style.display = "inline-block";
			s1.style.color = "red";
			s1.innerHTML = "*请输入正确名字";
		} else {
			for(var i = 0; i < sensitive.length; i++) {
				if(sensitive[i] == "傻") {
					s1.style.display = "inline-block";
					s1.style.color = "red";
					s1.innerHTML = "*出现敏感词";
					break;
				}
				s1.style.display = "inline-block";
				s1.style.color = "green";
				s1.innerHTML = "√";
				//s1.innerHTML="<img  src='../img/zhengque.png'/>"
			}

		}

		//性别检测
		sex.onblur = function() {
			if(sex.value == "") {
				s2.style.display = "inline-block";
				s2.style.color = "red";
				s2.innerHTML = "*性别不能为空";
			} else if(sex.value == "男" || sex.value == "女") {
				s2.style.display = "inline-block";
				s2.style.color = "green";
				s2.innerHTML = "√"
			} else {
				s2.style.display = "inline-block";
				s2.style.color = "red";
				s2.innerHTML = "*请输入正确性别";
			}

		}

		//籍贯检测
		address.onblur = function() {
			if(address.value == "") {
				s3.style.display = "inline-block";
				s3.style.color = "red";
				s3.innerHTML = "*籍贯不能为空";
			} else {
				s3.style.display = "inline-block";
				s3.style.color = "green";
				s3.innerHTML = "√"
			}

		}

		//手机号检测
		tel.onblur = function() {
			if(tel.value == "") {
				s4.style.display = "inline-block";
				s4.style.color = "red";
				s4.innerHTML = "*手机号不能为空";
			} else if(tel.value.length != 11) {
				s4.style.display = "inline-block";
				s4.style.color = "red";
				s4.innerHTML = "*请输入正确手机号";
			} else {
				s4.style.display = "inline-block";
				s4.style.color = "green";
				s4.innerHTML = "√";
			}

		}

		//学院检测
		schoolname.onblur = function() {
			if(schoolname.value == "") {
				s5.style.display = "inline-block";
				s5.style.color = "red";
				s5.innerHTML = "*学院名称不能为空";
			} else {
				s5.style.display = "inline-block";
				s5.style.color = "green";
				s5.innerHTML = "√";
			}

		}

		//学号检测
		idnum.onblur = function() {
			var Num = idnum.value.slice(0, 4);
			if(idnum.value == "") {
				s6.style.display = "inline-block";
				s6.style.color = "red";
				s6.innerHTML = "*学号不能为空";
			} else if(Num != "2018") {
				s6.style.display = "inline-block";
				s6.style.color = "red";
				s6.innerHTML = "*请确保你是大一新生";
			} else if(idnum.value.length != 8) {
				s6.style.display = "inline-block";
				s6.style.color = "red";
				s6.innerHTML = "*请输入8位学号";
			} else {
				s6.style.display = "inline-block";
				s6.style.color = "green";
				s6.innerHTML = "√";
			}

		}

		//部门域检测
		//	choose1.onchange=function(){
		//		if(choose1.value=="none"){
		//			s7.style.display = "inline-block";
		//			s7.style.color = "red";
		//			s7.innerHTML = "*请选择部门";
		//		}
		//	}

		//复选框检测

		//主观1检测
		area1.onblur = function() {
			if(area1.value == "") {
				console.log("1");
				s8.style.display = "inline-block";
				s8.style.color = "red";
				s8.innerHTML = "*请输入你的想法";
			} else {
				s8.style.display = "inline-block";
				s8.style.color = "green";
				s8.innerHTML = "√";
			}
			check();
		}
		

	}

}