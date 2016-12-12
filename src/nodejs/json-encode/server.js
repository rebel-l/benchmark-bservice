#!/usr/local/bin/node
/**
 * Created by lgaub on 11.12.2016.
 */
let http	= require('http');
let url		= require('url');

http.createServer(function (req, res) {
	let iterations = 1000;
	let output = "html";
	let urlParts = url.parse(req.url, true);
	let query = urlParts.query;

	if (query.o) {
		output = query.o;
	}

	if (query.i) {
		iterations = query.i;
	}

	let JsonBenchmark = require ("./JsonBenchmark");
	let benchmark = new JsonBenchmark();
	benchmark.execute(iterations);

	switch (output.toLowerCase()) {
		default:
		case "html":
			let htmlResponse = require ("./response/HtmlResponse.js");
			htmlResponse.send(benchmark, iterations, res);
			break;
		case "json":
			let jsonResponse = require ("./response/JsonResponse.js");
			jsonResponse.send(benchmark, iterations, res);
	}
}).listen(8080, '192.168.34.7');
console.log('Server running at http://192.168.34.7:8080/');