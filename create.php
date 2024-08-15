<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h1>Cadastrar Cliente</h1>
    <form action="create.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="contato">Contato:</label>
        <input type="text" id="contato" name="contato" required><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br>

        <input type="submit" value="Cadastrar">
    </form>

    <?php
    require 'includes/db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $contato = $_POST['contato'];
        $email = $_POST['email'];

        $collection->insertOne([
            'nome' => $nome,
            'contato' => $contato,
            'email' => $email
        ]);

        echo "Cliente cadastrado com sucesso!";
    }
    ?>
</body>
</html>
