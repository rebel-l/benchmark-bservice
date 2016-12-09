#!/usr/bin/php
<?php
/**
 * Cli version of the benchmark test.
 *
 * @author: Rebel L <dj@rebel-l.net>
 *
 * Date: 09.12.2016
 * Time: 18:54
 */
require_once ('JsonBenchmark.php');

use JsonBenchmark\JsonBenchmark;

echo PHP_EOL;
echo 'Benchmark starting ...' . PHP_EOL;
echo 'Iterations: ' . number_format(JsonBenchmark::ITERATIONS) . PHP_EOL;

$benchmark = new JsonBenchmark();
$benchmark->execute();

echo 'Overall Duration: ' . $benchmark->overallDuration * 1000 . ' ms' . PHP_EOL;
echo 'Average Duration: ' . $benchmark->getAverageDuration() * 1000 . ' ms' . PHP_EOL;

echo PHP_EOL . PHP_EOL;
