/*global L*/
const c = {
	
	/////////////////////////////////////////////////////////////////////
	baseInitialize(){
		//the initialization that every page must go through
		L.attachAllElementsById( v );
		
		let elems = document.querySelectorAll( '.sidenav' );
		let instances = M.Sidenav.init( elems );
	},
	
	indexInitialize() {
		c.baseInitialize();
		//c.displayLatestThree(c.grabAllProducts());
		//c.displayLatestThreePurch(c.grabAllProducts());
		//c.displayLatestThreeSellers();
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
	grabAllProducts(){
		//grab all products from the db (for now, the api)
		let allProductsStringified = fetch('http://aaserver.abbas411.com:60005/api/products')
		.then((response)=>{
			console.log(response)
			return response
		})
		.catch((e)=>{
			console.log(e.stringify)
		})
		
	},
	
	displayLatestThree(allProducts){
		//grab only the latest 3 posted products
		//iterate through each product..
		//..and create a card filled with the data for each
	},
	
	displayLatestThreePurch(allProducts){
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