<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h1>Lista de Clientes</h1>
    <a href="create.php">Cadastrar Novo Cliente</a>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Contato</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require 'includes/db.php';

            $clientes = $collection->find();

            foreach ($clientes as $cliente) {
                echo "<tr>";
                echo "<td>" . $cliente['nome'] . "</td>";
                echo "<td>" . $cliente['contato'] . "</td>";
                echo "<td>" . $cliente['email'] . "</td>";
                echo "<td>
                    <a href='update.php?id=" . $cliente['_id'] . "'>Editar</a>
                    <a href='delete.php?id=" . $cliente['_id'] . "'>Excluir</a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>