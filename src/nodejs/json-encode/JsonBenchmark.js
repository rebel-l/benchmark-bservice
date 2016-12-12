/**
 * Created by lgaub on 10.12.2016.
 */
"use strict";

const ITERATIONS = 1000;

let prepareData = function () {
	let data = [];

	/** 1. */
	data.push({
		"title": "Der Herr der Ringe",
		"author": "J.R.R. Tolkien",
		"price": 34.99,
		"pages": 1245
	});

	/** 2. */
	data.push({
		"title": "Jagd auf Roter Oktober",
		"author": "Tom Clancy",
		"price": 9.99,
		"pages": 439
	});

	/** 3. */
	data.push({
		"title": "Ich, der Robot",
		"author": "Isaac Asimov",
		"price": 10.99,
		"pages": 247
	});

	/** 4. */
	data.push({
		"title": "Der Hundertjährige der aus dem Fenster stieg und verschwand",
		"author": "Jonas Jonason",
		"price": 12.79,
		"pages": 612
	});

	/** 5. */
	data.push({
		"title": "Cloud Atlas",
		"author": "David Mitchell",
		"price": 19.99,
		"pages": 567
	});

	/** 6. */
	data.push({
		"title": "Das Alphabethaus",
		"author": "Jussi Adler Olsen",
		"price": 29.99,
		"pages": 782
	});

	/** 7. */
	data.push({
		"title": "Eragon",
		"author": "Christopher Paolini",
		"price": 34.99,
		"pages": 987
	});

	/** 8. */
	data.push({
		"title": "1Q84",
		"author": "Haruki Murakami",
		"price": 42.99,
		"pages": 1439
	});

	/** 9. */
	data.push({
		"title": "Tintenherz",
		"author": "Cornelia Funke",
		"price": 16.99,
		"pages": 357
	});

	/** 10. */
	data.push({
		"title": "Wolfsblut",
		"author": "Jack London",
		"price": 12.99,
		"pages": 455
	});

	return data;
};

class JsonBenchmark {
	constructor () {
		this.iterations = ITERATIONS;
		this.overallDuration = 0;
	}

	/**
	 * Returns the average duration time for one encode and one decode operation.
	 * @returns {number}
	 */
	getAverageDuration() {
		return this.overallDuration / this.iterations;
	}

	/**
	 * Executes the benchmark.
	 * @param iterations[optional]
	 */
	execute(iterations = ITERATIONS) {
		let data = prepareData();
		let myString = "";
		let myJson = {};
		let start, stop;
		this.iterations = iterations;

		start = new Date().getTime();
		for (let i = 0; i < this.iterations; i++) {
			 myString = JSON.stringify(data);
			 myJson = JSON.parse(myString);
		}
		stop = new Date().getTime();
		this.overallDuration = stop - start;
	}
}

module.exports = JsonBenchmark;