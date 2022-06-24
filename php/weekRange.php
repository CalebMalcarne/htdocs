<?php
function getWeekRange($week, $year) {
  $dateTime = new DateTime();
  $dateTime->setISODate($year, $week);
  $result['start_date'] = $dateTime->format('M/d/Y');
  $dateTime->modify('+6 days');
  $result['end_date'] = $dateTime->format('M/d/Y');
  return $result;
}
?>