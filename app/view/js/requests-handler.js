
/**
* This file handles the request sent to the server and shows the gallery.
*
* To get all the pictures of every project the app needs to send a request
* to the Behance API, it's not secure to send the request from the view to
* the behance servers so what this project does is that it sends the project
* id to our server and our server sends the request with the project id and the 
* client key secret to the behance server.
*
*/

// Get all the projects in the page
let projects_cover = document.getElementsByClassName('project-cover');

// Loop trough all the project covers
for (var i = 0; i < projects_cover.length; i++) {
	
	let img_cover = projects_cover[i];

	img_cover.addEventListener('click', event => {
		console.log(event.target.getAttribute('data-project-id'));

		let url = '?view=project';

		let data = {
			project_id: event.target.getAttribute('data-project-id')
		}

		let fetchData = {
			method: 'POST',
			body: `data=${JSON.stringify(data)}`,
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}

		let myRequest = new Request(url,fetchData);

		fetch(myRequest)
			.then(resp => resp.text())
			.then(data => {
				// console.log(typeof data);
				let project_data = JSON.parse(data);
				console.log(project_data);

				
			})
			.catch(error => console.log(error));
	});
}