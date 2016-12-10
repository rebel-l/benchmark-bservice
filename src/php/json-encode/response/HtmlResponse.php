<?php

/**
 * Sends the response as HTML
 *
 * @author: Rebel L <dj@rebel-l.net>
 *
 * Date: 09.12.2016
 * Time: 22:16
 */

namespace Response;

use JsonBenchmark\JsonBenchmark;

class HtmlResponse
{
	/**
	 * Sends the response.
	 *
	 * @param JsonBenchmark $benchmark
	 * @param int $iterations
	 */
	public function send(JsonBenchmark $benchmark, int $iterations)
	{
		header('Content-Type: text/html; charset=utf-8');
		?>
			<html>
				<head>
					<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
					<title>JSON Operations Benchmark</title>
				</head>
				<body>
					<h1>JSON Operations Benchmark</h1>
					<p>
						Iterations: <?= number_format($iterations) ?><br />
						Overall Duration: <?= $benchmark->overallDuration * 1000 ?> ms<br />
						Average Duration: <?= $benchmark->getAverageDuration() * 1000 ?> ms
					</p>
				</body>
			</html>
		<?php
	}
}