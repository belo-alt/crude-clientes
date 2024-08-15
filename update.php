<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h1>Atualizar Cliente</h1>
    <?php
    require 'includes/db.php';
    $id = new MongoDB\BSON\ObjectId($_GET['id']);
    $cliente = $collection->findOne(['_id' => $id]);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $contato = $_POST['contato'];
        $email = $_POST['email'];

        $collection->updateOne(
            ['_id' => $id],
            ['$set' => [
                'nome' => $nome,
                'contato' => $contato,
                'email' => $email
            ]]
        );

        echo "Cliente atualizado com sucesso!";
        header("Location: index.php");
    }
    ?>
    <form action="update.php?id=<?php echo $id; ?>" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $cliente['nome']; ?>" required><br>

        <label for="contato">Contato:</label>
        <input type="text" id="contato" name="contato" value="<?php echo $cliente['contato']; ?>" required><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?php echo $cliente['email']; ?>" required><br>

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
