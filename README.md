# LN-Stream
Live!NECO用動画ストリームシステム

## LN-Streamとは

LN-StreamはLive!NECO用の動画を生成したり

サムネイルを出力するアプリケーションです。

## 特徴

- シンプルなコード記述
  
  コードを見てもらえれば分かりますが、シェルスクリプトにほんの少しのPHPが添えられた大変シンプルなコードに仕上がっています。

- 簡単な操作
  
  ストリームの生成や破棄をURLクエリから簡単に行うことができます。

- あらゆる動画形式に対応

  エンコーダーにFFmpegを採用しているので幅広い動画を処理できます。

## 導入方法

適当なLinux OSの入ったマシンにWebサーバー、php、FFmpegをインストールして

WebサーバーのディレクトリにこのアプリケーションをコピペすればOK!

## 使い方

- http://[ip or url]/LN-Stream/?query={ **Reruas ID** }&mode={ **mode** }

  **Reruas ID** ・・・　処理したい動画のReruas IDを指定します。

  **mode**      ・・・ 動作モードを指定します。 **"stream"** と入力するとストリームの生成、

 　　　　　　　　**"kill"** と入力すると指定したReruas IDのストリームを破棄

## 注意点

このアプリケーションはWindowsでは動きません。またWebサーバーもApacheでしか動作確認していないので

Nginxで動くかどうかもわかりません。

現状ではReruasに登録された動画しかストリームできません。今後一般的なWebサーバー上に上がっている

動画もストリームできるようにする予定です。

## 今後の展望とか

今回予想以上にシンプルなコードであらかたの機能を実装できてしまったので今後、LN-StreamをそのままLive!NECOの内部

に組み込む可能性があります。そうなった場合はこのリポジトリを削除と思うので頭の片隅にでも入れといてください。

## サムネイル自動生成

新たにサムネイルの生成機能を追加しました。この機能の特徴として、動画のIDと取得する再生時間を指定するとその動画のサムネイル画像が直接ブラウザにレスポンスされます。

生成されたサムネイル画像はサーバー内部にキャッシュせず、そのまま直接接続元のクライアントに返す動作をします。
なので例えば一度に100個の動画のサムネイル生成をリクエストしたとしても、メモリオーバーフローやストレージ不足
による異常停止が起きないような構造になっています。

また、近年のブラウザに当たり前のように実装されている複数のリンク先を並列で取得するマルチスレッド機能に完全対応しているので高速な並列サムネイル取得が期待できます。

## 2025年更新

更新というほど大げさなことは行ってないのですが、HLSでABR(Adaptive Bitrate Stream)動画を出力できるように
FFmpegコマンドを書き換えました。

