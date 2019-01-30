/*global L*/
const c = {
	
	/////////////////////////////////////////////////////////////////////
	baseInitialize(){
		//the initialization that every page must go through
		L.attachAllElementsById( v );
		
		let sidenavElems = document.querySelectorAll( '.sidenav' );
		let sidenavInstances = M.Sidenav.init( sidenavElems );
	},
	
	indexInitialize() {
		c.baseInitialize();
		m.allProducts = c.grabAllProducts();
		c.displayLatestFive(m.allProducts);
		c.displayLatestFivePurch(m.allProducts);
		c.displayLatestThreeSellers();
	},
	
	aboutUsInitialize(){
		c.baseInitialize();
	},
	
	allProductsInitialize(){
		c.baseInitialize();
	},
	
	allSellersInitialize(){
		c.baseInitialize();
	},
	
	productInitialize(){
		c.baseInitialize();
	},
	
	/////////////////////////////////////////////////////////////////////
	async grabAllProducts() {
		
		let productsJSON = await fetch('https://aaserver.abbas411.com/code/workspace/e-commerce_capstone2019/assets/php/api.php');
		let products = await productsJSON.json();
		
		return products;
	},
	
	displayLatestFive(allProducts){
		allProducts.forEach((m,i,a)=>{
			let colDiv = document.createElement('div');
			colDiv.classList.add(...m.cardColClasses);
			let cardDiv = document.createElement('div');
			cardDiv.classList.add(...m.cardClasses);
			
		})
		//iterate through each product..
		//..and create a card filled with the data for each
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
	}
};