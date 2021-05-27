
<?php
header("Access-Control-Allow-Origin: *");
if(isset($_POST['g_recaptcha_response'])){

    $secretKey = "6LdG_90aAAAAAFqTlqJy7-EL8hbfEoZtKpQvI0ON";
    $responseKey =$_POST['g_recaptcha_response'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
    $response = file_get_contents($url);
    $json_response = json_decode($response);

    if($json_response->success){
        echo json_encode("Captcha_Ok");
    } else {
        echo json_encode("Captcha_NOk");
    }
}
/*API reCAPTCHA GOOGLE
Site Key: 6LdG_90aAAAAAIK8l1KYMSnoYv4dqBkhitVfY9Xp
Secret Key: 6LdG_90aAAAAAFqTlqJy7-EL8hbfEoZtKpQvI0ON
*/
?>