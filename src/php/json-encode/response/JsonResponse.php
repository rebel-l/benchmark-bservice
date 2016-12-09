<?php
/**
 * Sends the response as JSON
 *
 * @author: Rebel L <dj@rebel-l.net>
 *
 * Date: 09.12.2016
 * Time: 22:39
 */

namespace Response;

use JsonBenchmark\JsonBenchmark;

class JsonResponse
{
	/**
	 * Sends the response.
	 *
	 * @param JsonBenchmark $benchmark
	 * @param int $iterations
	 */
	public function send(JsonBenchmark $benchmark, int $iterations)
	{
		header('Content-Type: application/json');
		$duration = new \stdClass();
		$duration->overall = $benchmark->overallDuration * 1000;
		$duration->average = $benchmark->getAverageDuration() * 1000;

		$data = new \stdClass();
		$data->iterations = $iterations;
		$data->duration = $duration;

		echo json_encode($data);
	}
}