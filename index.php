<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles/paginas/login.css">
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

    <main class="corpo">
        <header>
            <h1>Página Principal do Professor</h1>
        </header>
        
        <main>
            <div class="mensagem">
                <p class="especial">Querido(a) <?php echo $nome_professor; ?>,</p>
                <p>Você é a chave para o sucesso e para o futuro de muitos alunos. Seu trabalho faz toda a diferença na vida de quem você ensina. Hoje, queremos que saiba que sua dedicação, paciência e esforço são grandemente apreciados. Obrigado por ser um exemplo de perseverança e paixão pela educação.</p>
                <p>Continue sendo essa inspiração para todos ao seu redor!</p>
            </div>
        </main>

        <footer>
            <p>&copy; 2024 - Agradecemos o seu trabalho e dedicação!</p>
        </footer>
    </main>
</body>
</html>