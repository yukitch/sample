package main

import "fmt"
import "os"

func main() {
	dd(func() string {
		return "anonymous func test"
	})
}

func dd(f func() string) {

	fmt.Println(f())
	os.Exit(0)
}
