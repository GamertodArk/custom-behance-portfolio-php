
/**
* This file handles the request sent to the server and shows the gallery.
*
* To get all the pictures of every project the app needs to send a request
* to the Behance API, it's not secure to send the request from the view to
* the behance servers so what this project does is that it sends the project
* id to our server and our server sends the request with the project id and the 
* client key to the behance server.
*/

// Get all the projects in the page
let projects_cover = document.getElementsByClassName('project-cover');

// Loop trough all the project covers
for (var i = 0; i < projects_cover.length; i++) {
	
	let img_cover = projects_cover[i];

	// Detect when the user cliks over a cover
	img_cover.addEventListener('click', event => {

		// the url where the request is gonna be send to.
		let url = '?view=project';

		// The data sent in the request
		let data = {
			project_id: event.target.getAttribute('data-project-id')
		}

		// The request information
		let fetchData = {
			method: 'POST',
			body: `data=${JSON.stringify(data)}`,
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}

		// We uses the new Request() class to create a request object
		let myRequest = new Request(url,fetchData);

		// Init fetch
		fetch(myRequest)
			.then(resp => resp.text())
			.then(data => {

				// console.log(JSON.parse(data));
				
				// We put the needed information in a variable
				let project_img_data = JSON.parse(data).project.modules; // ? JSON.parse(data).project.modules : JSON.parse(data).project.componets;

				// console.log(project_img_data);

				// We itarate through all of the modules broght by fetch to get the link, with and height of the project images
				let items = [];
				project_img_data.forEach(element => {
					

					// Make sure we bring just the images
					if (element.type === 'image') {
						
						// Check if the project images are available in this size
						if (element.sizes['1400']) {

							// JavaScript object with the information needed
							item_data = {
								src: element.sizes['1400'],
								w: element.dimensions['1400'].width,
								h: element.dimensions['1400'].height							
							}

						}else {

							// If the 1400 size is not available, we bring the original size
							item_data = {
								src: element.sizes.original,
								w: element.dimensions.original.width,
								h: element.dimensions.original.height
							}
						}

						// We put all of the images with its height and width inside an array
						items.push(item_data);
					}else if (element.type === 'media_collection') {
						console.log(element);

						element.components.forEach(element => {

							item_data = {
								src: element.sizes.source,
								w: element.dimensions.source.width,
								h: element.dimensions.source.height
							}
							
							// We put all of the images with its height and width inside an array
							items.push(item_data);
							
						});

					}
				});

				// Init PhotoSwipe
				let photoswipe_dom = document.getElementById('pswp');
				let gallery = new PhotoSwipe( photoswipe_dom, PhotoSwipeUI_Default, items);
				gallery.init();

			})
			.catch(error => console.log(error));
	});
}