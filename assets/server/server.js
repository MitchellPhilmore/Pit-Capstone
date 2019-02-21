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
cors = require('cors')
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
mongoose = require('mongoose'),
db = require('./config/db'),
Products = require('./config/Products')

// Middleware that allows cors
app.use(cors())


var httpsServer = https.createServer(options, app);

  //Make database connection
mongoose.connect(db.URI).then(() => {
  console.log('Connected to database')
}).catch(err => {
  console.log(JSON.stringify(err))
})

//Test Db Connection
/*
let newProduct = new Products({
	productName: 'Brownies',
	price: '5.99',
	timePosted:Date.now(),
	sold:false
}).save()
.catch(err=>{
	console.log(JSON.stringify(err))
})
*/



//Serve static files(html,css,images etc..)

app.use(express.static('public'))

//---------- Routes--------------------------------------------//

// app.get('/',(request,response)=>{
// 	response.sendFile(path.join(__dirname,'/public/login.html'))
// })

// // Will add actual pages when they are build
// app.get('/about',(request,response)=>{
// 	response.send('About')
// })

// app.get('/signup',(request,response)=>{
// 	response.send('Signup')
// })

// app.get('/login',(request,response)=>{
// 	response.send('Login')
// })

// app.get('/products',(request,response)=>{
// 	response.send('products')
// })

// app.get('/sellers',(request,response)=>{
// 	response.send('sellers')
// })


app.get('/api/products',(request,response)=>{
	Products.find({},(err,data)=>{
		response.json(data)
	})
})
// Return most the five most recent products

app.get('/api/most-recent',(request,response)=>{
	Products.find().sort( { timePosted: -1 } )
	.then(data=>{
	  let mostRecentFive =	[...data.splice(0,6)]
	  response.json(mostRecentFive)
	})
})


//attempt to have server recieve postproduct request
app.post('/postProduct', (request, response)=>{
	console.log(request);
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

httpsServer.listen(port,()=>console.log(`Server is running on ${port}`))