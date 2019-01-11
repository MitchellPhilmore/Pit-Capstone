let express = require('express'),
    app = express(),
    port = 60005,
    path = require('path')
 
    
    
    app.get('/',(req,res)=>{
    	res.sendFile(path.join(__dirname, '/index.html'))
    })
    
    
    app.listen(port,()=>console.log(`Running on ${port}`))