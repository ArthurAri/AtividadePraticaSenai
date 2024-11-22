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
    <link rel="stylesheet" href="styles/paginas/atividades.css">
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
        <?php
            // Conexão com o banco de dados
            $conn = mysqli_connect("localhost:3306", "root", "root", "GerenciamentoEscolar");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Manipula a criação de uma turma
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_turma'])) {
                $nome_turma = mysqli_real_escape_string($conn, $_POST['nome_turma']);
                $professor_id = 1; // ID do professor, assumindo que é fixo neste exemplo.
                $turma_query = "INSERT INTO Turmas (professor_id, nome) VALUES ($professor_id, '$nome_turma')";
                if (mysqli_query($conn, $turma_query)) {
                    echo "<p>Turma criada com sucesso.</p>";
                } else {
                    echo "<p>Erro ao criar turma: " . mysqli_error($conn) . "</p>";
                }
            }

            // Manipula a criação de uma atividade
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_atividade'])) {
                $turma_id = intval($_POST['turma_id']);
                $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
                $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
                $data_entrega = mysqli_real_escape_string($conn, $_POST['data_entrega']);
                $atividade_query = "INSERT INTO Atividades (turma_id, titulo, descricao, data_entrega) VALUES ($turma_id, '$titulo', '$descricao', '$data_entrega')";
                if (mysqli_query($conn, $atividade_query)) {
                    echo "<p>Atividade criada com sucesso.</p>";
                } else {
                    echo "<p>Erro ao criar atividade: " . mysqli_error($conn) . "</p>";
                }
            }

            // Manipula a exclusão de uma atividade
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
                $delete_id = intval($_POST['delete_id']);
                $delete_query = "DELETE FROM Atividades WHERE id = $delete_id";
                if (mysqli_query($conn, $delete_query)) {
                    echo "<p>Atividade excluída com sucesso.</p>";
                } else {
                    echo "<p>Erro ao excluir atividade: " . mysqli_error($conn) . "</p>";
                }
            }

            // Verifica se uma turma foi selecionada
            $selected_turma_id = isset($_GET['turma_id']) ? intval($_GET['turma_id']) : null;

            // Consulta para listar turmas
            $turmas_query = "SELECT * FROM Turmas";
            $turmas_result = mysqli_query($conn, $turmas_query);

            // Formulário para criar uma nova turma
            echo "<h2>Criar Nova Turma</h2>";
            echo "<form method='POST'>";
            echo "<label for='nome_turma'>Nome da Turma:</label>";
            echo "<input type='text' name='nome_turma' id='nome_turma' required>";
            echo "<button type='submit' name='create_turma'>Criar Turma</button>";
            echo "</form>";

            // Formulário para selecionar uma turma
            echo "<h2>Selecione uma Turma</h2>";
            echo "<form method='GET'>";
            echo "<label for='turma_id'>Turma:</label>";
            echo "<select name='turma_id' id='turma_id' onchange='this.form.submit()'>";
            echo "<option value=''>-- Escolha uma turma --</option>";
            while ($turma = mysqli_fetch_assoc($turmas_result)) {
                $selected = ($turma['id'] == $selected_turma_id) ? "selected" : "";
                echo "<option value='" . $turma['id'] . "' $selected>" . htmlspecialchars($turma['nome']) . "</option>";
            }
            echo "</select>";
            echo "</form>";

            // Lista de atividades da turma selecionada
            if ($selected_turma_id) {
                $atividades_query = "SELECT * FROM Atividades WHERE turma_id = $selected_turma_id";
                $atividades_result = mysqli_query($conn, $atividades_query);

                echo "<h2>Atividades da Turma</h2>";
                if (mysqli_num_rows($atividades_result) > 0) {
                    echo "<table border='1'>";
                    echo "<tr><th>ID</th><th>Turma ID</th><th>Título</th><th>Descrição</th><th>Data de Entrega</th><th>Criado Em</th><th>Ações</th></tr>";

                    while ($atividade = mysqli_fetch_assoc($atividades_result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($atividade['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($atividade['turma_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($atividade['titulo']) . "</td>";
                        echo "<td>" . htmlspecialchars($atividade['descricao']) . "</td>";
                        echo "<td>" . htmlspecialchars($atividade['data_entrega']) . "</td>";
                        echo "<td>" . htmlspecialchars($atividade['criado_em']) . "</td>";
                        echo "<td>
                                <form method='POST' style='display:inline;'>
                                    <input type='hidden' name='delete_id' value='" . $atividade['id'] . "'>
                                    <button type='submit' onclick=\"return confirm('Tem certeza que deseja excluir esta atividade?');\">Excluir</button>
                                </form>
                            </td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "<p>Não há atividades para esta turma.</p>";
                }

                // Formulário para criar uma nova atividade
                echo "<h2>Criar Nova Atividade</h2>";
                echo "<form method='POST'>";
                echo "<input type='hidden' name='turma_id' value='$selected_turma_id'>";
                echo "<label for='titulo'>Título:</label>";
                echo "<input type='text' name='titulo' id='titulo' required><br>";
                echo "<label for='descricao'>Descrição:</label>";
                echo "<textarea name='descricao' id='descricao' required></textarea><br>";
                echo "<label for='data_entrega'>Data de Entrega:</label>";
                echo "<input type='date' name='data_entrega' id='data_entrega' required><br>";
                echo "<button type='submit' name='create_atividade'>Criar Atividade</button>";
                echo "</form>";
            } else {
                echo "<p>Selecione uma turma para visualizar e gerenciar atividades.</p>";
            }

            // Fecha a conexão com o banco de dados
            mysqli_close($conn);
            ?>
    </main>
</body>
</html>