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
            <form action="php/login.php" method="post" class="login caixa">
                <h2>Login</h2>
                <div class="campo">
                    <label class="nome-campo" for="usuario">Usuário:</label>
                    <input class="campo__input" type="text" name="usuario" id="usuario" placeholder="Digite o nome de usuário do cliente" required>
                </div>
        
                <div class="campo">
                    <label class="nome-campo" for="senha">Senha:</label>
                    <input class="campo__input" type="password" name="senha" id="senha" placeholder="Senha de usuario" required>
                </div>

                
                <div class="rodape" style="display: flex; gap: .4rem;">
                    <button type="submit" name="gravar" value="login">
                        Login
                    </button>
                    <a href="./signup.php">Não tenho uma conta</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>