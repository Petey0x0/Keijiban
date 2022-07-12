<html>
<head><title>掲示板</title></head>
<body>

<p>新しい投稿</p>

<form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
<label>タイトル</label><br>
<input type="text" name="title"></input><br><br>
<label>名前</label><br>
<input type="text" name="user_name"></input><br><br>
<label>本文</label><br>
<textarea name="contents" rows="8" cols="40">
</textarea><br><br>
<input type="submit" name="post" value="投稿する"></input>
</form>

<!-- キャンセルボタンを押した場合、./index.phpに遷移する -->
<button type="button" onclick="location.href='./index.php'">キャンセル</button>

<!-- 入力した内容をhtml形式に変換して、data.txtに書き込む -->
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    writeData();
}

function writeData(){

    // $unitime = date();
    // dipslay_datetime($unitime, 'Asia/Tokyo');

    // function dipslay_datetime($unix_timestamp, $tz){
    //     date_default_timezone_set($tz);
    //     $script_tz = date_default_timezone_get();
    //     echo $script_tz;
    // }

    $title = $_POST['title'];
    $date = date("Y年m月d日 H:i:s", /*$unix_timestamp*/);
    $user_name = $_POST['user_name'];
    $contents = $_POST['contents'];
    $contents = nl2br($contents);
    $id = 0;
    $id = $id + 1;

    $data = "<hr>\r\n";
    $data = $data."<p>".$id."</p>\r\n";
    $data = $data."<p>タイトル:".$title."</p>\r\n";
    $data = $data."<p>投稿日時:".$date."</p>\r\n";
    $data = $data."<p>投稿者:".$user_name."</p>\r\n";
    $data = $data."<p>内容:</p>\r\n";
    $data = $data."<p>".$contents."</p>\r\n";
    $data = $data."<form method='POST'action='edit.php'>\r\n";
    $data = $data."<input type='submit' value='編集'>\r\n";


    $data_file = 'data.txt';

    $fp = fopen($data_file, 'ab');

    if ($fp){
        if (flock($fp, LOCK_EX)){
            if (fwrite($fp,  $data) === FALSE){
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