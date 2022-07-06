#!/bin/bash

PACKAGE_DIR=$(dirname -- $0)/..

$PACKAGE_DIR/vendor/bin/phpunit --verbose .
