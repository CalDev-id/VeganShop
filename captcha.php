<?php
session_start();
function acakCaptcha(){
    $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    //pastikan $pass array
    $pass = array();
        $panjangAlpha = strlen($alphabet) -2;
        for($i = 0; $i < 5; $i++){
            $n = rand(0, $panjangAlpha);
            $pass[] = $alphabet[$n];
        }

        return implode($pass);
}

$code = acakCaptcha();
$_SESSION["code"] = $code;

$wh = imagecreatetruecolor(173, 50);

$bgc = imagecolorallocate($wh, 22, 86, 165);

$fc = imagecolorallocate($wh, 223, 230, 233);

imagefill($wh, 0,0,$bgc);

imagestring($wh, 10, 50, 15, $code, $fc);

header('content-type: image/jpg');
imagejpeg($wh);
imagedestroy($wh);


// use simple_note\CaptchaController;
// require_once('CaptchaController.php');

// session_start();
// $captcha = new CaptchaController();
// $captcha_code = $captcha->generateCaptchaCode();
// $captcha->setSession('captcha_code', $captcha_code);
// $image = $captcha->createCaptchaImage($captcha_code);
// $captcha->renderCaptchaImage($image);