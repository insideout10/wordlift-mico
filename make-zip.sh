#!/bin/sh

mkdir dist
cd dist

rm -fr wordlift-mico tmp

git clone -b master https://github.com/insideout10/wordlift-mico.git tmp

mkdir wordlift-mico

cp -R tmp/src/* wordlift-mico/

rm -fr tmp

output=`date "+wordlift-mico-%Y%m%d-%H%M%S"`
zip -r $output wordlift-mico

rm -fr wordlift-mico
