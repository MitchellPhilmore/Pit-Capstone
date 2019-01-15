let express = require('express'),
    app = express(),
    port = 60005,
    path = require('path'),
    mongoose = require('mongoose'),
    db = require('./config/db'),
    Products = require('./config/Products')
    
	  //Make database connection
	mongoose.connect(db.URI).then(() => {
	  console.log('Connected to database')
	}).catch(err => {
	  console.log(JSON.stringify(err))
	})
	
	//Test Db Connection
	let newProduct = new Products({
		productName:'Brownies',
		price: '5.99',
		timePosted:Date.now(),
		sold:false
	}).save()
	.catch(err=>{
		console.log(JSON.stringify(err))
	})
	    
   
    //Serve static files(html,css,images etc..)
 
    app.use(express.static('public'))
    
    //---------- Routes--------------------------------------------//
    
    app.get('/',(request,response)=>{
    	response.sendFile(path.join(__dirname,'/public/index.html'))
    })
    
    // Will add actual pages when they are build
    app.get('/about',(request,response)=>{
    	response.send('About')
    })
    
    app.get('/signup',(request,response)=>{
    	response.send('Signup')
    })
    
    app.get('/login',(request,response)=>{
    	response.send('Login')
    })
    
    app.get('/products',(request,response)=>{
    	response.send('products')
    })
    
    app.get('/sellers',(request,response)=>{
    	response.send('sellers')
    })
    //-----------------------------------------------------------------//
    
    app.listen(port,()=>console.log(`Server is running on ${port}`))