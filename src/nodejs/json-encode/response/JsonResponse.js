/**
 * Created by lgaub on 11.12.2016.
 */
"use strict";

exports.send = function (benchmark, iterations, response){
	response.writeHead(200, {"Content-Type": "application/json"});
	response.end(JSON.stringify({
		"iterations": iterations,
		"duration": {
			"overall": benchmark.overallDuration,
			"average": benchmark.getAverageDuration()
		}
	}));
};
