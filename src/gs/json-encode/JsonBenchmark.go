package main

import (
	"encoding/json"
	"fmt"
	"time"
)

const ITERATIONS int = 1000;

var overallDuration float32 = 0.0;
var iterations int = ITERATIONS;

type Book struct {
	Title string
	Author string
	Price float32
	Pages int
}

var data [10]Book;

func execute(numberOfIterations int) {
	var start int64;
	var	stop int64;
	iterations = numberOfIterations;
	prepareData();

	start = time.Now().UnixNano();
	for i := 0; i < iterations; i++ {
		jsonByte , err := json.Marshal(data);
		if (err != nil) {
			fmt.Println("Shit!");
			return;
		}
		jsonString := string(jsonByte[:]);
		//fmt.Println(jsonString);

		var jsonData [10]Book;
		err = json.Unmarshal([]byte(jsonString), &jsonData);
		if (err != nil) {
			fmt.Println("Shit!");
			return;
		}
		//fmt.Println(jsonData[3]);
		stop = time.Now().UnixNano();
		overallDuration = float32((stop - start)) / float32(1000000);
	}
}

func getAverageDuration() float32 {
	return overallDuration / float32(iterations);
}

func prepareData() {
	data[0] = Book{
		"Der Herr der Ringe",
		"J.R.R. Tolkien",
		34.99,
		1245,
	};

	data[1] = Book{
		"Jagd auf Roter Oktober",
		"Tom Clancy",
		9.99,
		439,
	};

	data[2] = Book{
		"Ich, der Robot",
		"Isaac Asimov",
		10.99,
		247,
	};

	data[3] = Book{
		"Der Hundertjährige der aus dem Fenster stieg und verschwand",
		"Jonas Jonason",
		12.79,
		612,
	};

	data[4] = Book{
		"Cloud Atlas",
		"David Mitchell",
		19.99,
		567,
	};

	data[5] = Book{
		"Das Alphabethaus",
		"Jussi Adler Olsen",
		29.99,
		782,
	};

	data[6] = Book{
		"Eragon",
		"Christopher Paolini",
		34.99,
		987,
	};

	data[7] = Book{
		"1Q84",
		"Haruki Murakami",
		42.99,
		1439,
	};

	data[8] = Book{
		"Tintenherz",
		"Cornelia Funke",
		16.99,
		357,
	};

	data[9] = Book{
		"Wolfsblut",
		"Jack London",
		12.99,
		455,
	};
}
