<!--<?

$datetime1 = new DateTime("05.08.2016 02:11");
$datetime2 = new DateTime('06.08.2016 02:11');

$interval = $datetime1->diff($datetime2);
echo $interval->format('%R%D дней, %R%H часов, %R%I минут, %R%S секунд');
echo "<br>";
echo date_diff(new DateTime(), new DateTime('1986-01-04 00:00:01'))->days;
echo "<br/>";
echo "жоопа";
echo "марина";
echo "<br/>";
?>
<?php

// Example

$strStart = '2013-06-19 18:25';
$strEnd   = '2013-06-18 10:25';

?>

<?php

$dteStart = new DateTime($strStart);
$dteEnd   = new DateTime($strEnd);

?>

<?php

$dteDiff  = $dteStart->diff($dteEnd);

?>-->

<?php

print $dteDiff->format("%d %H:%I:%S");
$date = new DateTime('2000-01-01');
echo $datetime2->format('Y-m-d ');
/*
    Outputs

    03:22:00
*/
$strStart = '03.08.2016 07:51';
$strEnd   = '19.08.2016 07:51';

$date_now = new DateTime("now");
$strStart = new DateTime($strStart);
$strEnd   = new DateTime($strEnd);

$strStart_d=$strStart->format('Y-m-d ');
$strEnd_d =$strEnd->format('Y-m-d ');
$date_now_d = $date_now->format('Y-m-d ');

$strStart_d=new DateTime($strStart_d);
$date_now_d=new DateTime($date_now_d);
$strEnd_d=new DateTime($strEnd_d);

#var_dump($date_now);
/*echo "<br/><br/>";
var_dump($strStart_d);
die();*/
$before=var_dump($date_now_d < $strStart_d);
$shown_in_1=var_dump($date_now_d > $strEnd_d);
$shown_in_2=var_dump($date_now_d < $strEnd_d);
$past=var_dump($date_now_d > $strEnd_d);

//работаем с первоначальными условиями на понятие какие сроки в общем
if($date_now_d < $strStart_d ){

    //еше не началось
    //разница в датах
    //работаем с днями

    $interval  = $date_now->diff($strStart);
    $dteDiff_d  = $date_now->diff($strStart);
    $dteDiff_d=$dteDiff_d->format("%d");
    switch($dteDiff_d)
    {
        case 0:
            $status='Просрочена';
            $test=$interval->format('<span class="label label-success">До старта %H часов, %I минут </span>');
            break;
        default:
            $status='Выполняется';
            $test=  $interval->format('<span class="label label-success">До старта %D дней, %H часов, %I минут </span>');
        #$test='<span class="label label-warning">Просрочена сегодня</span>';
    }
}
/*
elseif (   and $mass['status']==1 ){

    $interval  = $date_now->diff($strEnd);
    $dteDiff_d  = $date_now->diff($strEnd);
    $dteDiff_d=$dteDiff_d->format("%d");
    switch($dteDiff_d)
    {
        case 0:
            $status='Выполняется';
            $test=$interval->format('<span class="label label-warning">в '.$he.':'.$xe.' завершение</span>');
            break;
        default:
            $status='Выполняется';
            $test=  $interval->format('<span class="label label-warning">Еще %R%D дней, %R%H часов, %R%I минут</span>');
        #$test='<span class="label label-warning">Просрочена сегодня</span>';
    }
}*/
elseif ( $date_now_d > $strStart_d and $date_now_d <= $strEnd_d ) {
    $interval  = $strEnd->diff($date_now);
    $dteDiff_d  = $strEnd->diff($date_now);
    $dteDiff_d=$dteDiff_d->format("%d");
    switch($dteDiff_d)
    {
        case 0:
            $status='Выполняется';
            $test=$interval->format('<span class="label label-warning">Через %R%H часов, %R%I завершение</span>');
            break;
        default:
            $status='Выполняется';
            $test=  $interval->format('<span class="label label-default">Через %R%D завершение</span>');
        #$test='<span class="label label-warning">Просрочена сегодня</span>';
    }

}
elseif ( $date_now_d > $strEnd_d) {
    $interval  = $strEnd->diff($date_now);
    $dteDiff_d  = $strEnd->diff($date_now);
    $dteDiff_d=$dteDiff_d->format("%d");
    switch($dteDiff_d)
    {
        case 0:
            $status='Выполняется';
            $test=$interval->format('<span class="label label-warning">прошло %R%H часов, %R%I</span>');
            break;
        default:
            $status='Выполняется';
            $test=  $interval->format('<span class="label label-warning">прошло %R%D дней,  %R%D назад</span>');
        #$test='<span class="label label-warning">Просрочена сегодня</span>';
    }

};
echo "<br>";

echo "<br>".$test;

?>
<?php
$arr = "PHP";
$arr[2] = "HTML";
$arr[3] = "CSS";

$arr2[1] = "PHP";
$arr2[2] = "CSS";
$arr2[3] = "DREAMWEAVER";

$diff = array_intersect($arr, $arr2);
print_r($diff);
?>
<?php
$array = array(0 => 'blue', 1 => 'red', 2 => 0x000000, 3 => 'green', 4 => 'red');

$key = array_search('red', $array);         // $key = 1;
$key = array_search('green', $array);       // $key = 2; (0x000000 == 0 == 'green')
$key = array_search('green', $array); // $key = 3;
echo $key;
?>
