<?php
    require_once 'CLASSES/usuarios.php';
    $u = new Usuario;
?>
<html lang="pt-br">
<head>
    <meta charset = "utf-8"
    <title>Bonicar Login</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
    <div id="corpo-form-cad">
    <h1>Cadastrar</h1>
    <form method = "POST">
        <input type="text" name="nome" placeholder = "Nome Completo" maxlength="30">
        <input type="text" name="telefone" placeholder = "Telefone" maxlength="30">
        <input type="email" name="email" placeholder = "Usuário"maxlength="40">

        <input type="password" name="senha" placeholder = "Senha" maxlength="15">
        <input type="password" name="confSenha" placeholder = "Confirmar Senha" maxlength="15">

        <input type="submit" value="CADASTRAR">
    </form>
    </div>
<?php
if(isset($_POST['nome'])){
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confSenha']);

    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)){
        $u->conectar("projeto_login", "localhost", "root", "");
        if($u->msgErro == ""){
            if($senha == $confirmarSenha){
                if($u->cadastrar($nome,$telefone,$email,$senha)){
                    ?>
                    <div id = "msg-sucesso">
                        Cadastrado com Sucesso! Acesse para entrar!
                    </div>
                    <?php
                }else {
                    ?>
                    <div class = "msg-erro">
                        Email já cadastrado!
                    </div>
                    <?php
                }
            } else{
                ?>
                <div class = "msg-erro">
                    Senha e confirmar senha bão Correspondem!!
                </div>
                <?php
            }
        }else{
            ?>
            <div class="msg-error">
                <?echo "Erro: ".$u->msgErro;?>
            </div>
        <?php
        }
    }else{
        ?>
        <div class = "msg-erro">
            Preencha todos os campos!
        </div>
        <?php
    }
}
?>
</body>
</html>
