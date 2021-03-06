<?php include_once "templates/header.php";?>
<?php include_once "config/connection.php";?>
<?php

$host = "localhost";
$dbname = "agenda";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

// ativar modo de erros
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "delete FROM contacts WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $_GET["id"]);
        $stmt->execute();
        $contact = $stmt->fetch();
header('Location: http://localhost/agenda');

} catch (PDOException $e) {
    //erro na conexão
    $error = $e->getMessage();
    echo "Erro: $error";
}

?>


<?php include_once "templates/footer.php";?>