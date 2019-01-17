/*global L*/
const c = {
	
	initialize() {
		L.attachAllElementsById( v );
		
		let elems = document.querySelectorAll( '.sidenav' );
		let instances = M.Sidenav.init( elems );
		
		v.searchBar.addEventListener( 'focus', this.growSideBar );
		v.searchBar.addEventListener( 'blur', this.shrinkSideBar );
	},
	
	growSideBar( e ) {
		
		console.log( e, e.target.parentNode.parentNode );
		e.target.parentNode.parentNode.style.width = '240px';
	},
	
	shrinkSideBar( e ) {
		
		e.target.parentNode.parentNode.style.width = '180px';
	},
};