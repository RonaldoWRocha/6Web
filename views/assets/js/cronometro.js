var intervalo;

function tempo(op) {
	if (op == 1) {
		document.getElementById('parar').style.display = "block";
		document.getElementById('comeca').style.display = "none";
	}
	
	var dtPartida = document.getElementById('passa_session').value;
	if(dtPartida != ''){
		var data = new Date();
		var hora = data.getHours();   
		var min = data.getMinutes();
		var seg     = data.getSeconds();
		var dtChegada = hora + ':' + min + ':' + seg;

		var ms = moment(dtChegada,"HH:mm:ss").diff(moment(dtPartida,"HH:mm:ss"));
		var d = moment.duration(ms);
		var s = Math.floor(d.asHours()) + ":" + moment.utc(ms).format("mm") +":" + moment.utc(ms).format("ss") +"";
		 
		
		var explode = s.split(":", 3);
		console.log(explode);
		var s = explode[2];
		var m = explode[1];
		var h = explode[0];
		intervalo = window.setInterval(function() {
			if (s == 60) { m++; s = 0; }
			if (m == 60) { h++; s = 0; m = 0; }
			if (h < 10) document.getElementById("hora").innerHTML = "0" + h + ":"; else document.getElementById("hora").innerHTML = h + ":";
			if (s < 10) document.getElementById("segundo").innerHTML = "0" + s + "s"; else document.getElementById("segundo").innerHTML = s + "s";
			if (m < 10) document.getElementById("minuto").innerHTML = "0" + m + ""; else document.getElementById("minuto").innerHTML = m + "";		
			s++;
		},1000);
	}else {
		document.getElementById("hora").innerHTML = "00:";
		document.getElementById("segundo").innerHTML = "00";
		document.getElementById("minuto").innerHTML = "00";	
	}
	
}

function parar() {
	window.clearInterval(intervalo);
	document.getElementById('parar').style.display = "none";
	document.getElementById('comeca').style.display = "block";
}

function volta() {
	document.getElementById('voltas').innerHTML += document.getElementById('hora').firstChild.data + "" + document.getElementById('minuto').firstChild.data + "" + document.getElementById('segundo').firstChild.data + "<br>";
}

function limpa() {
	document.getElementById('voltas').innerHTML = "";
}
window.onload=tempo;
