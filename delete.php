<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
</head>
<body>

<center><h1>確認画面</h1></center>

<!-- 確認フォーム -->
<section>
<h4>本当に削除しますか？</h4><br>
</section>
<section>
<form action="<?php print($_SERVER['PHP_SELF']) ?>" method="POST">

<!-- はい、いいえのボタン -->
<input type="submit" name="delete" value="はい">
<button type="button" onclick="location.href='./index.php'">いいえ</button>
</form>
</section>


<?php
print "<br><br>投稿番号は";
print $_GET['post_id']."です。<br>";
$post_id = $_GET['post_id'];

// POSTが実行されるとデータを削除する
if($_SERVER["REQUEST_METHOD"] == "POST"){
    deleteData();

}

function deleteData(){
    // $title = $_POST['title'];
    // $date = date("Y年m月d日 H:i:s");
    // $user_name = $_POST['user_name'];
    // $contents = $_POST['contents'];
    // $array = compact("title" , "date" , "user_name" , "contents");
    // $string = implode(',', $array);


    $data_file = 'data.csv';
    $fp = fopen($data_file, "wb");


    // if (isset($_GET['post_id'])) {
    //     $data_file = 'data.csv';
    //     $fp = fopen($data_file, "wb");
    //     $delete = $_POST['delete'];
    //     $array = array($delete);
    //     $lines = file($fp);

    //     for ($i = 0; $i < count($lines); $i++) {
    //         $line = explode(",", $lines[$i]);
    //         if ($line[$delete] != $lines[$i]) {
    //             fwrite($fp, $lines[$i]);
    //         } else {
    //             fwrite($fp, '');
    //         }
    //         if ($fp){
    //             if (flock($fp, LOCK_EX)){
    //                 if (fputs($fp, $lines . "\r\n") === FALSE){
    //                     print('ファイル書き込みに失敗しました');
    //                 }
    //                 flock($fp, LOCK_UN);
    //             } else {
    //                 print('ファイルロックに失敗しました');
    //             }
    //         }
            // $lines = array_filter($lines, 'strlen');
        // }
        fclose($fp);
    // }
    
}

// post送信が行われた場合、./index.phpに遷移する
if (isset($_POST['delete'])) {
    header('Location: ./index.php');
    exit;
}


?>
</body>
</html>