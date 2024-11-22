<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/paginas/login.css">
</head>
<body>
    <main class="corpo">
        <section class="entrar">
            <form action="php/cadastro.php" method="post" class="login caixa">
                <h2>Cadastro</h2>
                <div class="campo">
                    <label for="nome" class="nome-campo">Nome:</label>
                    <input class="campo__input" type="text" name="nome" placeholder="Digite o nome do cliente" required>
                </div>
                
                
                <div class="campo">
                    <label for="usuario" class="nome-campo">Usuário:</label>
                    <input class="campo__input" type="text" name="usuario"placeholder="Digite o nome de usuário do cliente" required>
                </div>

                
                <div class="campo">
                    <label for="email" class="nome-campo">Email:</label>
                    <input class="campo__input" type="email" name="email" placeholder="Digite o email do cliente" required>
                </div>

                <div class="campo">
                    <label for="senha" class="nome-campo">Senha:</label>
                    <input class="campo__input" type="password" name="senha" placeholder="Senha de usuario" required>
                </div>

                <div class="rodape" style="display: flex; gap: .4rem;">
                    <button type="submit" name="gravar" value="cadastrar">
                        Cadastrar
                    </button>
                    <a href="./signin.php">Já tenho uma conta</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>