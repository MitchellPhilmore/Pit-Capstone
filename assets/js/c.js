/*global L*/
const c = {
	
	/////////////////////////////////////////////////////////////////////
	baseInitialize() {
		
		m.image = false;
		//the initialization that every page must go through
		L.attachAllElementsById( v );
		
		let sidenavElems = document.querySelectorAll( '.sidenav' );
		let sidenavInstances = M.Sidenav.init( sidenavElems );
	},
	
	async indexInitialize() {
		
		c.baseInitialize();
		m.latestFiveProds = await c.grabFiveProducts();
		console.log('all 5 products: ' + m.latestFiveProds);
		c.displayLatestFive(m.latestFiveProds);
		//c.displayLatestFivePurch(m.allProducts);
		//c.displayLatestThreeSellers();
	},
	
	aboutUsInitialize() {
		
		c.baseInitialize();
	},
	
	async allProductsInitialize() {
		
		c.baseInitialize();
		v.products.innerHTML = await c.loading();
		
		m.allProducts = await c.grabAllProducts();
		console.log(m.allProducts);
		c.displayAllProducts(m.allProducts);
	},
	
	productInitialize(){
		c.baseInitialize();
		
		//grab name of product that was clicked in order to be redirected here
		console.log(m.productId);
		
		let postman = new XMLHttpRequest();
		postman.open('POST', 'https://aaserver.abbas411.com:60005/api/grabOneProduct');
		postman.setRequestHeader( 'productId', m.productId );
		postman.send();
		postman.onload = (eo)=>{
			if(postman.status === 200 || postman.status === 0){
				m.currentProduct = JSON.parse(postman.responseText);
				console.log(m.currentProduct);
				v.productPageTitle.innerText = m.currentProduct[0].productName;
				
				let prodCardCol = c.createProdCardCol(m.currentProduct[0], m.productPageCardColClasses);
				v.oneProductRow.replaceChild( prodCardCol, v.oneProductRow.children[0] );
				//v.oneProductRow.appendChild(prodCardCol);
			}
		}
		postman.onerror = (eo)=>{
			console.log(`There was an error: ${postman.status}`);
		}
		
	},
	
	async postToNode(){
		let url = 'https://aaserver.abbas411.com:60005/postproduct'
		let response = await fetch('GET',url)
		let data = await response.json()
		
		console.log(data)
	},
	
	accountPageInitialize(){
		c.baseInitialize();
		
		c.grabOneAccount().then((response)=>{
			let parsedUser = JSON.parse(response)[0];
			console.log(parsedUser);
			c.fillAccountPage(parsedUser);
			let userCardCol = c.createUserCard(parsedUser);
			v.userCardRow.replaceChild( userCardCol, v.userCardRow.children[0] );
		})
	},
	
	postProductInitialize(){
		c.baseInitialize();
		
		v.submitProduct.addEventListener('click', c.postProduct);
		v.imageChooser.addEventListener('change', c.postImage);
		
	},
	
	postProduct(eventObject){
		eventObject.preventDefault();
		
		let timePosted = Date.now();
		let sold = false;
		let postman = new XMLHttpRequest();
		let productData = new FormData(v.postProductForm);
		
		productData.append('datePosted', timePosted);
		productData.append('productSold', sold);
		productData.delete('image');
		
		for( let entry of productData.entries() ) {
			
			console.log(entry[0]+ ', '+ entry[1]); 
		}
		if(m.image){
			productData.append('image', m.imageString)
			
			postman.open('POST', './test.php');
			postman.send(productData);
			m.image = false;
		}
		else{
			//ensure to let the user know that they need to select an image
			console.log('An image has not been uploaded, please upload an image');
		}
		
		
		postman.onload = function(eventObject){
			
			console.log('message was sent: ' + postman.responseText);
			if ( postman.status !== 200 ){
				const message = `problem sending product: ${postman.status}`;
			}
		}
		postman.onerror = function(eventObject){
			const message = `problem connecting to server: ${postman.status}`;
			console.log(message);
		}
	},
	
	postImage(){
		let postman = new XMLHttpRequest();
		let formData = new FormData();
		let reader = new FileReader();
		
		let image = v.imageChooser.files[0];
		let imageName = image.name;
		reader.readAsDataURL(image);
		reader.onload = function(){
			m.imageString = reader.result;
			formData.append('image', m.imageString);
			formData.append('imageName', imageName);
		
			postman.open('POST', './test.php');
			postman.send(formData);
			
			postman.onload = function(eo){
				if ( postman.status !== 200 ){
					const message = `problem sending image: ${postman.status}`;
					console.log(message);
				}
				console.log('message was sent: ' + postman.responseText);
				m.image = true;
			}
			postman.onerror = function(eo){
				const message = `problem connecting to server: ${postman.status}`;
				console.log(message);
			}
		};
		
	},
	
	async loading() {
		
		return new Promise( function( resolve, reject ) {
			
			let ajax = new XMLHttpRequest();
			ajax.open( 'GET', 'https://aaserver.abbas411.com/code/workspace/e-commerce_capstone2019/assets/php/loading.php?color=3161ac' );
			ajax.send();
			
			ajax.onload = function() {
				
				if ( ajax.status != 200 ) {
					
					reject( ajax.status + ': ' + ajax.statusText );
				} else {
					
					resolve( ajax.responseText );
				}
			};
		});
	},
	
	/////////////////////////////////////////////////////////////////////
	async grabFiveProducts() {
		
		let productsJSON = await fetch('https://aaserver.abbas411.com:60005/api/most-recent',{
		method: "GET"});
		let products = await productsJSON.json();
		
		console.log(products)
		return products;
	},
	
	async grabAllProducts(){
		let productsJSON = await fetch('https://aaserver.abbas411.com:60005/api/products');
		let products = await productsJSON.json();
		
		console.log(products);
		return products;
	},
	
	grabOneAccount(){
		return new Promise((resolve, reject)=>{
			let postman = new XMLHttpRequest();
			postman.open('GET', 'https://aaserver.abbas411.com:60005/api/user');
			postman.setRequestHeader( 'usertoken', m.token );
			postman.send();
			postman.onload = (eo)=>{
				if(postman.status === 200 || postman.status === 0){
					let currentUser = postman.responseText;
					console.log('currentUser from c.grabOneAccount: ' + currentUser);
					resolve(currentUser);
				}
			}
			postman.onerror = (eo)=>{
				console.log(`There was an error: ${postman.status}`);
				reject(postman.status);
			}
		})
	},
	
	
	displayLatestFive(allFiveProducts){
		let productRow = document.querySelector('.productRow');
		//iterate through each product..
		allFiveProducts.forEach((member,i,a)=>{
			//..and create a card filled with the data for each
			let prodCardCol = c.createProdCardCol(member, m.indexCardColClasses);
			
			productRow.appendChild(prodCardCol);
			
		})
	},
	
	displayAllProducts(allProducts){
		
		setTimeout(function() {
			
			console.log('Hello World and testing environment');
			let allProductsRow = document.querySelector('.allProductsRow');
			v.products.innerHTML = "";
			allProducts.forEach((member,i,a)=>{
				let prodCardCol = c.createProdCardCol(member, m.allProductsCardColClasses);
				
				allProductsRow.appendChild(prodCardCol);
			})
		}, 500);
	},
	
	displayLatestFivePurch(allProducts){
		//grab only the latest 3 purchased products
		//iterate through each product..
		//..and create a card filled with the data for each
	},
	
	displayLatestThreeSellers(){
		//grab all sellers
		//grab 3 most recently registered
		//iterate through each seller..
		//..and create a card filled with the data for each
	},
	
	createProdCardCol(product, cardColClasses){
		let colDiv = document.createElement('div');
		colDiv.classList.add(...cardColClasses);
		
				let cardDiv = document.createElement('div');
				cardDiv.classList.add(...m.cardClasses);
				
					let prodNameDiv = document.createElement('div');
					prodNameDiv.classList.add('productNameAndPrice');
					
						let prodNameSpan = document.createElement('span');
						prodNameSpan.classList.add(...m.nameAndPriceSpanClasses);
						prodNameSpan.innerText = product.productName;
						
					let prodLink = document.createElement('a');
						let prodLinkHref = document.createAttribute('href');
						prodLinkHref.value = './product.php?product=' + product._id;
					prodLink.setAttributeNode(prodLinkHref);
						
						let prodImageDiv = document.createElement('div');
						prodImageDiv.classList.add('productImage');
						prodImageDiv.style.backgroundImage = `url(${product.imageUrl})`;
					
					let prodPriceDiv = document.createElement('div');
					prodPriceDiv.classList.add('productNameAndPrice');
					
						let prodPriceSpan = document.createElement('span');
						prodPriceSpan.classList.add(...m.nameAndPriceSpanClasses);
						prodPriceSpan.innerText = product.price;
		
		////////////////////////////////////////////
		colDiv.appendChild(cardDiv);
			cardDiv.appendChild(prodNameDiv);
				prodNameDiv.appendChild(prodNameSpan);
			cardDiv.appendChild(prodLink);
				prodLink.appendChild(prodImageDiv);
			cardDiv.appendChild(prodPriceDiv);
				prodPriceDiv.appendChild(prodPriceSpan);
		return colDiv;
	},
	
	fillAccountPage(user){
		v.nameHeader.innerText = "";
		v.nameHeader.innerText = `${user.firstname} ${user.lastname}`;
		
		v.usernameHeader.innerText = "";
		v.usernameHeader.innerText = `${user.username}`;
		
		v.emailHeader.innerText = "";
		v.emailHeader.innerText = `${user.email}`;
	},
	
	createUserCard(user){
		let colDiv = document.createElement('div');
		colDiv.classList.add(...m.accountPageCardColClasses);
		
			let cardDiv = document.createElement('div');
			cardDiv.classList.add(...m.cardClasses);
			
			let userNameDiv = document.createElement('div');
			userNameDiv.classList.add('productNameAndPrice');
				
				let userNameSpan = document.createElement('span');
				userNameSpan.classList.add(...m.nameAndPriceSpanClasses);
				userNameSpan.innerText = `${user.firstname} ${user.lastname}`;
					
			let userImageDiv = document.createElement('div');
			userImageDiv.classList.add('productImage');
			//our database doesnt currently have a column for user image
			userImageDiv.style.backgroundImage = `url(./assets/images/defaultFace.png)`;
		
		////////////////////////////////////////////
		colDiv.appendChild(cardDiv);
			cardDiv.appendChild(userNameDiv);
				userNameDiv.appendChild(userNameSpan);
			cardDiv.appendChild(userImageDiv);
		return colDiv;
	},
};