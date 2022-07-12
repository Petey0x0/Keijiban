<?php
$a = "aa";
$b = "bbb";
$c = "cccc";
echo $a;
echo "<br>";
echo $b;
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>掲示板</title>
    </head>

    <body>
        <div><?= $c ?></div>
        <?php
            $d = "d";
            $e = "テスト";
            echo $d;
        ?>
        <div><?php echo $a."/".$b."/".$c."/".$d; ?></div>
        <div><?= $e ?></div>
        </body>
</html>
<?php
$page_name = "編集画面";
echo $page_name;
?>