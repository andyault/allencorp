//vars for features drawer
var btnFeat = document.getElementById('seemorefeatures');
var elemFeat = document.getElementById('morefeatures');

//size video correctly
var vid = document.getElementById('video-video');

window.onresize = function() {
	//ie???
	try {
		//see if we even want to load the video
		if(document.body.clientWidth > 480)
			vid.attributes.autoplay.value = 'true';
		else
			vid.attributes.autoplay.value = undefined;
	} catch(e) {}

	//get size of parent container
	var parentW = vid.parentNode.clientWidth;
	var parentH = vid.parentNode.clientHeight;

	//aspect ratio of video
	var aspect = vid.videoWidth / vid.videoHeight;

	//default to 1080p
	if(isNaN(aspect)) aspect = 1920 / 1080;

	//calc video size
	var vidW = parentW;
	var vidH = (parentW / aspect);

	//if portrait, adjust
	if(vidH < parentH) {
		vidH = parentH;
		vidW = parentH * aspect;
	}

	//set size and pos
	vid.style.width = vidW + 'px';
	vid.style.height = vidH + 'px';

	vid.style.top = (parentH / 2 - vidH / 2) + 'px';
	vid.style.left = (parentW / 2 - vidW / 2) + 'px';

	//while we're here, handle features drawer resizing
	if(!!parseInt(elemFeat.style.maxHeight))
		elemFeat.style.maxHeight = elemFeat.scrollHeight + 'px';
}

window.onresize();

//see more features drawer
var btnFeat = document.getElementById('seemorefeatures');
var elemFeat = document.getElementById('morefeatures');

btnFeat.onclick = function() {
	if(!!parseInt(elemFeat.style.maxHeight))
		elemFeat.style.maxHeight = 0;
	else
		elemFeat.style.maxHeight = elemFeat.scrollHeight + 'px';
}

btnFeat.checked = false;
elemFeat.style.maxHeight = 0;

//ajax form submit
document.getElementById('contact-form').onsubmit = function(e) {
	//send form data
	var xhr = new XMLHttpRequest();

	xhr.open(this.method, this.action, true);

	xhr.onreadystatechange = function() {
		if(xhr.readyState == 4) {
			var message = document.getElementById('contact-status');

			//response types
			switch(xhr.status) {
				case 200: //OK
					message.classList.add('success');
					message.innerText = 'Thanks!';

					break;

				case 400: //bad input
					message.classList.add('failure');
					message.innerText = 'Error - make sure all fields are filled';

					break;

				case 403: //bad token
					message.classList.add('failure');
					message.innerText = 'Error - invalid security token, try refreshing';

					break;
			}

			message.classList.add('active');
		}
	}

	xhr.send(new FormData(this));

	//disable form controls
	var elems = this.elements;

	for(var i = 0; i < elems.length; i++) {
		elems[i].disabled = true;
	}

	//prevent redirect
	e.preventDefault();
	return false;
}