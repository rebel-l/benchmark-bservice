package main

import (
	"fmt"
	"flag"
)

func main() {
	fmt.Printf("\nBenchmark starting ...\n");

	numberOfIterations := flag.Int("i", ITERATIONS, "an int");
	flag.Parse();
	fmt.Printf("Iterations: %d \n\n", *numberOfIterations);

	execute(*numberOfIterations);

	fmt.Printf("Overall Duration: %f ms\n", overallDuration);
	fmt.Printf("Average Duration: %f ms", getAverageDuration());
	fmt.Printf("\n\n");
}
