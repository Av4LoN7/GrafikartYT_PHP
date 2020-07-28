<?php
define('STORE_COUNTER_ARRAY', glob('compteurs'.DIRECTORY_SEPARATOR.'compteur-?*.txt'));
define('DATA_PROCESSED', processData());
define('MONTH', [
    "janvier",
    "fevrier",
    "mars",
    "avril",
    "mai",
    "juin",
    "juillet",
    "aout",
    "septembre",
    "octobre",
    "novembre",
    "decembre"
]);

function getViewsByYear() : array
{
    $viewsByYear = [];
    $tempNumber = null;
    foreach (DATA_PROCESSED as $key => $data) {
        $viewsByYear[$key] = $data["total"];
        $tempNumber += $data["total"];
    }
    array_push($viewsByYear, $tempNumber); // total of views
    return $viewsByYear;
}

function getViewsByMonth(int $year) : string
{
    $result = null;
    if(array_key_exists($year, DATA_PROCESSED)) {
        foreach (DATA_PROCESSED[$year] as $k1 => $item) {
            if(is_array($item)) {
                foreach ($item as $k2 => $value) {
                    $result .= " le " . $k2 . " " . ucfirst(MONTH[$k1]) . " : " . $value . " de vues <br>";
                }
            }
        }
    }
    return $result;
}

//create and return an array structured like this :
// [year]["total"] => value
// [year][month][day] => value
// for easier process
function processData() : array
{
    $counterData = [];
    foreach (STORE_COUNTER_ARRAY as $filePath) {
        $tempProcess = explode("-", $filePath);
        $year = (int)$tempProcess[1];
        $month = (int)$tempProcess[2];
        $day = (int) substr($tempProcess[3], 0, -4); // remove ".txt" end file
        $value = (int) file_get_contents($filePath);

        if(array_key_exists($year, $counterData)) {
            $counterData[$year]["total"] += $value;
        } else {
            $counterData[$year]["total"] = $value;
        }
        $counterData[$year][$month - 1][$day] = $value;
    }
    return $counterData;
}
