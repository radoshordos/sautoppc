<?php

class Sklik_Model_Primary_Date {

    static function timestamp2Date_Ymd($stringTimestamp) {
        return date("Y-m-d", strtotime($stringTimestamp));
    }

    static function timestamp2Date_Ymd_Hm($stringTimestamp) {
        return date("Y-m-d H:m", strtotime($stringTimestamp));
    }

    static function getDate2dm_Hm($timestamp) {
        return date("d.m H:m", $timestamp);
    }

    static function getDate2Ymd($timestamp) {
        return date("Y-m-d", $timestamp);
    }

    static function getTimeintToday() {
        return mktime(0, 0, 0, date("m"), date("d"), date("Y"));
    }

}

?>