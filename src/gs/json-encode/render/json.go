package render

import (
	"net/http"
	"encoding/json"
)

type Duration struct{
	Overall float32
	Average float32
}

type Data struct {
	Iterations int
	Duration Duration
}

func SendJson(overallDuration float32, averageDuration float32, iterations int, response http.ResponseWriter) {
	duration := Duration{overallDuration, averageDuration};
	data := Data{iterations, duration};
	response.Header().Set("Content-Type", "application/json;");
	json.NewEncoder(response).Encode(data);
};

