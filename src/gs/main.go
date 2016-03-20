package main

import (
	"net/http"
	"encoding/json"
)

type Data struct {
	Sentence	string
}

func handler(response http.ResponseWriter, request *http.Request) {
	name := "World";
	if (request.URL.Query().Get("name") != "") {
		name = request.URL.Query().Get("name");
	}

	myData := Data{
		Sentence: "Hello " + name + "!",
	}
	response.Header().Set("Content-Type", "application/json;");
	json.NewEncoder(response).Encode(myData);
}

func main() {
	http.HandleFunc("/", handler);
	http.ListenAndServe(":8080", nil);
}
