<?php

# Finds the position of the first occurence of a substring in a string
function my_strpos($haystack, $needle, $offset = 0)
{
	# If the haystack is not a string, the function won't work
	if (!is_string($haystack)) {
		error_log("my_strpos: Haystack is not a string.");
		return FALSE;
	}

	# If needle is not a string, it is converted to an integer and applied as
	# the ordinal value of a character.
	if (!is_string($needle)) {
		$needle = chr((int)$needle);
	}

	# Offset cannot be negative
	if ($offset < 0) {
		error_log("my_strpos: Offset is negative.");
		return FALSE;
	}

	# Convert haystack to array
	$hay_array = str_split($haystack);

	# Get the number of characters in the needle
	$needle_length = strlen($needle);

	# Single character needle case
	if ($needle_length == 1) {
		# Loop through the haystack to find the needle
		for ($i=$offset; $i < count($hay_array); $i++) {
			if ($needle == $hay_array[$i]) {
				# Needle found!
				return $i;
			}
		}
	}
	# Multiple character needle case
	else {
		# Convert needle to array
		$needle_array = str_split($needle);
		# Loop through the haystack to find the needle
		for ($i=$offset; $i < count($hay_array); $i++) {
			if ($needle_array[0] == $hay_array[$i]) {
				# First character in needle found
				# Check that all the other characters match
				for ($j=1; $j < $needle_length; $j++) {
					if ($hay_array[$i+$j] != $needle_array[$j]) {
						break;
					}
					elseif ($j == $needle_length - 1) {
						# Needle found!
						return $i;
					}
				}

			}
		}
	}

	# Needle not found
	return FALSE;
}

$alphabet = 'abcdefghijklmnopqrstuvwxyz';

# Should print "17"
print(my_strpos($alphabet, 'r') . "\n");

# Should print "6"
print(my_strpos($alphabet, 'ghi') . "\n");

# Should print "bool(false)"
var_dump(my_strpos($alphabet, 'u', 22));

# Should print "bool(false)"
var_dump(my_strpos($alphabet, 'A'));
