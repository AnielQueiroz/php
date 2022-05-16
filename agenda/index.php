<?php include_once "templates/header.php";?>

<div class="container">
    <!-- checando a sessão -->
    <?php if (isset($printMsg) && $printMsg != ""): ?>
    <p id="msg"><?=$printMsg?></p>
    <?php endif;?>

    <!-- conteudo da index -->

    <h1 id="main-title">Minha Agenda</h1>
    <?php if (count($contacts) > 0): ?>
    <table class="table" id="contacts-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td class="col-id" scope="row"><?=$contact['id']?></td>
                <td scope="row"><?=$contact['name']?></td>
                <td scope="row"><?=$contact['phone']?></td>
                <td class="actions">
                    <a href="show.php?id=<?=$contact['id']?>"><i class="fas fa-eye check-icon"></i></a>
                    <a href="edit.php?id=<?=$contact['id']?>"><i class="far fa-edit edit-icon"></i></a>
                    <a href="delete.php?id=<?=$contact['id']?>" class="fas fa-times delete-icon"></i></a>
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
    <?php else: ?>
    <p id="empty-list-text">Sua agenda está vazia, <a href="create.php">adicione um contato</a>.</p>
    <?php endif;?>
</div>

<?php include_once "templates/footer.php";?>