package main

import (
	"./benchmark"
	"fmt"
	"flag"
)

func main() {
	fmt.Printf("\nBenchmark starting ...\n");

	numberOfIterations := flag.Int("i", benchmark.ITERATIONS, "an int");
	flag.Parse();
	fmt.Printf("Iterations: %d \n\n", *numberOfIterations);

	benchmark.Execute(*numberOfIterations);

	fmt.Printf("Overall Duration: %f ms\n", benchmark.OverallDuration);
	fmt.Printf("Average Duration: %f ms", benchmark.GetAverageDuration());
	fmt.Printf("\n\n");
}
