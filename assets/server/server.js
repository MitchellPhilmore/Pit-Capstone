/**
 * URL for this server.
 * 
 * https://aaserver.abbas411.com:60005/api/products
 * 
 * to run this server either run
 * 
 * sudo node /var/www/html/code/workspace/e-commerce_capstone2019/assets/server/server.js
 * 
 * or to run as service run
 * 
 * sudo systemctl restart pitswap
 */


let express = require('express'),
cors = require('cors'),
fs = require('fs'),
options = {
	key:    fs.readFileSync( "/etc/letsencrypt/live/aaserver.abbas411.com/privkey.pem" ),
	cert:   fs.readFileSync( "/etc/letsencrypt/live/aaserver.abbas411.com/cert.pem" ),
	ca:     fs.readFileSync( "/etc/letsencrypt/live/aaserver.abbas411.com/fullchain.pem" )
};
app = express(),
https = require('https'),
port = 60005,
path = require('path'),
bodyParser = require('body-parser'),
mongoose = require('mongoose'),
db = require('./config/db'),
Products = require('./config/Products'),
Users = require('./config/Users')

// Middleware that allows cors
app.use(cors())

// Middleware to parse form data
app.use(bodyParser.urlencoded({extended:true}))
app.use(bodyParser.json())

var httpsServer = https.createServer(options, app);

  //Make database connection
mongoose.connect(db.URI).then(() => {
  console.log('Connected to database')
}).catch(err => {
  console.log(JSON.stringify(err))
})

//Serve static files(html,css,images etc..)

app.use(express.static('public'))


app.get('/api/products', (request, response)=>{
	Products.find({},(err,data)=>{
		response.json(data)
	})
})

app.get('/api/most-recent', (request, response)=>{
	Products.find().sort( { timePosted: -1 } )
	.then(data=>{
		let mostRecentFive = [...data.splice(0,6)]
		response.json(mostRecentFive)
	})
})

app.get('/api/user', (request, response)=>{
	let userToken = request.headers.usertoken;
	//grab user from database
	Users.find({token: userToken})
	.then( (data) =>{
		response.json(data);
	})
})

app.post('/api/grabOneProduct', (request, response)=>{
	console.log('node: heres the id: ' + request.headers.productid);
	Products.find({_id: request.headers.productid})
	.then((data)=>{
		console.log('node: heres the product: ' + data);
		response.json(data);
	})
})


//attempt to have server recieve postproduct request
app.post('/api/postProduct', (request, response)=>{
	
	let productName = request.headers.productname;
	let productPrice = request.headers.productprice;
	let imageString = request.headers.imagestring;
	let imageName = request.headers.imagename;
	let productDesc = request.headers.productdesc;
	
	//to ensure were getting the data okay
	console.log(productName + productPrice + imageString + imageName + productDesc /*+ seller*/);
	//before creating new product, we need to save the decoded image to the images directory...
	let buff = new Buffer(imageString, 'base64');  
	
	
	
	//Create new product
	let newProduct = new Products({
		productName: productName,
		price: productPrice,
		description: productDesc,
		timePosted: Date.now(),
		imageUrl: `./assets/images/${imageName}`,//...and then save the path
		sold:false,
		//seller: a value well easily get from m.token
	})
	newProduct.save().then(response=>{
		console.log('Saved!')
	})
	.catch(err=>{
		console.log(JSON.stringify(err))
	})
	
	
	
	/*
	let myProduct = new Products(request)
	myProduct.save()
	.then((response)=>{
		response.send()
	})
	.catch((error)=>{
		error.send(error.status)
	})
	*/
})

//-----------------------------------------------------------------//

httpsServer.listen(port,()=>console.log(`Server is running on ${port}`));