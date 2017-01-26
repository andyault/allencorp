//ajax query
var form = document.getElementById('bbb-form');

form.onsubmit = function(e) {
	var status = document.getElementById('bbb-status');

	status.classList.remove('active');

	//url
	var url = this.action + '?';

	//add all fields to get url and disable
	var elems = this.elements;

	for(var i = 0; i < elems.length; i++) {
		var elem = elems[i];

		if(elem.type !== 'submit') {
			if(i > 0)
				url += '&';

			url += elem.name + '=' + elem.value;
		}

		elem.disabled = true;
	}

	//xhr request
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function() {
		if(xhr.readyState == 4) {
			var data = JSON.parse(xhr.responseText);
			
			switch(xhr.status) {
				case 200: //OK
					populateResults(data);

					//reenable form
					for(var i = 0; i < elems.length; i++)
						elems[i].disabled = false;

					break;

				case 202: //accepted
					status.classList.add('success', 'active');

					var time;

					var id = setInterval(function update() {
						time = Math.floor(new Date().getTime() / 1000);

						status.innerText = 'Fetching new access token - please wait ' + (data - time) + 's';

						return update;
					}(), 1000);

					setTimeout(function() {
						form.onsubmit();
						clearInterval(id);
					}, (data - time) * 1000);

					break;

				case 403: //unauth - shouldn't ever happen
				case 500: //error
					status.innerText = 'Internal error - please refresh and try again.';
					status.classList.add('failure', 'active');

					break;
			}
		}
	}

	xhr.open(
		this.method,
		url,
		true
	);

	xhr.send();

	//done :)
	if(e)
		e.preventDefault();

	return false;
}

//handle response
var elemResults = document.getElementById('bbb-results');
var message = document.getElementById('bbb-message');

var populateResults = function(data) {
	//shortcut
	var dataResults;

	if(data)
		dataResults = data.SearchResults;

	//max amount of results
	var count = parseInt(form.count.value);

	//for each result
	for(var i = 0; i < count; i++) {
		var elemResult = elemResults.children[i];
		var dataResult;

		if(dataResults)
			dataResult = dataResults[i];

		//add to dom
		if(dataResult) {
			if(!elemResult) {
				elemResult = document.createElement('li');
				elemResult.className = 'bbb-result';

				elemResult.orgtitle = elemResult.appendChild(document.createElement('h2'));
				elemResult.orgtitle.className = 'title title-half';

				elemResult.subtitle = elemResult.appendChild(document.createElement('h3'));
				elemResult.subtitle.className = 'title title-sub';

				elemResult.location = elemResult.appendChild(document.createElement('p'));
				elemResult.location.className = 'body body-em';

				elemResults.appendChild(elemResult);
			} else
				elemResult.style.display = 'list-item';

			//populate result
			elemResult.orgtitle.innerText 	= dataResult.OrganizationName;
			elemResult.subtitle.innerText 	= dataResult.PrimaryCategory;
			elemResult.location.innerText 	= dataResult.Address.trim() + ', ' + dataResult.City + ', ' + dataResult.StateProvince + ' ' + dataResult.PostalCode;

			elemResult.regionCode = parseInt(dataResult.BBBId);
			elemResult.onclick = getCode;
		} else {
			if(elemResult)
				elemResult.style.display = 'none';
		}
	}

	message.style.display = 'none';

	if(data) {
		if(data.TotalResults > 0) {
			if(data.TotalResults > dataResults.length) {
				message.innerText = 'Don\'t see your business? Try a more specific search.';

				message.style.display = 'block';
			}
		} else {
			message.innerText = 'No results found.';

			message.style.display = 'block';
		}
	}
}

var codeContainer = document.getElementById('bbb-code');
var code = document.getElementById('bbb-code-code');

var getCode = function() {
	populateResults(); //empty to clear results element

	code.innerText = bbbCodes[this.regionCode]; //add code

	codeContainer.style.display = 'block'; //show code element

	//disable form
	var elems = form.elements;

	for(var i = 0; i < elems.length; i++)
		elems[i].disabled = true;
}

//load codes
var bbbCodes;

var xhr = new XMLHttpRequest();
xhr.overrideMimeType('application/json');

xhr.open('GET', 'bbbcodes.json', true);

xhr.onreadystatechange = function() {
	if(xhr.readyState == 4) {
		bbbCodes = JSON.parse(xhr.responseText);
	}
}

xhr.send();