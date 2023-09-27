<?php 
$arrayNumbers = [1,2,3,4,5,6,7,8,9];
function calculateSum($numbers){
    $sum = 0;
    foreach ($numbers as $number) {
        if($number % 2 == 0){
            $sum += $number;
        }
    }
    return $sum;
}

echo calculateSum($arrayNumbers);

$arrayStrings = [
    "hello",
    'well come',
    'on board'
];

function formatStringInfo($arr) {
    $result = array();

    foreach ($arr as $str) {
        $strLength = strlen($str); 
        $formattedStr = "string: $str - length: $strLength";
        array_push($result, $formattedStr);
    }

    return $result;
}

$formattedStrings = formatStringInfo($arrayStrings);

foreach ($formattedStrings as $formattedStr) {
    echo '<pre>';
    echo $formattedStr . PHP_EOL;
}

