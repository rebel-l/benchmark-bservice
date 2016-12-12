/**
 * Created by lgaub on 11.12.2016.
 */

"use strict";

exports.send = function (benchmark, iterations, response) {
	let html = "";
	html += "<html>\n";
	html += "<head>\n";
	html += "\t<meta http-equiv='Content-type' content='text/html; charset=utf-8' />";
	html += "\t<title>JSON Operations Benchmark</title>";
	html += "</head>\n";
	html += "<body>\n";
	html += "\t<h1>JSON Operations Benchmark</h1>\n";
	html += "\t<p>\n";
	html += "\t\tIterations: " + iterations + "<br />\n";
	html += "\t\tOverall Duration: " + benchmark.overallDuration + " ms<br />\n";
	html += "\t\tAverage Duration: " + benchmark.getAverageDuration() + " ms\n";
	html += "\t</p>\n";
	html += "</body>\n";
	html += "</html>";
	response.writeHead(200, {"Content-Type": "text/html; charset=utf-8"});
	response.end(html);
};
