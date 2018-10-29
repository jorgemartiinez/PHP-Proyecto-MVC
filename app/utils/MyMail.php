<?php
namespace cursophp7\app\utils;

use cursophp7\core\App;

class MyMail
{

    private $email;
    private $name;
    private $config;

    private function __construct($config)
    {
        $this->config = $config;
        $this->email = $config['username'];
        $this->name = $config['name'];
    }

    public static function load($config)
    {
        return new MyMail($config);
    }

    public function send($assumpte, $mailTo, $nameTo, $text)
    {
        $transport = (new \Swift_SmtpTransport($this->config['smtp_server'], $this->config['smtp_port'],$this->config['smtp_security']))
            ->setUsername($this->config['username'])
            ->setPassword($this->config['password']);

        $mailer = new \Swift_Mailer($transport);

        $message = (new \Swift_Message($assumpte))
            ->setFrom([$this->email => $this->name])
            ->setTo([$mailTo => $nameTo])
            ->setBody($text);

        $result = $mailer->send($message);

    }

}