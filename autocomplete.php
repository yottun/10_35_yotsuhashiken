<?php
include("functions.php");
// var_dump($_GET);
// exit();
// DB接続します
$pdo = connect_to_db();

$search_word = $_GET["searchword"];
$sql = "SELECT * FROM food_table WHERE foodName LIKE '%{$search_word}%'";
// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
    exit();
}

$list = [];
$words = [];

$term = (isset($_GET['term']) && is_string($_GET['term'])) ? $_GET['term'] : '';

foreach($list as $word){
    if(mb_stripos($word, $term) !== FALSE){
        $words[] = $word;
    }
}

header("Content-Type: application/json; charset=utf-8");
echo json_encode($words);