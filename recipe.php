<?php
session_start();
// var_dump($_SESSION);
// exit();
include('functions.php');
check_session_id();
// var_dump($_POST);
// exit();

// 項目入力のチェック
// 値が存在しないor空で送信されてきた場合はNGにする
if (
    !isset($_POST['recipename']) || $_POST['recipename'] == '' ||
    !isset($_POST['category']) || $_POST['category'] == '' ||
    !isset($_POST['howto']) || $_POST['howto'] == '' ||
    !isset($_POST['foodName0']) || $_POST['foodName0'] == '' ||
    // !isset($_POST['foodName1']) || $_POST['foodName1'] == '' ||
    // !isset($_POST['foodName2']) || $_POST['foodName2'] == '' ||
    // !isset($_POST['foodName3']) || $_POST['foodName3'] == '' ||
    // !isset($_POST['foodName4']) || $_POST['foodName4'] == '' ||
    !isset($_POST['g0']) || $_POST['g0'] == '' ||
    // !isset($_POST['g1']) || $_POST['g1'] == '' ||
    // !isset($_POST['g2']) || $_POST['g2'] == '' ||
    // !isset($_POST['g3']) || $_POST['g3'] == '' ||
    // !isset($_POST['g4']) || $_POST['g4'] == '' ||
    !isset($_POST['howto']) || $_POST['howto'] == ''
) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}

if (isset($_FILES['recipe_image']) && $_FILES['recipe_image']['error'] == 0) {

    $uploadedFileName = $_FILES['recipe_image']['name'];
    $tempPathName = $_FILES['recipe_image']['tmp_name'];
    $fileDirectoryPath = 'upload/';

    $extension = pathinfo($uploadedFileName, PATHINFO_EXTENSION);
    $uniqueName = date('YmdHis') . md5(session_id()) . "." . $extension;
    $fileNameToSave = $fileDirectoryPath . $uniqueName;

    // var_dump($fileNameToSave);
    // exit();

    if (is_uploaded_file($tempPathName)) {
        if (move_uploaded_file($tempPathName, $fileNameToSave)) {
            chmod($fileNameToSave, 0644);
            $img = '<img src="' . $fileNameToSave . '" height="250px" >';
        } else {
            exit('保存できませんでした');
        }
    } else {
        exit('ファイルがありません');
    }
} else {
    exit('画像が送信されていません');
}


// 受け取ったデータを変数に入れる
$recipename = $_POST['recipename'];
$category = $_POST['category'];
$howto = $_POST['howto'];
$foodName0 = $_POST['foodName0'];
$foodName1 = $_POST['foodName1'];
$foodName2 = $_POST['foodName2'];
$foodName3 = $_POST['foodName3'];
$foodName4 = $_POST['foodName4'];
$g0 = $_POST['g0'];
$g1 = $_POST['g1'];
$g2 = $_POST['g2'];
$g3 = $_POST['g3'];
$g4 = $_POST['g4'];
$g_result = $_POST['g_result'];
$enerc_kcal_result = $_POST['enerc_kcal_result'];
$protein_result = $_POST['protein_result'];
$lipid_result = $_POST['lipid_result'];
$carbohydrate_result = $_POST['carbohydrate_result'];
$fibtg_result = $_POST['fibtg_result'];
$ca_result = $_POST['ca_result'];
$fe_result = $_POST['fe_result'];
$vita_rae_result = $_POST['vita_rae_result'];
$vitd_result = $_POST['vitd_result'];
$vitk_result = $_POST['vitk_result'];
$thiahcl_result = $_POST['thiahcl_result'];
$ribf_result = $_POST['ribf_result'];
$vitc_result = $_POST['vitc_result'];
$nacl_eq_result = $_POST['nacl_eq_result'];

// for ($i = 0; $i < 5; $i++) {
//     $foodName . $i = $_POST[${"foodName{$i}"}];
//     $g . $i = $_POST[${"g{$i}"}];
// }

// var_dump($_POST);
// exit();



?>


<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>タイトル</title>
    <meta name="description" content="ディスクリプション">
    <link rel="stylesheet" href="css/style2.css?<?= strtotime('now') ?>">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/style.js"></script>
</head>

<body>
    <header class="PC_header">
        <div class="logo"><img src="img/okomekun.png" alt="" width="100px" height=100px></div>
        <div class="headertitle">レシピ確認画面</div>
        <ul>
            <li><a href="index.php">レシピ新規登録</a></li>
            <li><a href="recipe_read.php">レシピ一覧</a></li>
            <!-- <li><a href="recipe.php">レシピ表示</a></li> -->
        </ul>
    </header>
    <form action="recipe_create.php" method="POST">
        <h3>レシピカテゴリ : <?= $category ?></h3>
        <input type="hidden" name="category" value="<?= $category ?>">
        <h3>料理名 : <?= $recipename ?></h3>
        <input type="hidden" name="recipename" method="POST" value="<?= $recipename ?>">
        </div>
        <div class="howto2">
            <div class="table1">
                <table border="1">
                    <thead>
                        <tr>
                            <th>材料</th>
                            <th>分量</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $foodName0 ?></td>
                            <td><?= $g0 ?>g</td>
                        </tr>
                        <tr>
                            <td><?= $foodName1 ?></td>
                            <td><?= $g1 ?>g</td>
                        </tr>
                        <tr>
                            <td><?= $foodName2 ?></td>
                            <td><?= $g2 ?>g</td>
                        </tr>
                        <tr>
                            <td><?= $foodName3 ?></td>
                            <td><?= $g3 ?>g</td>
                        </tr>
                        <tr>
                            <td><?= $foodName4 ?></td>
                            <td><?= $g4 ?>g</td>
                        </tr>
                        <tr>
                            <td>合計</td>
                            <td><?= $g_result ?>g</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="recipe_img1">
                <?= $img ?>
                <input type="hidden" methos="POST" name="recipe_image" height="200px" value="<?= $fileNameToSave ?>">
            </div>
            <div class="table2">
                <h3>作り方</h3>
                <input type="hidden" name="howto" method="POST" value="<?= $howto ?>">
                <p><?= $howto ?></p>
            </div>
        </div>
        <h3>栄養価</h3>
        <table border="1">
            <tr>
                <th>エネルギー</th>
                <th>たんぱく質</th>
                <th>脂質</th>
                <th>炭水化物</th>
                <th>食物繊維</th>
                <th>カルシウム</th>
                <th>鉄</th>
                <th>レチノール当量</th>
                <th>ビタミンD</th>
                <th>ビタミンK</th>
                <th>ビタミンB1</th>
                <th>ビタミンB2</th>
                <th>ビタミンC</th>
                <th>食塩</th>
            </tr>
            <tr>
                <td><?= $enerc_kcal_result ?>kcal</td>
                <td><?= $protein_result ?>g</td>
                <td><?= $lipid_result ?>g</td>
                <td><?= $carbohydrate_result ?>g</td>
                <td><?= $fibtg_result ?>g</td>
                <td><?= $ca_result ?>mg</td>
                <td><?= $fe_result ?>mg</td>
                <td><?= $vita_rae_result ?>μg</td>
                <td><?= $vitd_result ?>μg</td>
                <td><?= $vitk_result ?>μg</td>
                <td><?= $thiahcl_result ?>mg</td>
                <td><?= $ribf_result ?>mg</td>
                <td><?= $vitc_result ?>mg</td>
                <td><?= $nacl_eq_result ?>g</td>
            </tr>

        </table>
        <button>送信</button>
    </form>

</body>

</html>