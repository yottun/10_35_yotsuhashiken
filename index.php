<?php
// session_start();
include('functions.php');
// check_session_id();

$output = "";


// 入力欄の数、iの数を変更したらstyle.jsのiも変更が必要
for ($i = 0; $i < 5; $i++) {
    $output .= "<tr>";
    // $output .= "<td><input id='autocomplete" . $i . "' class='value search foodName" . $i . "' type='text'></td>";
    $output .= "<td><input id='autocomplete{$i}' class='value search foodName{$i}' type='text' name='foodName{$i}'></td>";
    $output .= "<td><input class='value g{$i} weight' type='number' name='g{$i}'>g</td>";
    $output .= "<td class='enerc_kcal'><input class='value enerc_kcal enerc_kcal{$i}' type='text' readonly='readonly'></td>";
    $output .= "<td><input class='value protein protein{$i}' type='text' readonly='readonly'></td>";
    $output .= "<td><input class='value lipid{$i}' type='text' readonly='readonly'></td>";
    $output .= "<td><input class='value carbohydrate{$i}' type='text' readonly='readonly'></td>";
    $output .= "<td><input class='value fibtg{$i}' type='text' readonly='readonly'></td>";
    $output .= "<td><input class='value ca{$i}' type='text' readonly='readonly'></td>";
    $output .= "<td><input class='value fe{$i}' type='text' readonly='readonly'></td>";
    $output .= "<td><input class='value vita_rae{$i}' type='text' readonly='readonly'></td>";
    $output .= "<td><input class='value vitd{$i}' type='text' readonly='readonly'></td>";
    $output .= "<td><input class='value vitk{$i}' type='text' readonly='readonly'></td>";
    $output .= "<td><input class='value thiahcl{$i}' type='text' readonly='readonly'></td>";
    $output .= "<td><input class='value ribf{$i}' type='text' readonly='readonly'></td>";
    $output .= "<td><input class='value vitc{$i}' type='text' readonly='readonly'></td>";
    $output .= "<td><input class='value nacl_eq{$i}' type='text' readonly='readonly'></td>";
    $output .= "</tr>";
}

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
    <script src="js/search.js"></script>
    <script src="js/search2.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.19/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.19/themes/redmond/jquery-ui.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.19/i18n/jquery-ui-i18n.min.js"></script>
</head>

<body>
    <!-- ヘッダー -->
    <header class="PC_header">
        <div class="logo"><img src="img/okomekun.png" alt="" width="100px" height=100px></div>
        <div class="headertitle">
            <h3>栄養計算ができるレシピサイト</h3>
        </div>
        </div>

        <ul>
            <li><a href="index.php">レシピ新規登録</a></li>
            <li><a href="recipe_read.php">レシピ一覧</a></li>
            <!-- <li><a href="recipe.php">レシピ表示</a></li> -->
        </ul>
    </header>
    <!-- メインビジュアル -->
    <div class="mainvisual"></div>
    <a href="recipe_read.php">一覧画面</a>
    <form action="recipe.php" method="POST" enctype="multipart/form-data">
        料理名: <input type="text" name="recipename"><br>
        <div>
            レシピカテゴリ: <select name="category" id="">
                <option value="">選択してください</option>
                <option value="ダイエットレシピ">ダイエットレシピ</option>
                <option value="筋トレレシピ">筋トレレシピ</option>
                <option value="骨活レシピ">骨活レシピ</option>
                <option value="最強トーストレシピ">最強トーストレシピ</option>
                <option value="その他">その他</option>
            </select>
        </div>
        材料・作り方: <textarea name="howto" id="howto" cols="40" rows="10"></textarea><br>
        <div><input type="file" name="recipe_image" accept="image/*" capture="camera"></div>



        <!-- こっから追加 -->
        <div>
            <!-- <div id="jquery-ui-autocomplete" class="ui-widget">
            <label for="autocomplete">フリーワード：</label>
            <input id="autocomplete" type="search" placeholder="フリーワード" size="50" maxlengh="50" /> -->
            <!-- <button class="choice">選択</button> -->
            <div>
                <div class="1">エネルギー</div>
                <div class="2"></div>
                <div class="3"></div>
                <div class="4"></div>
                <div class="5"></div>
                <div class="6"></div>
                <div class="7"></div>
                <div class="8"></div>
                <div class="9"></div>
                <div class="10"></div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>食品名</th>
                        <th>g</th>
                        <th class="enerc_kcal">エネルギー</th>
                        <th>たんぱく質</th>
                        <th>脂質</th>
                        <th>炭水化物</th>
                        <th>食物繊維<br>総量</th>
                        <th>カルシウム</th>
                        <th>鉄</th>
                        <th>レチノール<br>活性当量</th>
                        <th>ビタミン<br>D</th>
                        <th>ビタミン<br>K</th>
                        <th>ビタミン<br>B1</th>
                        <th>ビタミン<br>B2</th>
                        <th>ビタミン<br>C</th>
                        <th>食塩相当量</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- 入力欄の作成、上のphpの値を変更して数を変更 -->
                    <?= $output ?>
                    <tr>
                        <td>合計</td>
                        <td><input class="value g_result" type="text" name="g_result" readonly='readonly'>g</td>
                        <td class="enerc_kcal"><input class="value enerc_kcal enerc_kcal_result" type="text" name="enerc_kcal_result" readonly='readonly'></td>
                        <td><input class="value protein_result" type="text" name="protein_result" readonly='readonly'></td>
                        <td><input class="value lipid_result" type="text" name="lipid_result" readonly='readonly'></td>
                        <td><input class="value carbohydrate_result" type="text" name="carbohydrate_result" readonly='readonly'></td>
                        <td><input class="value fibtg_result" type="text" name="fibtg_result" readonly='readonly'></td>
                        <td><input class="value ca_result" type="text" name="ca_result" readonly='readonly'></td>
                        <td><input class="value fe_result" type="text" name="fe_result" readonly='readonly'></td>
                        <td><input class="value vita_rae_result" type="text" name="vita_rae_result" readonly='readonly'></td>
                        <td><input class="value vitd_result" type="text" name="vitd_result" readonly='readonly'></td>
                        <td><input class="value vitk_result" type="text" name="vitk_result" readonly='readonly'></td>
                        <td><input class="value thiahcl_result" type="text" name="thiahcl_result" readonly='readonly'></td>
                        <td><input class="value ribf_result" type="text" name="ribf_result" readonly='readonly'></td>
                        <td><input class="value vitc_result" type="text" name="vitc_result" readonly='readonly'></td>
                        <td><input class="value nacl_eq_result" type="text" name="nacl_eq_result" readonly='readonly'></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button>送信</button>
    </form>


    <style>
        /* 検索ボックスの長さ、style.jsの中では上手く動かない */
        /* 参考URLhttps: //qiita.com/hidetzu/items/d8bda69e2a3ab198df66 */
        .ui-autocomplete {
            max-height: 200px;
            overflow-y: auto;
            overflow-x: hidden;
            padding-right: 20px;
        }

        table {
            text-align: center;
        }

        th {
            font-size: 10px;
        }

        .value {
            width: 50px;
        }

        /* .foodName {
            width: 150px;
        } */

        .search {
            width: 200px;
        }
    </style>
</body>

</html>