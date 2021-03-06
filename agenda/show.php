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
    $query = "SELECT * FROM contacts WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $_GET["id"]);
        $stmt->execute();
        $contact = $stmt->fetch();


} catch (PDOException $e) {
    //erro na conexão
    $error = $e->getMessage();
    echo "Erro: $error";
}

?>

<div class="container" id="contact-container">
    <?php include_once "templates/back-btn.html"?>
    <h2 id="main-title"><?=$contact['name']?></h2>
    <div class="bg-contact">
        <p class="bold">Telefone:</p>
        <p><?=$contact['phone']?></p>
        <p class="bold">Observações:</p>
        <p><?=$contact['observations']?></p>
    </div>
</div>



<?php include_once "templates/footer.php";?>