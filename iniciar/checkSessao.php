<form method="POST">
<input type="text" name="tokenCheck" placeholder="Token">
<input type="text" name="sessaoCheck" placeholder="Sessão">
<button type="submit" name="checkSessao">Checkar Sessão</button>
</form>

<?php
    if(isset($_POST['checkSessao'])) {
        $tokenCheck = $_POST['tokenCheck'];
        $sessaoCheck = $_POST['sessaoCheck'];
        $authorizationCheck = "Authorization: Bearer ". $tokenCheck;
        $urlCheck = "http://localhost:21465/api/". $sessaoCheck . "/check-connection-session";
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
    echo "<pre>$result</pre>";
    echo "<hr>";
    }
?>