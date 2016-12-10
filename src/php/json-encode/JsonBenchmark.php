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
	const ITERATIONS = 1000;

	public $overallDuration = 0;
	private $data = [];

	private function prepareData()
	{
		/** 1. */
		$set = new \stdClass();
		$set->title = 'Der Herr der Ringe';
		$set->author = "J.R.R. Tolkien";
		$set->price = 34.99;
		$set->pages = 1245;
		$this->data[] = $set;

		/** 2. */
		$set = new \stdClass();
		$set->title = 'Jagd auf Roter Oktober';
		$set->author = "Tom Clancy";
		$set->price = 9.99;
		$set->pages = 439;
		$this->data[] = $set;

		/** 3. */
		$set = new \stdClass();
		$set->title = 'Ich, der Robot';
		$set->author = "Isaac Asimov";
		$set->price = 10.99;
		$set->pages = 247;
		$this->data[] = $set;

		/** 4. */
		$set = new \stdClass();
		$set->title = 'Der Hundertjährige der aus dem Fenster stieg und verschwand';
		$set->author = "Jonas Jonason";
		$set->price = 12.79;
		$set->pages = 612;
		$this->data[] = $set;

		/** 5. */
		$set = new \stdClass();
		$set->title = 'Cloud Atlas';
		$set->author = "David Mitchell";
		$set->price = 19.99;
		$set->pages = 567;
		$this->data[] = $set;

		/** 6. */
		$set = new \stdClass();
		$set->title = 'Das Alphabethaus';
		$set->author = "Jussi Adler Olsen";
		$set->price = 29.99;
		$set->pages = 782;
		$this->data[] = $set;

		/** 7. */
		$set = new \stdClass();
		$set->title = 'Eragon';
		$set->author = "Christopher Paolini";
		$set->price = 34.99;
		$set->pages = 987;
		$this->data[] = $set;

		/** 8. */
		$set = new \stdClass();
		$set->title = '1Q84';
		$set->author = "Haruki Murakami";
		$set->price = 42.99;
		$set->pages = 1439;
		$this->data[] = $set;

		/** 9. */
		$set = new \stdClass();
		$set->title = 'Tintenherz';
		$set->author = "Cornelia Funke";
		$set->price = 16.99;
		$set->pages = 357;
		$this->data[] = $set;

		/** 10. */
		$set = new \stdClass();
		$set->title = 'Wolfsblut';
		$set->author = "Jack London";
		$set->price = 12.99;
		$set->pages = 455;
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
	 * @param int $iterations[optional]
	 */
	public function execute($iterations = self::ITERATIONS)
	{
		$this->prepareData();

		$start = microtime(true);

		for ($i = 0; $i < $iterations; $i++) {
			$json = json_encode($this->data);
			$data = json_decode($json);
		}

		$stop = microtime(true);
		$this->overallDuration = $stop - $start;
	}
}