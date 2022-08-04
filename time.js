var timee;
	function stopClock(){
	clearTimeout(timee);
	}
	function yourClock(){
	var nd = new Date();
	var h, m, s;
	var time=" ";
	h = nd.getHours();
	m = nd.getMinutes();
	s = nd.getSeconds();
	if (s <=9) s="0" + s;
	if (m <=9) m="0" + m;
	if (h <=9) h="0" + h;
	time+=h+":"+m+":"+s;
	document.the_clock.the_time.value=time;
	timee=setTimeout("yourClock()",1000);
	}