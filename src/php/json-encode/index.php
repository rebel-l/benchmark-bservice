<?php

/**
 * Starts the benchmark by a webserver.
 *
 * @author: Rebel L <dj@rebel-l.net>
 *
 * Date: 09.12.2016
 * Time: 21:54
 */
require_once ('JsonBenchmark.php');

use JsonBenchmark\JsonBenchmark;
$defaults = [
	'o' => 'html',
	'i' => JsonBenchmark::ITERATIONS
];

$params = [];
parse_str($_SERVER['QUERY_STRING'], $params);
$params = array_merge($defaults, $params);

$benchmark = new JsonBenchmark();
$benchmark->execute($params['i']);

switch (strtolower($params['o'])) {
	case 'json':
		require_once ('response/JsonResponse.php');
		$response = new \Response\JsonResponse();
		$response->send($benchmark, $params['i']);
		break;
	case 'html':
	default:
		require_once ('response/HtmlResponse.php');
		$response = new \Response\HtmlResponse();
		$response->send($benchmark, $params['i']);
		break;
}
