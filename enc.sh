#!/bin/sh
#第1引数=動画URL
#第2引数=書き出し先ディレクトリ名

#ディレクトリ作成
mkdir -p "data/$2"
cd "data/$2"

#ffmpeg実行
#因みにここのFFmpegコマンドをいじると解像度の変更やHLS動画を出力させたりもできるよ
ffmpeg -i ${1} -filter:v:0 scale=1920:-2 -c:v:0 libx264 -b:v:0 1200k -c:a:0 aac -b:a:0 240k -filter:v:1 scale=1280:-2 -c:v:1 libx264 -b:v:1 900k -c:a:1 aac -b:a:1 128k -filter:v:2 scale=960:-2 -c:v:2 libx264 -b:v:2 500k -c:a:2 aac -b:a:2 96k -map 0:v -map 0:a -map 0:v -map 0:a -map 0:v -map 0:a -f dash -window_size 0 -adaptation_sets "id=0,streams=v id=1,streams=a" -movflags +faststart "stream.mpd"