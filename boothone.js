var video = document.getElementById('video');
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');

navigator.mediaDevices.getUserMedia({video:true}).then((stream) => {video.srcObject = stream});

function throwError (e){
 	alert(e.name);
}

	function snap (){
	canvas.width = video.clientWidth;
	canvas.height = video.clientHeight;
	context.drawImage(video, 0, 0,);
	document.getElementById("url").value = canvas.toDataURL("image/jpeg");
}