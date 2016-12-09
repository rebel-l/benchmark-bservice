<?php
/**
 * Just a benchmark for JSON operations.
 *
 * @author: Rebel L <dj@rebel-l.net>
 *
 * Date: 09.12.2016
 * Time: 18:28
 */

namespace JsonBenchmark;


class JsonBenchmark
{
	const ITERATIONS = 100000;

	public $overallDuration = 0;
	private $data = [];

	private function prepareData()
	{
		$set = new \stdClass();
		$set->title = 'Der Herr der Ringe';
		$set->author = "J.R.R. Tolkien";
		$set->price = 34.99;
		$set->pages = 1245;
		$this->data[] = $set;

		$set = new \stdClass();
		$set->title = 'Jagd auf Roter Oktober';
		$set->author = "Tom Clancy";
		$set->price = 9.99;
		$set->pages = 439;
		$this->data[] = $set;

		$set = new \stdClass();
		$set->title = 'Ich, der Robot';
		$set->author = "Isaac Asimov";
		$set->price = 10.99;
		$set->pages = 247;
		$this->data[] = $set;
	}

	/**
	 * Returns the average duration time for one encode and one decode operation.
	 *
	 * @return float|int
	 */
	public function getAverageDuration()
	{
		return $this->overallDuration / self::ITERATIONS;
	}

	/**
	 * Executes the benchmark.
	 */
	public function execute()
	{
		$this->prepareData();

		$start = microtime(true);

		for ($i = 0; $i < self::ITERATIONS; $i++) {
			$json = json_encode($this->data);
			$data = json_decode($json);
		}

		$stop = microtime(true);
		$this->overallDuration = $stop - $start;
	}
}