<form method="POST">
<input type="text" name="token" placeholder="Token">
<input type="text" name="sessaoStart" placeholder="Sessão">
<button type="submit" name="iniciarSessao">Iniciar Sessão</button>
</form>

<?php
if(isset($_POST['iniciarSessao'])) {
    $token = $_POST['token'];
    $sessaoStart = $_POST['sessaoStart'];
    $authorization = "Authorization: Bearer ". $token;
    $urlStart = "http://localhost:21465/api/". $sessaoStart . "/start-session";
    $ch = curl_init( $urlStart );
    $payload = json_encode( array( "sns" => 'sns' ) );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload);    
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', $authorization));    
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    $result = curl_exec($ch);
    curl_close($ch);
    echo "<pre>$result</pre>";
    echo "<hr>";
}
?>