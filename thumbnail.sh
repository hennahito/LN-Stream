#!/bin/sh
#第1引数=動画URL
#第2引数=画像の切り出しの開始位置(※切り出しの開始位置が元動画の終了点に近いほど時間がかかります)

ffmpeg -i ${1} -loglevel quiet -ss ${2} -vframes 1 -q:v 3 -s 853x480 -f image2 pipe:1