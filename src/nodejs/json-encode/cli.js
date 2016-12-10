#!/usr/local/bin/node
/**
 * Created by lgaub on 10.12.2016.
 */
"use strict";

let iterations = 1000;

process.argv.forEach(function (val, index, array) {
	if (val.indexOf("i=") > -1) {
		iterations = val.split("=")[1];
	}
});

console.log();
console.log("Benchmark starting ...");
console.log("Iterations: " + iterations);
console.log();

let JsonBenchmark = require ("./JsonBenchmark");
let benchmark = new JsonBenchmark();
benchmark.execute(iterations);

console.log("Overall Duration: " + benchmark.overallDuration + " ms");
console.log("Average Duration: " + benchmark.getAverageDuration() + " ms");
console.log();
