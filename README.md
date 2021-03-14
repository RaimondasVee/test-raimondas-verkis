# test-raimondas-verkis

The readCsv.php will read Services.csv file once called through CLI and will only give an output if an argument is provided.
The argument will act as a search string to iterate the csv file's country column and will output matching lines.

  ex: php readCsv.php country_code

otherwise it will produce an undefined offset warning.

Last line will produce a summary of matching cases.
