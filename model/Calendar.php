<?php
class Calendar {
    static public function strToTimestamp($str) {
        
        $arr = explode('-', $str);        
        $timestamp = mktime(0,0,0,$arr[1],$arr[2],$arr[0]);        
        return $timestamp;
    }
}

