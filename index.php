<div style="display:flex;">
        <ul>
                <label>Perfil</label>
            <li>
                <a href="?pg=gerarToken">Gerar Token</a>
            </li>
            <li>
                <a href="?pg=iniciarSessao">Iniciar Sessão</a>
            </li>
            <li>
                <a href="?pg=gerarQrCode">Gerar Qr Code</a>
            </li>
            <li>
                <a href="?pg=listarSessao">Listar Sessões</a>
            </li>
            <li>
                <a href="?pg=excluirSessao">Excluir Sessões</a>
            </li>
            <li>
                <a href="?pg=checkSessao">Checkar Sessão</a>
            </li>
        </ul> 
        <ul>
                <label>Chats</label>   
            <li>
                <a href="?pg=carregarContatos">Ver contatos</a>
            </li>
            <li>
                <a href="?pg=carregarMensagens">Carregar Mensagens</a>
            </li>
        </ul>    
</div>

<?php
session_start();

if (isset($_GET["pg"])){
    switch ($_GET["pg"]){
       case "gerarToken"         : $pg = "iniciar/gerarToken.php"       ;break;
       case "iniciarSessao"      : $pg = "iniciar/iniciarSessao.php"    ;break;
       case "gerarQrCode"        : $pg = "iniciar/gerarQrCode.php"      ;break;
       case "listarSessao"       : $pg = "iniciar/listarSessao.php"     ;break;
       case "excluirSessao"      : $pg = "iniciar/excluirSessao.php"    ;break;
       case "checkSessao"        : $pg = "iniciar/checkSessao.php"      ;break;
       case "carregarContatos"   : $pg = "chat/carregarContatos.php"    ;break;
       case "carregarMensagens"  : $pg = "chat/carregarMensagens.php"   ;break;
    } 
    include($pg);
 }else{
   echo "<h1>Selecione um item no Menu para começar!</h1>";
 }

?>
