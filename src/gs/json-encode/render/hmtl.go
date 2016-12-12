package render

import (
	"fmt"
	"io"
	"net/http"
)

var output string = `
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>JSON Operations Benchmark</title>
	</head>
	<body>
		<h1>JSON Operations Benchmark</h1>
		<p>
			Iterations: %d<br />
			Overall Duration: %f ms<br />
			Average Duration: %f ms
		</p>
	</body>
</html>
`;

func SendHtml (overallDuration float32, averageDuration float32, iterations int, response http.ResponseWriter) {
	response.Header().Set("Content-Type", "text/html; charset=utf-8");
	response.WriteHeader(http.StatusOK);
	io.WriteString(response, fmt.Sprintf(output, iterations, overallDuration, averageDuration));
};
