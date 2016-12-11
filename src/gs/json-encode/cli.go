package main

import ("fmt")

func main() {
	fmt.Printf("\nBenchmark starting ...\n");

	execute(1);

	fmt.Printf("Overall Duration: %f ms\n", overallDuration);
	fmt.Printf("Average Duration: %f ms", getAverageDuration());
	fmt.Printf("\n\n");
}
