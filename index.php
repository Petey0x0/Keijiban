<html>
<head><title>掲示板</title></head>
<body>

<p>掲示板</p>
<button type="button" onclick="location.href='./new.php'">新規作成</button>
<button type="button" onclick="location.href='./delete.php'">削除</button>

<?php
function readData(){
    $data_file = 'data.txt';

    $fp = fopen($data_file, 'rb');

    if ($fp){
        if (flock($fp, LOCK_SH)){
            while (!feof($fp)) {
                $buffer = fgets($fp);
                print($buffer);
            }

            flock($fp, LOCK_UN);
        }else{
            print('ファイルロックに失敗しました');
        }
    }

    fclose($fp);
}
readData();

// print'<form method="POST"action="edit.php">';
// print'<input type="submit" value="編集">';

?>
</body>
</html>