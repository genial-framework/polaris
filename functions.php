<?php
/**
 * Celestial Body.
 *
 * @link    <https://github.com/Celestial-Body/Betelgeuse> Github repository.
 * @license <https://github.com/Celestial-Body/Betelgeuse/blob/master/LICENSE> GPL-3.0 License.
 */

if (!function_exists('depth')) {
    function depth($input)
    {
        if (!canVarLoop($input)) {
            return (int) "0";
        }
        $arrayiter = new RecursiveArrayIterator($input);
        $iteriter = new RecursiveIteratorIterator($arrayiter);
        foreach ($iteriter as $value) {
            $d = $iteriter->getDepth() + 1;
            $result[] = "$d";
        }
        return (int) max($result);
    }
}

if (!function_exists('canVarLoop')) {
    function canVarLoop($input)
    {
        return (bool) (is_array($input) || $input instanceof Traversable) ? true : false;
    }
}

if (!function_exists('isArrayMulti')) {
    function isArrayMulti($array)
    {
        foreach ($array as $val) {
            if (is_array($val)) {
                return (bool) true;
            }
        }
        return (bool) false;
    }
}

if (!function_exists('checkdnsrr')) {
    function checkdnsrr($arg, $record = 'MX')
    {
        if (!empty($arg) && !empty($record)) {
            $record = escapeshellarg($record);
            $arg = escapeshellarg($arg);
            exec("nslookup -type=$record $host", $res);
            foreach ($res as $val) {
                if (stristr($val, $host)) {
                    return true;
                }
            }
        }
        return false;
    }
}
