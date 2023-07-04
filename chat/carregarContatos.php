
<form method="POST">
    <input type="text" name="tokenCont" placeholder="Token">
    <input type="text" name="sessaoCont" placeholder="Sessão">
    <button type="submit" name="carregarContatos">Carregar Contatos</button>
</form>

<?php
if(isset($_POST['carregarContatos'])) {
        $tokenCont = $_POST['tokenCont'];
        $sessaoCont = $_POST['sessaoCont'];
        $authorizationCont = "Authorization: Bearer ". $tokenCont;
        $urlCont = "http://localhost:21465/api/". $sessaoCont . "/list-chats";
        $curl = curl_init();
         curl_setopt_array($curl, array (
        CURLOPT_URL => $urlCont ,
        CURLOPT_RETURNTRANSFER => 1 ,
        CURLOPT_ENCODING => '',
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_POST => 1,
        CURLOPT_HTTPHEADER => array($authorizationCont),

));

$result = curl_exec($curl); //Recebe as informações da url
    curl_close($curl);

    $contatos = json_decode($result); //Transforma essa informação em json


    foreach ($contatos as $contato) { //pega apenas os dados informados:
        $numero = $contato->contact->formattedName;
        $nome = $contato->contact->pushname;

        echo $numero . "<br>";
        echo $nome . "<br>";
    
    echo "<hr>";
    
    }
}
?>
