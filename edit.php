<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
</head>
<body>

<center><h1>編集画面</h1></center>
<section>
<h4>投稿を編集できます。</h4>
</section>

<!-- 編集フォーム -->
<section>
<form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
<label>タイトル</label><br>
<input type="text" name="title"></input><br><br>
<label>名前</label><br>
<input type="text" name="user_name"></input><br><br>
<label>本文</label><br>
<textarea name="contents" rows="8" cols="40">
</textarea><br><br>
<input type="submit" name="post" value="編集する"></input>
<!-- キャンセルボタンを押した場合、./index.phpに遷移する -->
<button type="button" onclick="location.href='./index.php'">キャンセル</button>
</form>
</section>

<?php
// 時間帯を日本に設定する。
date_default_timezone_set('Asia/Tokyo');


if($_SERVER["REQUEST_METHOD"] == "POST"){
    writeData();
}


function writeData(){ 
    $get_num = $_GET['post_id'];
    $get_num_int = (int)$get_num;
    $title = $_POST['title'];
    $date = date("Y年m月d日 H:i:s");
    $user_name = $_POST['user_name'];
    $contents = $_POST['contents'];

    $array = compact("title" , "date" , "user_name" , "contents");
    $string = implode(',', $array);
    
    $data_file = 'data.csv';

    $text = file_get_contents($data_file);
    $text = str_replace(["\r\n", "\r", "\n"], "\n", $text);
    $lines = explode("\n", $text);
    $lines = array_filter($lines, 'strlen');
    $lines = array_values($lines);

    $lines[$get_num_int] = $string;

    $final = implode("\r\n", $lines);

    $fp = fopen($data_file, 'w');

    if ($fp){
        if (flock($fp, LOCK_EX)){
            if (fputs($fp, $final . "\r\n") === FALSE){
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
    header('Location: ./index.php', true, 302);
    exit;
}


?>
</body>
</html>