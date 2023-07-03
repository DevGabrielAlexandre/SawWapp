<form method="POST">
<input type="text" name="secret" placeholder="Secret Key">
<input type="text" name="sessao" placeholder="Sessão">
<button type="submit" name="gerarToken">Gerar o token</button>
</form>

<?php
if(isset($_POST['gerarToken'])) {
    $secret = $_POST['secret'];
    $sessao = $_POST['sessao'];
    $url    = "http://localhost:21465/api/". $sessao . "/" . $secret . "/generate-token";
    $ch  = curl_init($url);
    $payload = json_encode( array( "sns"=> 'sns' ) );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload);    
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));    
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    $result = curl_exec($ch);
    curl_close($ch);
    echo "<pre>$result</pre>";
    echo "<hr>";
}
?>