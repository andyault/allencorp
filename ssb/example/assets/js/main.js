//ajax query
var form = document.getElementById('bbb-form');

form.onsubmit = function(e) {
	var status = document.getElementById('bbb-status');

	status.classList.add('success', 'active');
	status.innerText = 'Fetching results...'

	//add all fields to get url and disable
	var elems = this.elements;

	for(var i = 0; i < elems.length; i++)
		elems[i].disabled = true;

	setTimeout(function() {	
		var data = {
			"TotalResults":1,
			"SearchResults":[
				{
					"OrganizationName":"Example Organization",
					"PrimaryCategory":"Placeholder",
					"City":"Myrtle Beach",
					"StateProvince":"SC",
					"PostalCode":"29579",
					"Address":"123 Example St.",
				}
			],
			"CouponCode":"33fc27e7f325-9das995b"
		};

		var xhrstatus = 200;
		
		switch(xhrstatus) {
			case 200: //OK
				status.classList.remove('active');

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
	}, 1000);

	//done :)
	if(e)
		e.preventDefault();

	return false;
}

//handle response
var elemResults = document.getElementById('bbb-results');
var message = document.getElementById('bbb-message');
var code = document.getElementById('bbb-code-code');

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

			elemResult.onclick = showCode;

			code.innerText = data.CouponCode;
		} else {
			if(elemResult)
				elemResult.style.display = 'none';
		}
	}

	message.style.display = 'none';

	if(data) {
		if(data.TotalResults > 0) {
			if(data.TotalResults > dataResults.length) {
				message.innerText = 'Don\'t see your business? Double check your ID.';

				message.style.display = 'block';
			}
		} else {
			message.innerText = 'No results found.';

			message.style.display = 'block';
		}
	}
}

var codeContainer = document.getElementById('bbb-code');

var showCode = function() {
	populateResults(); //empty to clear results element

	codeContainer.style.display = 'block'; //show code element

	//disable form
	var elems = form.elements;

	for(var i = 0; i < elems.length; i++)
		elems[i].disabled = true;
}