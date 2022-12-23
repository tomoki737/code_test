<?php

function isAlarm($hanteiDate, $isHoliday, $alarmTime1, $alarmTime2)
{
  if (!$isHoliday) {
    $month = date('Y-m', $hanteiDate);
    $last_of_month = strtotime('last day of' . $month);
    $hanteiYear = date('Y-m-d', $hanteiDate);
    $hanteiMonth = strtotime($hanteiYear);
    $hanteiHour = strtotime(date('H:i:s', $hanteiDate));

    if ($last_of_month == $hanteiMonth) {
      return checkAlermTime($alarmTime2, $hanteiHour);
    } 

    return checkAlermTime($alarmTime1, $hanteiHour);
  } else {
    return false;
  }
}

function checkAlermTime($alarmTime, $hanteiDate)
{
  return $alarmTime <= $hanteiDate ? true : false;
}

// 呼び出し元
function check()
{
  // アラーム設定
  $t = strtotime(date('Y-m-d H:i:s', mktime(07, 00, 0000, 4, 1, 2022)));
  // 判定日時
  $alarmTime1 = strtotime("07:00");
  $alarmTime2 = strtotime("06:30");

  // アラーム判定処理
  $result = isAlarm($t, false, $alarmTime1, $alarmTime2);

  // 標準出力に結果を出力
  print("結果:%v" . $result);
}