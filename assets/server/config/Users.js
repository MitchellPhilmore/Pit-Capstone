let mongoose = require('mongoose')

let Schema = mongoose.Schema

let userSchema = new Schema({
	firstname:{
		type:String,
		required:true
	},
	lastname:{
		type:String,
		required:true
	},
	email:{
		type:String,
		required:true
	},
	username:{
		type:String,
		required:true
	},
	password:{
		type:String,
		required:true
	},
	token:{
		type:String,
		required:true
	},
})

module.exports = Users = mongoose.model('Users', userSchema) 