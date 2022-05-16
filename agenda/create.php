<?php include_once "templates/header.php";?>

<div class="container">
    <?php include_once "templates/back-btn.html"?>

    <h1 id="main-title">Adicionar contato</h1>

    <form method="post" action="config/process.php">
        <input type="hidden" name="type" value="create">
        <div class="form-group">
            <label for="name">Nome do contato</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone do contato</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="observations">Informações do contato</label>
            <textarea rows="3" class="form-control" id="observations" name="observations"></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Cadastrar</button>
    </form>
</div>

<?php include_once "templates/footer.php";?>