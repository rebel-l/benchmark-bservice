package main

import (
	"./benchmark"
	"./render"
	"net/http"
	"strconv"
	"strings"
)

var iterations int = benchmark.ITERATIONS;
var output string = "html";
var err error;

func handler(response http.ResponseWriter, request *http.Request) {
	if (request.URL.Query().Get("i") != "") {
		iterations, err = strconv.Atoi(request.URL.Query().Get("i"));
	}

	if (request.URL.Query().Get("o") != "") {
		output = request.URL.Query().Get("o");
	}

	benchmark.Execute(iterations);

	switch strings.ToLower(output) {
		case "html":
			render.SendHtml(benchmark.OverallDuration, benchmark.GetAverageDuration(), iterations, response);
		case "json":
			render.SendJson(benchmark.OverallDuration, benchmark.GetAverageDuration(), iterations, response);
		default:
			render.SendHtml(benchmark.OverallDuration, benchmark.GetAverageDuration(), iterations, response);
	}
}

func main() {
	http.HandleFunc("/", handler);
	http.ListenAndServe(":8080", nil);
}
