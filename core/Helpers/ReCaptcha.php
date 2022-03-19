<?php


class ReCaptcha
{
    public static function verifyCaptcha($public_key)
    {
        $recaptcha_params = [
            'secret' => App::getData("recaptcha_secret"),
            'response' => $public_key
        ];
        $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify";
        $response = curlPostRequest($recaptcha_url, $recaptcha_params);
        if (!empty($response) && $response["success"] == 1) {
            return true;
        }
        return false;
    }
}
