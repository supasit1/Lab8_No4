<html>
<head><meta charset="utf-8"></head>
<body>
    <form>
        <input type = "text" name="key">
        <input type = "submit" value ="ค้นหา">
    </form>

    <?php
    $pdo = new PDO("mysql:host=localhost;dbname=blueshop;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE ?");
    
    if(!empty($_GET))
    {
        $value = '%'.$_GET["key"].'%';
    }
    $stmt->bindParam(1, $value);
    $stmt->execute();
    ?>
    <?php while($row = $stmt->fetch()):?>
        <img src='member_photo/<?=$row["name"]?>.jpg' width='100'><br>
        ชื่อสมาชิก:<?=$row ["name"]?><br>
        ที่อยู่:<?=$row ["address"]?><br>
        อีเมล์:<?=$row["email"]?><br>
        <hr>
    <?php endwhile;?>
</body>
</html>