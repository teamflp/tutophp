<!DOCTYPE html>
<html lang="fr">
<head>
     <title>Apprendre à coder en php: CRUD</title>
</head>
<body>

     <?php 
     // La clause INSERT
     $sql = "INSERT INTO table_name (column1, column2) VALUES (?, ?)";
     $stmt = $conn->prepare($sql);
     $stmt->execute([$value1, $value2]);
     ?>

     <?php 
     // La clause SELECT
     $sql = "SELECT column1, column2 FROM table_name";
     $stmt = $conn->prepare($sql);
     $stmt->execute();
     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
     ?>

     <?php 
     // La clause UPDATE
     $sql = "UPDATE table_name SET column1 = ? WHERE column2 = ?";
     $stmt = $conn->prepare($sql);
     $stmt->execute([$new_value, $value]);
     ?>

     <?php 
     // La clause DELETE
     $sql = "DELETE FROM table_name WHERE column = ?";
     $stmt = $conn->prepare($sql);
     $stmt->execute([$value]);
     ?>

</body>
</html>
