<?php
$dsn = "mysql:host=localhost; dbname=test; charset=utf8";
$username = 'root';
$password = '';
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}
    $stmt = $dbh->query("SELECT * FROM images");
    $datas = $stmt->fetchAll();

    $images = [];
    if (!empty($datas)) {
        foreach ($datas as $data) {
            $images[] = [
                'name' => $data['name']
            ];
        }
    }
?>

<h1>画像表示</h1>
<?php foreach ($images as $image) : ?>
<img src="images/<?php echo $image['name']; ?>" width="300" height="300">
<?php endforeach; ?>
<a href="upload.php">画像アップロード</a>