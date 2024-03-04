#!/bin/bash
#第1引数=Reruas id
#第2引数=削除するストリームデータディレクトリ
ps aux | grep ffmpeg | grep ${1} | grep -v grep | awk '{ print "kill -9", $2 }' | sh
rm -rf data/${2}
