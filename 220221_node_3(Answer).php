<?php 
function changeFormat($input_string) {
    $input_string;

    if ($input_string == '') {
        return '0:00';
    }    
    if(strpos($input_string, ':') !== true){
        $input_string .= ':00';
    }
    return $input_string;
}
function getTimeRange($start_time, $end_time) {
    $stime = strtotime(changeFormat($start_time));
    $etime = strtotime(changeFormat($end_time));
    $difference = $etime - $stime;
    $difference = $difference < 0 ? (-1 * $difference) : $difference;
    $hour = '00';
    if($difference / 3600 > 0) {
        $hour = $difference / 3600;
        $hour = (int)$hour;
        $difference = $difference - ($hour * 3600);
    }
    return $hour .':00';
}

$startTime = trim(fgets(STDIN));
$endTime = trim(fgets(STDIN));
$result = getTimeRange($startTime, $endTime);
echo $result;

?> 