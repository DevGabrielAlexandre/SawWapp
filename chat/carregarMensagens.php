<form method="POST">
<input type="text" name="tokenMensagens" placeholder="Token">
<input type="text" name="sessaoMensagens" placeholder="Sessão">
<input type="number" name="numero" placeholder="Número">
<button type="submit" name="carregarMensagens">Carregar mensagens</button>
</form>

<?php
    if(isset($_POST['carregarMensagens'])) {
        $tokenMensagens = $_POST['tokenMensagens'];
        $sessaoMensagens = $_POST['sessaoMensagens'];
        $numero = $_POST['numero'];
        $authorizationCheck = "Authorization: Bearer ". $tokenMensagens;
        $urlCheck = 'http://localhost:21465/api/'. $sessaoMensagens .'/all-messages-in-chat/'. $numero .'?isGroup=false&includeMe=true&includeNotifications=true';
        $curl = curl_init();
         curl_setopt_array($curl, array (
        CURLOPT_URL => $urlCheck ,
        CURLOPT_RETURNTRANSFER => true ,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            $authorizationCheck
),
));
$result = curl_exec($curl);
    curl_close($curl);

    $contatos = json_decode($result); //Transforma essa informação em json
    echo $result;



    }
?>