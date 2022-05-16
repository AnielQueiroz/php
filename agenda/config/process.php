<?php

session_start();
include_once "connection.php";


$data = $_POST;

//Modificações no banco
if (!empty($data)) {
    // print_r($data);

    if ($data["type"] === "create") {
        $name = $data["name"];
        $phone = $data["phone"];
        $observations = $data["observations"];

        $query = "INSERT INTO contacts(name, phone, observations) VALUES (:name, :phone, :observations)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observations", $observations);

        try {
            $stmt->execute();
            $_SESSION["msg"] = "Contato criado com sucesso!";

        } catch (PDOException $e) {
            //erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }

    } elseif ($data["type"] === "edit") {
        $name = $data["name"];
        $phone = $data["phone"];
        $observations = $data["observations"];
        $id = $data['id'];

        $query = "UPDATE contacts SET name = :name, phone = :phone, observations = :observations WHERE id = :id ";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observations", $observations);
        $stmt->bindParam(":id", $id);

        try {
            $stmt->execute();
            $_SESSION["msg"] = "Contato atualizado com sucesso!";

        } catch (PDOException $e) {
            //erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }
    
    }
    // redirecionar usuario após cadastro
    header("Location:../index.php");
    //Seleção de dados
} else {

    $id;

    if (!empty($_GET)) {
        $id = $_GET["id"];
    }

    // Retorna o dado de um contato
    if (!empty($id)) {
        $query = "SELECT * FROM contacts WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $contact = $stmt->fetch();

    } else {
        // Retorna o dado de todos os contatos
        $contacts = [];
        $query = "SELECT * FROM contacts";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $contacts = $stmt->fetchAll();
    }
}

// Fechar conexão
$conn = null;