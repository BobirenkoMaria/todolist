const PostmanLocalMockServer = require('@jordanwalsh23/postman-local-mock-server');

//Create the collection object.
let collection = JSON.parse(fs.readFileSync('./my-collection.json', 'utf8'));

//Create a new server
let server = new PostmanLocalMockServer(3555, collection);

//Start the server
server.start();
