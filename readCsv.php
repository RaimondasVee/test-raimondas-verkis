<?php
/*
The script below adds called data from a CSV file into a multidimensional array by opening
a CSV file, checking for matching case insensitive results in the 4th column passed down 
from argument and then echoing relevant lines in a human readable form.
*/

$result  = [];

// CSV file name can be switched to a variable passed down through $argv to read different
// files. 
if (($handle = fopen("Services.csv", "r")) !== FALSE) {
    $flag = true;

    // retrieves data from csv file and adds into a multidimensional array
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

        // Ignore first line of csv
        if($flag) { $flag = false; continue; }  

        // 3rd $data key of an array represents the 4th column of CSV file 
        // This can have a variable assigned to iterate different columns called by names.
        // Case insensitive argument accepted following this php call.
        if(strtolower($data[3]) == strtolower($argv[1]))

            //The data matching argument is pushed into a variable ready for iteration.
            array_push($result, $data);
    }
    // Closes CSV held in memory. $result variable holds the relevant data.
    fclose($handle);

    // Below pulls data from $result array and converts to a readable format.
    $keys = array_keys($result);
    for($i = 0; $i < count($result); $i++) {
        foreach($result[$keys[$i]] as $key => $value) {
            echo $value . "  ";
        }
        echo PHP_EOL;

    }
    
    // Quick data summary. The stringes can be changed to variables to represent any 
    // CSV header while being called from an array
    echo PHP_EOL . "Summary: " . count($result) . " service(s) in the selected country." . PHP_EOL;
}

?>