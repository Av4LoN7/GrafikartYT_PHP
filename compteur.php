<?php
define('STORE_COUNTER_ARRAY', glob('compteurs'.DIRECTORY_SEPARATOR.'compteur-?*.txt'));
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

function getAllViewsNumber() : int
{
    $tempNumber = 0;
    foreach (STORE_COUNTER_ARRAY as $filePath) {
        $tempNumber += (int) file_get_contents($filePath);
    }
        return $tempNumber;
}

function getViewsByYear() : array
{
    $byYearViews = [];
    $processedData = processData();
    foreach ($processedData as $key => $data) {
        $byYearViews[$key] = $data["total"];
    }
    return $byYearViews;
}

//create and return an array structured like this :
// [year]["total"]
//       [month][day] => (value) for easier process purpose
function processData() : array
{
    $counterData = [];
    foreach (STORE_COUNTER_ARRAY as $filePath) {
        $tempProcess = explode("-", $filePath);
        $year = (int)$tempProcess[1];
        $month = (int)$tempProcess[2];
        $monthFinal = MONTH[$month - 1]; // the string value of the month
        $day = (int) substr($tempProcess[3], 0, -4); // remove ".txt" end file
        $value = (int) file_get_contents($filePath);

        if(array_key_exists($year, $counterData)) {
            $counterData[$year]["total"] += $value;
            if(array_key_exists($month, $counterData[$year])) {
                $counterData[$year][$monthFinal][$day][] = $value;
            } else {
                $counterData[$year][$monthFinal][$day] = $value;
            }
        } else {
            $counterData[$year]["total"] = $value;
            $counterData[$year][$monthFinal][$day] = $value;
        }
    }
    return $counterData;
}

function getViewsByMonth(int $year)
{
    $tempArray = processData();
    $temp2 = [];
    $result = null;
    if(array_key_exists($year, $tempArray)) {
        unset($tempArray[$year]["total"]);
        $temp2[] = $tempArray[$year];
        foreach ($temp2 as $k => $v) {
                foreach ($v as $k1 => $item) {
                    foreach ($item as $k2 => $value) {
                        $result .= " le " . $k2 . " " . ucfirst($k1) . " : " . $value . " de vues <br>";
                    }
                }
        }
    }
    return $result;
}
