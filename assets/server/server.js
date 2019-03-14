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
sanitize = require('sanitize-filename');

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

app.get('/api/grabAllProdNames', (request, response)=>{
	Products.find({}, {_id: 1, productName: 1})
	.then((data)=>{
		response.json(data);
	})
})

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
	let {productPrice,imageName} = request.body
	
 let productName = request.body.productName.toLowerCase()
 let productDesc = request.body.productDesc.toLowerCase()
 
 
	
	productName = decodeURIComponent(productName);
	productPrice = decodeURIComponent(productPrice);
	productDesc = decodeURIComponent(productDesc);
	console.log(productName, productPrice, productDesc);
	let sanitizedImageName = sanitize(imageName, "_");
	
	//check to see if there is already an image in the filesystem with that filename
	if(fs.existsSync(`../userImages/${sanitizedImageName}`)){
		sanitizedImageName = fixFileName(sanitizedImageName);
	}

	let image = request.files.image
		image.mv(`../userImages/${sanitizedImageName}`);
	
	//Create new product
	let newProduct = new Products({
	    productName,
		price: productPrice,
		description: productDesc,
		timePosted: Date.now(),
		imageUrl: `./assets/userImages/${sanitizedImageName}`,//...and then save the path
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

////////////////////HELPER FUNCTIONS////////////////////

function fixFileName(oldFileName){
	let newFileName;
	let beforeExtension;
	let splitFileName = oldFileName.split('.');
	for(i=1; i<=100; i++){
		//split oldFileName string on '.' so that I can add (i) onto the end,
		//and then concatenate the extension back on.
		newFileName = `${splitFileName[0]}(${i}).${splitFileName[1]}`
		if(fs.existsSync(`../userImages/${newFileName}`)){
			continue;
		}
		else{
			break;
		}
	}
	return newFileName;
}

//-----------------------------------------------------------------//

httpsServer.listen(port,()=>console.log(`Server is running on ${port}`));