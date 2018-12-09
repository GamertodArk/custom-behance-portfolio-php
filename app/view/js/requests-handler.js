
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
				
				let project_img_data = JSON.parse(data).project.modules;

				let items = [];
				project_img_data.forEach(element => {
					
					if (element.type === 'image') {
						
						if (element.sizes['1400']) {

							item_data = {
								src: element.sizes['1400'],
								w: element.dimensions['1400'].width,
								h: element.dimensions['1400'].height							
							}

						}else {
							item_data = {
								src: element.sizes.original,
								w: element.dimensions.original.width,
								h: element.dimensions.original.height
							}
						}

						items.push(item_data);
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