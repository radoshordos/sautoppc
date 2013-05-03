<?php

class Model_Datum {

    static function Html5DateToday() {
        return date("Y-m-d", strtotime("now"));
    }

    static function Strtotime2DateAndTime($int) {
        return date("Y-m-d H:i:s", $int);
    }

    static function Timeint2Date_dm($timeint) {
        return date("dm", $timeint);
    }

    static function TimeintToday() {
        return mktime(0, 0, 0, date("m"), date("d"), date("Y"));
    }

    static function Timeint2Date_Ymd($timeint) {
        return date("Y-m-d", $timeint);
    }

}

?>