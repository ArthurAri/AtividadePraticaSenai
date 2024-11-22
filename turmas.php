<?php
  $nome_professor = "Professor(a)"; // Ia fazer melhor ainda
  session_start(); 
  if ($_SESSION == null) 
        echo '<script>
        alert("Faça login para acessar essa pagina.");
            window.location.href="index.php";
        </script>';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        main {
            background-color: white;
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .especial {
            font-size: 20px;
            color: #4CAF50;
            font-weight: bold;
        }
        .mensagem {
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        footer {
            text-align: center;
            padding: 10px;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <header class="fixador">
        <div class="header">
            <h1>Escola</h1>
            <div class="menu__container">
                <input type="checkbox" class="header__menu-hamburger-botao" id="menu-hamburger-botao">
                <label class="header__menu__rotulo" for="menu-hamburger-botao">
                    <div class="icone header__icone-menu"></div>
                </label>
                <div class="header__menu-hamburger">
                    <a href="adm.html" class="header__menu-hamburger__item">Administração</a>
                </div>
            </div>
            <div class="header__menu">
                <div>
                    <div class="header__menu__botoes">
                        <a href="atividades.php" class="header__botao">
                            <h2>Atividades</h2>
                        </a>
                        <a href="professor.php" class="header__botao">
                            <h2>Professor</h2>
                        </a>
                        <a href="adm.php" class="header__botao">
                            <h2>Administração</h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header__usuario">
                <input type="checkbox" class="header__menu-usuario-botao" id="menu-usuario">
                <label href="#" class="header__usuario" for="menu-usuario">
                </label>
                <div class="header__menu-usuario">
                    bom dia
                    <button class="botao-logout">
                        Sair da conta
                        <div class="icone botao-logout__icone"></div>
                    </button>
                </div>
            </div>
            <div class="secao-conta">
                <div class="botao-logout header__botao">
                    <div class="icone botao-perfil__icone"></div>
                    <p>Perfil</p>
                </div>   
                <div class="botao-logout header__botao">
                    <div class="icone botao-logout__icone"></div>
                    <p>Sair da conta</p>
                </div>
            </div>
        </div>
    </header>
    
    <main>
        <p>As atividades aparecerão aqui</p>
        <?php
        $conn = mysqli_connect("localhost:3306", "root", "root", "bd_cadastro_arthur_lemke");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
            $delete_id = intval($_POST['delete_id']);
            $delete_query = "DELETE FROM Atividades WHERE id = $delete_id";
            if (mysqli_query($conn, $delete_query)) {
                echo "<p>Atividade excluída com sucesso.</p>";
            } else {
                echo "<p>Erro ao excluir atividade: " . mysqli_error($conn) . "</p>";
            }
        }

        $query = "SELECT * FROM Atividades";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Turma ID</th><th>Título</th><th>Descrição</th><th>Data de Entrega</th><th>Criado Em</th><th>Ações</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['turma_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['titulo']) . "</td>";
                echo "<td>" . htmlspecialchars($row['descricao']) . "</td>";
                echo "<td>" . htmlspecialchars($row['data_entrega']) . "</td>";
                echo "<td>" . htmlspecialchars($row['criado_em']) . "</td>";
                echo "<td>
                        <form method='POST' style='display:inline;'>
                            <input type='hidden' name='delete_id' value='" . $row['id'] . "'>
                            <button type='submit' onclick=\"return confirm('Tem certeza que deseja excluir esta atividade?');\">Excluir</button>
                        </form>
                    </td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>Não há atividades cadastradas.</p>";
        }

        mysqli_close($conn);
        ?>

    </main>
</body>
</html>