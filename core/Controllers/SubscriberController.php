<?php

class SubscriberController
{
    public function subscribe()
    {
        $data = $_POST;
        if (validateForm($data)) {
            if (validateEmail($data['email'])) {
                $ex = App::getData('query_builder')->retrieve('subscribers', ['email' => $data['email']])[0];
                $token = randomKeyGen();
                $name = cleanString($data['name']);
                $email = cleanString($data['email']);
                
                if (empty($ex)) {
                    $data = [
                        'name' => $name,
                        'email' => $email,
                        'token' => $token
                    ];
                    App::getData("query_builder")->create("subscribers", $data);
                } elseif (!empty($ex) && (int) $ex['verified'] === 0) {
                    $data = [
                        'token' => $token,
                        'name' => $name,
                        'generated_at' => date('Y-m-d H:i:s', time()),
                    ];
                    
                    App::getData('query_builder')->update('subscribers', $data, ['email' => $email]);
                } else {
                    redirect("/", "?error=Email Already Subscribed!");
                }
            } else {
                redirect("/", "?error=Invalid Email Format!");
            }
        } else {
            redirect('/', "?error=Filled Required Fields to Subscribe!");
        }
        require './mail_templates.php';
        $message = $templates['subscription'];
        Mail::sendMail($email, "Verify your Subscription On Kawi Blog", $message);
        renderView('waiting_verification');
    }
    public function verifySubscriber()
    {
        $token = $_GET['token'];
        $email = $_GET['email'];
        $ex = App::getData('query_builder')->retrieve("subscribers", ['email' => $email])[0];
        if (!empty($ex)) {
            $generated_at = new DateTime($ex['generated_at']);
            $now = new DateTime('now');
            $token_age = $now->diff($generated_at);
            if ($token_age->d == 0 & $token_age->h <= 1 && $token == $ex['token']) {
                App::getData('query_builder')->update("subscribers", ['verified' => 1], ['email' => $email]);
                renderView('verified_subscription', ['ex' => $ex]);
            } elseif ((int) $ex['verified'] == 1) {
                redirect("/", "?success=Already Subscribed! Stay tuned.");
            } else {
                redirect('/', "?error=Token Expired! Please Subscribe Again.");
            }
        } else {
            redirect("/", "?error=Invalid Token! Please Subscribe Again.");
        }
        renderView('verified_subscription', ['ex' => $ex]);
    }
}
