let mongoose = require('mongoose')

let Schema = mongoose.Schema

let productSchema = new Schema({
	productName:{
		type:String,
		required:true
	},
	price:{
		type:String,
		required:true
	},
	description:{
		type:String,
		required:true
	},
	timePosted:{
		type:Date,
		required:true
	},
	imageUrl:{
		type:String,
		required:true
	},
	sold:{
		type:Boolean,
		required:true
	},
	seller:{
		type:String,
		required:true
	}
})

module.exports = Products = mongoose.model('products',productSchema) 