## Any ideas for products go here

- "company managed" so only we can sell the products
- basically e-bay: buying and selling (authenticated) user's products

## Products to Sell:

- Possible Books

## Functionalities:

- Materialize's cards to display products
- possibly chat integration, whether DM or lobby

## Frameworks, Libraries, ETC.

- PHP and possibly some Node
- Materialize
- Stripe
- MongoDB

## Developing tools
- Codiad
- git + Github
- Slack

## UI/UX
- color pallette:


## Documentation

### Database

The database in use is the MLabs Mongo Database system.  We are using both node and PHP to connect and query the database.  Due to our system using both node and PHP apache does not block the node files on our system.  Because of this we have chosen to do authentication through PHP and product queries through node.  That way the project members can get semi comfortable with both backend systems.

#### Tables

- Products
	- _id: Object {"$oid": String}
	- productName: String
	- price: String
	- timePosted: Object {"$date": Date Object}
	- sold: Boolean
	- imageUrl: String
	- __v: Integer
- Users
	- 