#!/usr/bin/env wat

func main() {
	@storage = null;
	while(%temp << getline("input.txt")) {
		$temp = %temp.split(" ")
		foreach(%t in $temp) {
			if(%t.match(/[A-Za-z0-9]+/)) {
				if(%t in @storage) {
					@storage[%t] += 1
				} else {
					@storage[%t] = 1
				}
			}
		}
	}

	foreach(%a, %b in @storage) {
		print %a + " " + %b + "\n"
	}
}
