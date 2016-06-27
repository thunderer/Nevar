<?php
namespace Thunder\Nevar;

/**
 * @author Tomasz Kowalczyk <tomasz@kowalczyk.cc>
 */
final class Nevar
{
    public static function describe($var)
    {
        $type = gettype($var);

        if('object' === $type) {
            return 'object of class '.get_class($var);
        } elseif('resource' === $type) {
            return 'resource of type '.get_resource_type($var);
        } elseif('array' === $type) {
            if(empty($var)) { return 'empty array'; }
            if(is_callable($var)) { return 'callable array'; };
            if(array_filter($var, 'is_int', ARRAY_FILTER_USE_KEY)) { return 'indexed array'; }

            return 'associative array';
        } elseif('integer' === $type) {
            if($var < 0) { return 'negative integer'; }
            if($var > 0) { return 'positive integer'; }

            return 'zero integer';
        } elseif('double' === $type) {
            if(is_infinite($var)) { return 'infinite float'; }
            if(is_nan($var)) { return 'invalid float'; }
            if($var < 0) { return 'negative float'; }
            if($var > 0) { return 'positive float'; }

            return 'zero float';
        } elseif('string' === $type) {
            if(is_callable($var)) { return 'callable string'; }
            if(is_numeric($var)) { return 'numeric string'; }

            return 'string';
        } elseif('boolean' === $type) {
            return true === $var ? 'boolean true' : 'boolean false';
        } else {
            return 'unknown type';
        }
    }
}
