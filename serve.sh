#!/usr/bin/env bash

echo -e "["`date +%H:%M:%S`']\t Php Backup XML Reader Started';
php -S 127.0.0.1:8000 -t public >> /dev/null