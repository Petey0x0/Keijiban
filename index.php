<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
</head>
<body>

<center><h1>掲示板</h1></center>
<section>
<h4>この掲示板で自由自在につぶやくことができます。投稿してみませんか。</h4>
<button type="button" onclick="location.href='./new.php'">新規作成</button>
</section>

<section>
<?php

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $fp = fopen('data.csv', 'ab');
//     fputcsv($fp, [$_POST['name'], $_POST['text']]);
//     fclose($fp);
// }


//投稿がないとき投稿がありませんと表示する
$data_file = 'data.csv';
$ret_array = file($data_file);
// $ret_array = array_reverse($ret_array);
    if(empty($ret_array) === true) {
        echo "<hr>";
        echo "<h4>まだ投稿はありません</h4>";
    } else {
        readData();

    }

function readData(){
    $data_file = 'data.csv';

    $fp = fopen($data_file, 'rb');

    if ($fp){
        if (flock($fp, LOCK_SH)){
            $list_count = 0;
            while ($array = fgetcsv($fp, 1000, ",")) {
                echo "<hr>";
                for ($i = 0; $i < count($array); $i++) {
                    if($i == 0){
                        echo "<p>タイトル:".$array[$i]."</p>";
                        $title = $array[$i];
                    }
                    if($i == 1){
                        echo "<p>投稿日時:".$array[$i]."</p>";
                        $date = $array[$i];
                    }
                    if($i == 2){
                        echo "<p>名前:".$array[$i]."</p>";
                        $user_name = $array[$i];
                    }
                    if($i == 3){
                        echo "<p>本文:".$array[$i]."</p>";
                        $contents = $array[$i];
                    }
                }
                
                echo "<div style='display:inline-flex'>";
                echo "<form method='GET'action='edit.php'>";
                echo "<input type='hidden' name='post_id' value=$list_count>";
                echo "<input type='submit' value='編集'></form>";
                echo "<form method='GET'action='delete.php'>";
                echo "<input type='hidden' name='post_id' value='$list_count'>";
                echo "<input type='submit' value='削除'></form>";
                echo "</div>";

                $list_count= $list_count + 1;
            }
            flock($fp, LOCK_UN);
        }else{
            print('ファイルロックに失敗しました');

        }
    }

    fclose($fp);

}



?>
</section>
</body>
</html>