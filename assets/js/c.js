/*global L*/
const c = {
	
	/////////////////////////////////////////////////////////////////////
	baseInitialize() {
		
		//the initialization that every page must go through
		L.attachAllElementsById( v );
		
		let sidenavElems = document.querySelectorAll( '.sidenav' );
		let sidenavInstances = M.Sidenav.init( sidenavElems );
	},
	
	async indexInitialize() {
		
		c.baseInitialize();
		m.latestFiveProds = await c.grabFiveProducts();
		console.log('all products: ' + m.latestFiveProds);
		c.displayLatestFive(m.latestFiveProds);
		//c.displayLatestFivePurch(m.allProducts);
		//c.displayLatestThreeSellers();
	},
	
	aboutUsInitialize() {
		
		c.baseInitialize();
	},
	
	async allProductsInitialize() {
		
		c.baseInitialize();
		v.products.innerHTML = c.getLoading();
		
		m.allProducts = await c.grabAllProducts();
		console.log(m.allProducts);
		c.displayAllProducts(m.allProducts);
	},
	
	allSellersInitialize() {
		c.baseInitialize();
	},
	
	productInitialize(){
		c.baseInitialize();
	},
	
	async getLoading() {
		
		let loadingR = await fetch( 'https://aaserver.abbas411.com/code/workspace/e-commerce_capstone2019/assets/php/loading.php?color=3161ac' );
		let loading = await loadingR.text();
		return loading;
	}
	
	/////////////////////////////////////////////////////////////////////
	async grabFiveProducts() {
		
		let productsJSON = await fetch('https://aaserver.abbas411.com/code/workspace/e-commerce_capstone2019/assets/php/api.php');
		let products = await productsJSON.json();
		
		console.log(products)
		return products;
	},
	
	async grabAllProducts(){
		let productsJSON = await fetch('https://aaserver.abbas411.com/code/workspace/e-commerce_capstone2019/assets/php/apiAllProducts.php');
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
		}, 5000);
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
						
					let prodImageDiv = document.createElement('div');
					prodImageDiv.classList.add('productImage');
					console.log(product.imageUrl);
					prodImageDiv.style.backgroundImage = `url(${product.imageUrl})`;
					
					let prodPriceDiv = document.createElement('div');
					prodPriceDiv.classList.add('productNameAndPrice');
					
						let prodPriceSpan = document.createElement('span');
						prodPriceSpan.classList.add(...m.nameAndPriceSpanClasses);
						prodPriceSpan.innerText = product.price;
		
		colDiv.appendChild(cardDiv);
			cardDiv.appendChild(prodNameDiv);
				prodNameDiv.appendChild(prodNameSpan);
			cardDiv.appendChild(prodImageDiv);
			cardDiv.appendChild(prodPriceDiv);
				prodPriceDiv.appendChild(prodPriceSpan);
		return colDiv;
	},
};