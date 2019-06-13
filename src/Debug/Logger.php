<?php

declare(strict_types=1);

namespace Mfalm3\Debug;

use Mfalm3\Config\Config;


if(!defined('STDOUT')) define('STDOUT', fopen(Config::PATH_TO_APP_LOG.'/log.txt', 'w'));

final class Logger {

    public static function log(...$args): void {
        foreach ($args as $arg) {
            if (is_object($arg) || is_array($arg) || is_resource($arg)) {
                $output = print_r($arg, true);
            } else {
                $output = (string) $arg;
            }

            fwrite(STDOUT, date("H:i:s d,M 'y")."\t\t".$output . "\n\n");
        }
    }
}