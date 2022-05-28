<?php
function groupByOwners ( array $files) : array {
    $result = [];
    $values = array_unique(array_values($files));
    var_dump($files);
    echo '<br/>';
    foreach ( $values as $value ){
        $arr = array_keys($files, $value);
        echo $value.'<br/>';
        var_dump($arr);
        echo '<br/>';
        $result[$value] = $arr;
    }
    return $result;

}

$files = [
    "input.txt" => "Randy",
    "code.py" => "Stan",
    "output.txt" => "Randy",
];

var_dump(groupByOwners($files))

?>