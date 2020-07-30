<?php
session_start();
include('functions.php');
check_session_id();

// 送信データのチェック
// var_dump($_POST);
// exit();

// 関数ファイルの読み込み
// include('functions.php');


// 送信データ受け取り
$id = $_POST['id'];
$recipename = $_POST['recipename'];
$category = $_POST['category'];
$howto = $_POST['howto'];

if (isset($_FILES['recipe_image']) && $_FILES['recipe_image']['error'] == 0) {

  $uploadedFileName = $_FILES['recipe_image']['name'];
  $tempPathName = $_FILES['recipe_image']['tmp_name'];
  $fileDirectoryPath = 'upload/';

  $extension = pathinfo($uploadedFileName, PATHINFO_EXTENSION);
  $uniqueName = date('YmdHis') . md5(session_id()) . "." . $extension;
  $fileNameToSave = $fileDirectoryPath . $uniqueName;
  
  if (is_uploaded_file($tempPathName)) {
    if (move_uploaded_file($tempPathName, $fileNameToSave)) {
      chmod($fileNameToSave, 0644);
      $img = '<img src="' . $fileNameToSave . '" >';
    } else {
      exit('保存できませんでした');
    }
  } else {
    exit('ファイルがありません');
  }
} else {
  exit('画像が送信されていません');
}

// DB接続
$pdo = connect_to_db();

$sql = "UPDATE kadai_recipe_table SET  recipename=:recipename, category=:category, howto=:howto, recipe_image=:recipe_image WHERE id=:id";

// UPDATE文を作成&実行

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':recipename', $recipename, PDO::PARAM_STR);
$stmt->bindValue(':category', $category, PDO::PARAM_STR);
$stmt->bindValue(':howto', $howto, PDO::PARAM_STR);
$stmt->bindValue(':recipe_image', $fileNameToSave, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は一覧ページファイルに移動し，一覧ページの処理を実行する
  header("Location:recipe_read.php");
  exit();

}
