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
	key:    fs.readFileSync( "/root/ssl/key.key" ),
	cert:   fs.readFileSync( "/root/ssl/cert.cert" ),
	ca:     fs.readFileSync( "/root/ssl/cacert.cert" )
};
app = express(),
https = require('https'),
port = 1338,
path = require('path'),
bodyParser = require('body-parser'),
mongoose = require('mongoose'),
db = require('./config/db'),
Products = require('./config/Products'),
Users = require('./config/Users'),
fileUpload = require('express-fileupload');
//sanitize = require('sanitize-filename');

//Middleware that allows file uploads
app.use(fileUpload());
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
	console.log(request.body);
	let {productName,productPrice,imageName,productDesc} = request.body
	productName = decodeURIComponent(productName);
	productPrice = decodeURIComponent(productPrice);
	productDesc = decodeURIComponent(productDesc);
	console.log(productName, productPrice, productDesc);
	//let sanitizedImageName = sanitize(imageName);

   let image = request.files.image
	   image.mv(`../images/${imageName/*sanitizedImageName*/}`);
	
	
	//Create new product
	let newProduct = new Products({
	    productName,
		price: productPrice,
		description: productDesc,
		timePosted: Date.now(),
		imageUrl: `./assets/images/${imageName}`,//...and then save the path
		sold:false,
		//seller: a value we'll easily get from m.token
	})
	console.log(newProduct);
	
	try{
		newProduct.save()
		.then(response=>{
			console.log('Saved!');
			response.send('product was saved to database');
		})
		.catch(err=>{
			console.log(JSON.stringify(err))
			response.send(`product was not saved, error: ${JSON.stringify(err)}`)
		})
	}
	catch(error){
		console.log(error);
	}
})

//-----------------------------------------------------------------//

httpsServer.listen(port,()=>console.log(`Server is running on ${port}`));