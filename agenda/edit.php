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

<div class="container">
    <?php include_once "templates/back-btn.html"?>

    <h1 id="main-title">Atualizar contato</h1>

    <form method="post" action="config/process.php">
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?=$contact['id']?>">
        <div class="form-group">
            <label for="name">Atualizar nome do contato</label>
            <input type="text" class="form-control" id="name" name="name" required value="<?=$contact['name']?>">
        </div>
        <div class="form-group">
            <label for="phone">Atualizar telefone do contato</label>
            <input type="text" class="form-control" id="phone" name="phone" required value="<?=$contact['phone']?>">
        </div>
        <div class="form-group">
            <label for="observations">Atualizar informações do contato</label>
            <textarea rows="3" class="form-control" id="observations"
                name="observations"> <?=$contact['observations']?></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Salvar</button>
    </form>
</div>

<?php include_once "templates/footer.php";?>