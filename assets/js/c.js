/*global L*/
const c = {
	
	initialize() {
		
		L.attachAllElementsById( v );
		
		let elems = document.querySelectorAll( '.sidenav' );
		let instances = M.Sidenav.init( elems );
		
		console.log(this);
		
		//v.searchBar.addEventListener( 'focus', c.growSideBar, true );
		//v.searchBar.addEventListener( 'blur', c.shrinkSideBar, true );
	},
	
	/*
	growSideBar( e ) {
		
		//console.log( e, e.target.parentNode.parentNode );
		e.target.parentNode.parentNode.style.width = '240px';
	},
	
	shrinkSideBar( e ) {
		
		e.target.parentNode.parentNode.style.width = '180px';
	},
	*/
	
	
};