<?php

if (!function_exists("array_to_object")) {
    function array_to_object($array)
    {
        return json_decode(json_encode($array));;
    }
}