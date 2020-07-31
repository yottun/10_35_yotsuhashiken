<?php

session_start();
include('functions.php');
check_session_id();
// var_dump($_POST["category"]);
// exit();

$pdo = connect_to_db();

// データ取得SQL作成
$sql = 'SELECT * FROM kadai_recipe_table WHERE category ="' . $_POST["category"] . '"';
// var_dump($sql);
// exit();
// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
$view = "";

if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    exit("sqlError:" . $error[2]);
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    // fetchAll()関数でSQLで取得したレコードを配列で取得できる
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
    $output = "";
    // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
    // `.=`は後ろに文字列を追加する，の意味
    foreach ($result as $record) {
        $output .= "<tr>";
        $output .= "<td>{$record["recipename"]}</td>";
        $output .= "<td>{$record["category"]}</td>";
        // $output .= "<td>{$record["howto"]}</td>";
        $output .= "<td><img src='{$record["recipe_image"]}' height=150px></td>";

        // edit deleteリンクを追加
        $output .= "<td><a href='recipe_edit.php?id={$record["id"]} '>更新</a></td>";
        $output .= "<td><a href='recipe_delete.php?id={$record["id"]} '>レシピ削除</a></td>";

        $output .= "</tr>";

        unset($value);
    }
    // $valueの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
    // 今回は以降foreachしないので影響なし
    unset($record);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB連携型todoリスト（一覧画面）</title>
    <link rel="stylesheet" href="css/style2.css?<?= strtotime('now') ?>">
</head>

<body>
    <!-- ヘッダー -->
    <header class="PC_header">
        <div class="logo"><img src="img/okomekun.png" alt="" width="100px" height=100px></div>
        <div class="headertitle">レシピ一覧 </div>
        <ul>
            <li><a href="index.php">レシピ新規登録</a></li>
            <li><a href="recipe_read.php">レシピ一覧</a></li>
            <!-- <li><a href="recipe.php">レシピ表示</a></li> -->
        </ul>
    </header>

    <form action="search.php" method="post">
        <select name="category" id="">
            <option value="">選択してください</option>
            <option value="ダイエットレシピ">ダイエットレシピ</option>
            <option value="筋トレレシピ">筋トレレシピ</option>
            <option value="骨活レシピ">骨活レシピ</option>
            <option value="最強トーストレシピ">最強トーストレシピ</option>
            <option value="その他">その他</option>
        </select>
        <input type="submit" value="検索">
    </form>

    <table class="recipe_read_table">
        <thead>
            <tr>
                <th>レシピ名</th>
                <th>レシピカテゴリ</th>
                <!-- <th>作り方</th> -->
                <th>写真</th>
                <th>変更</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            <?= $output ?>
        </tbody>

        <style>
            .PC_header {
                margin-bottom: 30px;
            }

            th,
            td {
                border: solid 1px;
                padding: 10px;
            }

            td {
                width: 170px;
                /* 幅指定 */
                height: 30px;
                /* 高さ指定 */
                text-align: center;
            }

            .recipe_read_table {
                border-collapse: collapse;
                /* セルの線を重ねる */
            }
        </style>
</body>

</html>