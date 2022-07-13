# 簡易掲示板
リスト、作成、編集、削除機能の含まれたWebアプリケーションです。

<br>

## ファイル編成
---
### index.php（リストページ）
本Webアプリケーションのホームページであり、全ての投稿を表示させます。<br>
新規作成や各投稿の編集、削除のボタンを押すことでほかのページへ遷移することができます。<br>

### new.php（作成ページ）
本Webアプリケーションの投稿フォームであり、タイトル、名前、本文を入力し、投稿するを押すことで入力データをデータファイルへ転送し、ページをリストページへ遷移します。<br>
キャンセルを押すことで、何もせずにリストページへ遷移します。<br>

### edit.php（編集ページ）
本Webアプリケーションの編集フォームであり、タイトル、名前、本文を入力し、編集するを押すことで入力データを上書きし、ページをリストページへ遷移します。<br>
キャンセルを押すことで、何もせずにリストページへ遷移します。<br>

### delete.php（削除ページ）
本Webアプリケーションの削除確認フォームであり、はいを押すことでデータを削除し、ページをリストページへ遷移します。<br>
いいえを押すことで、何もせずにリストページへ遷移します。<br>

### data.csv（データファイル）
入力されたデータを保存するファイルです。<br>

<br>

## 本課題にチャレンジした感想
---
### 注目してほしい点
まだ途中までですが、本アプリケーションでは、データベースを使用せず、データをすべてcsvファイルに保存している部分を見てほしいです。<br>
個々データを使用する際に、csvファイルの中身を読み取り、配列に変換して、各行番号を投稿番号として認識させて取り出している部分を見てほしいです。
<br>

### 理解できた点(できた機能)
htmlとphpの基本的な書き方。<br>
すべての投稿を表示させるリストページ。<br>
新規作成、編集、削除ボタンの追加。<br>


### 理解できなかった点(できなかった機能)
最新投稿を一番上に表示させる点。```array_reverse```を使ってみたが、行ごとに逆転させることができませんでした。
<br>
指定投稿を編集する点。投稿をidで指定して、上書きさせるという動きですが、idが0に固定されているため、どこの編集ボタンから編集させると一番古い投稿が変更されてしまいます。<br>
指定投稿を削除点。すべてのデータが削除されてしまいます。
<br>

### 苦労した点
はじめは、MacOSを使用したが、XAMPPでApacheの起動ができなかったので、WindowsOSに変更しました。<br>
編集機能と削除機能<br>
csvファイルの中身を配列化し、必要な行idだけを取り出す点に苦労しました。
<br>

投稿時間を日本時間を表示するのにphp.iniのタイムゾーンを編集したが、変化はなかったので、以下のコードを追加すると、日本時間になりました。
```date_default_timezone_set('Asia/Tokyo');```
<br>

### 感想
phpを用いて簡易的なWebアプリケーションを作成してみました。<br>
作業しているときと、新しい機能が完成した時の達成感が大きく、もっと色々な機能を付けたい気持ちと楽しさを感じました。<br>
今回の課題では、データベースを使わずに、特定のデータを取得することがすごく難しく、改めてデータベースの有難味を感じました。今回の課題をきっかけに他のアプリケーションも作ってみて、php以外にcssや他の言語も勉強してみたいと考えています。<br>


<br>

## 参考文献
---
1.西沢直木, PHP辞典, 株式会社 翔泳社, 2008-02.
<br>
2.西沢直木, PHPによるWebアプリケーションスーパーサンプル 第２版, ソフトバンク クリエイティブ株式会社, 2007-11.
<br>
3.株式会社 オフィスエム, 10日で覚えるPHP入門教室, 株式会社 翔泳社, 2003-06. 
<br>
4.谷藤賢一, 気づけばプロ並みPHP 改正版--ゼロから作れる人になる!, リックテレコム, 2017-03.
<br>
5.大藤幹, 今すぐ使えるかんたんEx HTML&CSS 逆引き事典, 株式会社 技術評論社, 2020-05.