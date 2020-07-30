<?php

try {
    $dbn = 'mysql:dbname=gsacf_d06_35;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';
    $conn = new PDO($dbn, $user, $pwd);
    $sql = "SELECT * FROM food_table";
    $stmt = $conn->query($sql);
    // 問い合わせ結果を配列に格納
    while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
        $kekka[] = array(
            "foodGroup" => $row[0],
            "foodNum" => $row[1],
            "food_id" => $row[2],
            "foodName" => $row[3],
            "refuse" => $row[4],
            "enerc_kcal" => $row[5],
            "protein" => $row[6],
            "lipid" => $row[7],
            "carbohydrate" => $row[8],
            "fibtg" => $row[9],
            "ca" => $row[10],
            "fe" => $row[11],
            "vita_rae" => $row[12],
            "vitd" => $row[13],
            "vitk" => $row[14],
            "thiahcl" => $row[15],
            "ribf" => $row[16],
            "vitc" => $row[17],
            "nacl_eq" => $row[18],
        );
    }
    echo json_encode($kekka);  // 配列などの値をJSON形式にした文字列で返す
} catch (PDOException $e) {
    echo 'ERROR:' . $e->getMessage();
    die();
}
