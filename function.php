// 前几个月的此刻
function getThisMomentMonthsAgo ($time, $num) {
    $thisDay = date('d', $time);
    $month = date('m', $time);
    $year = date('Y', $time);

    $lastMonth = $month - $num;
    $lastYear = $year;

    $goYears = $lastMonth/12 + 1;
    if ($lastMonth <= 0) {
        $lastMonth = 12 + $lastMonth;
        $lastYear = $year - $goYears;
    }
    $monthDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $lastMonthDays = cal_days_in_month(CAL_GREGORIAN, $lastMonth, $lastYear);
    // 取最小
    $day = min([$thisDay, $lastMonthDays, $monthDays]);
    return strtotime($lastYear.'-'.$lastMonth.'-'.$day.' '.date('H:i:s',$time));
}
