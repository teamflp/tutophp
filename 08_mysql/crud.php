<!DOCTYPE html>
<html lang="fr">
<head>
     <title>Apprendre à coder en php: La clause Insert</title>
</head>
<body>

     <?php 
     $sql = "INSERT INTO table_name (column1, column2) VALUES (?, ?)";
     $stmt = $conn->prepare($sql);
     $stmt->execute([$value1, $value2]);
     ?>

     <?php 
     $sql = "SELECT column1, column2 FROM table_name";
     $stmt = $conn->prepare($sql);
     $stmt->execute();
     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
     ?>

     <?php 
     $sql = "UPDATE table_name SET column1 = ? WHERE column2 = ?";
     $stmt = $conn->prepare($sql);
     $stmt->execute([$new_value, $value]);
     ?>

     <?php 
     $sql = "DELETE FROM table_name WHERE column = ?";
     $stmt = $conn->prepare($sql);
     $stmt->execute([$value]);
     ?>

</body>
</html>