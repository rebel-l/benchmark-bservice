/**
 * Created by rebel-l on 12.04.2016.
 */
var http	= require('http');
var url		= require('url');

http.createServer(function (req, res) {
	var name = "World";
	var urlParts = url.parse(req.url, true);
	var query = urlParts.query;

	if (query.name) {
		name = query.name;
	}

	res.writeHead(200, {'Content-Type': 'application/json'});
	res.end(JSON.stringify({
		"sentence": "Hello " + name
	}));
}).listen(8080, '192.168.34.7');
console.log('Server running at http://192.168.34.7:8080/');
