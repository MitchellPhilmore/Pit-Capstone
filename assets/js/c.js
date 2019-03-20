/*global L*/
const c = {
	
	/////////////////////////////////////////////////////////////////////
	async baseInitialize() {
		
		//the initialization that every page must go through
		L.attachAllElementsById( v );
		
		let sidenavElems = document.querySelectorAll( '.sidenav' );
		let sidenavInstances = M.Sidenav.init( sidenavElems );
		v.search.addEventListener('input', c.handleSearch);
		
		//UNCOMMENT FOR WHEN SERVER IS UPDATED AND READY TO RECEIVE THIS SPECIFIC GET REQUEST
		
		let response = await fetch('https://dev.pit.edu:1338/api/grabAllProdNames',{
			method: 'GET',
		})
		let parsedResponse = await response.json();
		console.log(parsedResponse);
		
		//save productNames and _ids as an array of objects
		m.allProductNamesAndIds = parsedResponse;
		console.log(m.allProductNamesAndIds);
		
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
		postman.open('POST', 'https://dev.pit.edu:1338/api/grabOneProduct');
		postman.setRequestHeader( 'productId', m.productId );
		postman.send();
		postman.onload = (eo)=>{
			if(postman.status === 200 || postman.status === 0){
				m.currentProduct = JSON.parse(postman.responseText);
				console.log(m.currentProduct);
				v.productPageTitle.innerText = m.currentProduct[0].productName;
				v.productDescDiv.innerText = m.currentProduct[0].description;
				v.sellerSignature.innerText = `-${m.currentProduct[0].seller}`;
				
				let prodCardCol = c.createProdCardCol(m.currentProduct[0], m.productPageCardColClasses);
				v.oneProductRow.replaceChild( prodCardCol, v.oneProductRow.children[0] );
				
				//check if sold value is true, and if so,
				//gray out checkoutButton and give attr of disabled
				if(m.currentProduct[0].sold){
					v.checkoutButton.setAttribute('disabled', 'disabled');
				}
				v.checkoutButton.addEventListener('click', c.checkoutProduct);
			}
		}
		postman.onerror = (eo)=>{
			console.log(`There was an error: ${postman.status}`);
		}
	},
	
	async postToNode(){
		let url = 'https://dev.pit.edu:1338/postproduct';
		let response = await fetch('GET',url);
		let data = await response.json();
		
		console.log(data)
	},
	
	accountPageInitialize(){
		c.baseInitialize();
		
			c.fillAccountPage(m.userData);
			let userCard = c.createUserCard(m.userData);
			v.userCardCol.replaceChild( userCard, v.userCardCol.children[0] );
	},
	
	postProductInitialize(){
		c.baseInitialize();
		
		c.setInputFilter(v.productPrice, (value)=>{return /^\d*$/.test(value)});
		v.submitProduct.addEventListener('click', c.postProduct);
	},
	
	thankYouPageInitialize(){
		c.baseInitialize();
	},
	
	buyConfirmationInitialize(){
		c.baseInitialize();
	},
	
	async postProduct(eventObject){
		eventObject.preventDefault();
		if(v.productName === "" || v.productPrice === "" || v.productDesc === "" || v.imageChooser.files[0] === undefined){
			alert('Please fill in all fields');
		}
		else{
			v.submitProduct.disabled = true;
			console.log('hello?');
			
			let timePosted = Date.now();
			let sold = false;
			
			let reader = new FileReader();
			let postman = new XMLHttpRequest();
			let formData = new FormData();
			
			let image = v.imageChooser.files[0];
			let imageName = image.name;
			let productName = escape(v.productName.value);
			let productPrice = escape(v.productPrice.value);
			let productDesc = escape(v.productDesc.value);
			
			formData.append('productName', productName);
			formData.append('productPrice', productPrice);
			formData.append('image', image);
			formData.append('imageName', imageName);
			formData.append('productDesc', productDesc);
			formData.append('timePosted', timePosted);
			formData.append('sold', sold);
			formData.append('userName', m.userData.username);
			
			//send request using form data
			fetch('https://dev.pit.edu:1338/api/postProduct', {
				method: 'POST',
				body: formData,
			})
			.then( async (response)=>{
				console.log('response.text: ' + response.text());
				//TODO instead of redirecting to the index, redirect to a thank you page, RELATIVELY
				v.loadingIconHolder.innerHTML = await c.loading();
				window.location.assign('https://dev.pit.edu/workspace/e-commerce_capstone2019/thank-you-page.php');
			})
			.catch((error)=>{
				console.log('error.text: ' + error);
				window.location.reload();
			})
		}
	},
	
	async loading() {
		
		return new Promise( function( resolve, reject ) {
			
			let ajax = new XMLHttpRequest();
			ajax.open( 'GET', 'https://dev.pit.edu/workspace/e-commerce_capstone2019/assets/php/loading.php?color=3161ac' );
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
		
		let productsJSON = await fetch('https://dev.pit.edu:1338/api/most-recent',{
		method: "GET"});
		let products = await productsJSON.json();
		
		console.log(products)
		return products;
	},
	
	async grabAllProducts(){
		let productsJSON = await fetch('https://dev.pit.edu:1338/api/products');
		let products = await productsJSON.json();
		
		console.log(products);
		return products;
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
						if(product.imageUrl != undefined){
							prodImageDiv.style.backgroundImage = `url(${product.imageUrl})`;
						}
						
					
					let prodPriceDiv = document.createElement('div');
					prodPriceDiv.classList.add('productNameAndPrice');
					
						let prodPriceSpan = document.createElement('span');
						prodPriceSpan.classList.add(...m.nameAndPriceSpanClasses);
						prodPriceSpan.innerText = `$${product.price}`;
		
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
		userImageDiv.style.backgroundImage = `url(./assets/siteImages/defaultFace.png)`;
		
		////////////////////////////////////////////
		cardDiv.appendChild(userNameDiv);
			userNameDiv.appendChild(userNameSpan);
		cardDiv.appendChild(userImageDiv);
		return cardDiv;
	},
	
	checkoutProduct(){
		v.checkoutButton.setAttribute('disabled', 'disabled');
		//trigger loading beside checkoutButton
		
		let ajax = new XMLHttpRequest();
		ajax.open('GET', `./assets/php/api.php?buyer=${m.userData.username}&seller=${m.currentProduct[0].seller}&action=sendSwappedEmails&product=${m.currentProduct[0]._id}`);
		ajax.send();
		
		ajax.onload = ()=>{
			
			console.log(`ajax responseText: ${ajax.responseText}`);
			let postman = new XMLHttpRequest();
			postman.open('POST', 'https://dev.pit.edu:1338/api/updateSoldProduct');
			postman.setRequestHeader(`productid`, m.currentProduct[0]._id);
			postman.send();
			
			postman.onload = ()=>{
				window.location.assign( './buy-confirmation.php' );
			}
			
			postman.onerror = (error)=>{
				console.log('server error: ' + error);
			}
		}
		ajax.onerror = ()=>{
			console.log(`error: ${ajax.statusText}`);
		}
	},
	
	handleSearch(eo){
		console.log(eo.target.value);
		if(eo.target.value != ""){
			let searchWords = eo.target.value.toLowerCase();
			m.currentSearchResults = m.allProductNamesAndIds.filter((m,i,a) => {
				return m.productName.includes(searchWords)
			})
			console.log(m.currentSearchResults)
			v.searchResultsHolder.style.visibility = 'visible';
			c.displaySearchResults(m.currentSearchResults);
		}
		else{
			v.searchResultsHolder.style.visibility = 'hidden';
		}
	},
	
	displaySearchResults(results){
		v.searchResultsUl.innerHTML = "";
		results.forEach((member) => {
			let li = document.createElement('li');
			li.innerText = member.productName;
			li.classList.add('pit-gold-text', 'pit-blue');
			let onClick = document.createAttribute('onclick');
			let path = `\./product\.php?product=${member._id}`;
			onClick.value = `window\.location\.href='${path}'`;
			li.setAttributeNode(onClick);
			v.searchResultsUl.appendChild(li);
		})
	},
	
	//CARGO CULTED CODE FROM => 'https://stackoverflow.com/questions/469357/html-text-input-allow-only-numeric-input'
	// Restricts input for the given textbox to the given inputFilter.
	setInputFilter(textbox, inputFilter){
		["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
			textbox.addEventListener(event, function() {
				if (inputFilter(this.value)) {
					this.oldValue = this.value;
					this.oldSelectionStart = this.selectionStart;
					this.oldSelectionEnd = this.selectionEnd;
				} else if (this.hasOwnProperty("oldValue")) {
					this.value = this.oldValue;
					this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
				}
			});
		});
	}
};