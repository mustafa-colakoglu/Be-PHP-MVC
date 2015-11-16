<?php

/**
 * @param $string
 * @return string
 */
function alt_replace($string)
{
    $search = array(
        chr(0xC2) . chr(0xA0), // c2a0; Alt+255; Alt+0160; Alt+511; Alt+99999999;
        chr(0xC2) . chr(0x90), // c290; Alt+0144
        chr(0xC2) . chr(0x9D), // cd9d; Alt+0157
        chr(0xC2) . chr(0x81), // c281; Alt+0129
        chr(0xC2) . chr(0x8D), // c28d; Alt+0141
        chr(0xC2) . chr(0x8F), // c28f; Alt+0143
        chr(0xC2) . chr(0xAD), // cdad; Alt+0173
        chr(0xAD)
    );
    $string = str_replace($search, '', $string);
    return trim($string);
}

/*
 * $test = post('test');
 */
function post($name)
{
    if (isset($_POST[$name])) {
        if (is_array($_POST[$name])) {
            return array_map(function ($item) {
                return htmlspecialchars(trim(alt_replace($item)));
            }, $_POST[$name]);
        } else {
            return htmlspecialchars(trim(alt_replace($_POST[$name])));
        }
    }
}

?>