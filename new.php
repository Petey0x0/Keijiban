<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
</head>
<body>

<center><h1>新しい投稿</h1></center>
<section>
<h4>今の気持ちや気になっていることを書き込んでみましょう。</h4>
</section>

<!-- 入力フォーム -->
<section>
<form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
<label>タイトル</label><br>
<input type="text" name="title"></input><br><br>
<label>名前</label><br>
<input type="text" name="user_name"></input><br><br>
<label>本文</label><br>
<textarea name="contents" rows="8" cols="40">
</textarea><br><br>
<input type="submit" name="post" value="投稿する"></input>
<!-- キャンセルボタンを押した場合、./index.phpに遷移する -->
<button type="button" onclick="location.href='./index.php'">キャンセル</button>
</form>
</section>


<?php 
// 時間帯を日本に設定する
date_default_timezone_set('Asia/Tokyo');

// POSTが実行されるとデータを書き込む
if($_SERVER["REQUEST_METHOD"] == "POST"){
    writeData();
    
}

function writeData(){
    $title = $_POST['title'];
    $date = date("Y年m月d日 H:i:s");
    $user_name = $_POST['user_name'];
    $contents = $_POST['contents'];
    $contents = nl2br($contents);

    // 入力されたデータを配列にする
    $array = compact("title" , "date" , "user_name" , "contents");
    $string = implode(',', $array);

    //$data = "<hr>\r\n";
    //$data = $data."<p>タイトル:".$title."</p>\r\n";
    //$data = $data."<p>投稿日時:".$date."</p>\r\n"; //時間ずれてる
    //$data = $data."<p>投稿者:".$user_name."</p>\r\n";
    //$data = $data."<p>内容:</p>\r\n";
    //$data = $data."<p>".$contents."</p>\r\n";
    //$data = $data."<form method='POST'action='edit.php'>\r\n";
    //$data = $data."<input type='submit' value='編集'>\r\n";



    $data_file = 'data.csv';
    $fp = fopen($data_file, 'ab') or die("OPENエラー $data_file");
    
    if ($fp){
        if (flock($fp, LOCK_EX)){
            // $context = fread($fp, filesize('data.csv'));
            // ftruncate($fp, 0);
            // rewind($fp);
            // fwrite($fp, $string . "\r\n");
            // fwrite($fp, $context);

            if (fputs($fp,  $string . "\r\n") === FALSE){
                print('ファイル書き込みに失敗しました');
            }
            flock($fp, LOCK_UN);
        }else{
            print('ファイルロックに失敗しました');
        }
    }
    fclose($fp);
}

// post送信が行われた場合、./index.phpに遷移する
if (isset($_POST['post'])) {
    header('Location: ./index.php');
    exit;
}



?>
</body>
</html>