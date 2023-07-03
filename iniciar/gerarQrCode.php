
<form method="POST">
<input type="text" name="tokenQrCode" placeholder="Token">
<input type="text" name="sessaoQrCode" placeholder="Sessão">
<button type="submit" name="gerarQrCode">Gerar Qr Code</button>
</form>

<?php
if(isset($_POST['gerarQrCode'])) {
    sleep(2);
    $tokenQrCode  = $_POST['tokenQrCode'];
    $sessaoQrCode = $_POST['sessaoQrCode']; 
    $authorizationQrCode = "Authorization: Bearer " . $tokenQrCode;
    $urlQrCode = "http://localhost:21465/api/" . $sessaoQrCode . "/qrcode-session";
    $curl = curl_init();
    curl_setopt_array($curl, array (
        CURLOPT_URL => $urlQrCode ,
        CURLOPT_RETURNTRANSFER => true ,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            $authorizationQrCode
),
));
    $response = curl_exec($curl);
    curl_close($curl);
    echo '<img src="data:image/png;base64,'.base64_encode($response).'">';
    echo "<hr>";

}
?>