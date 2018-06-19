<?php

require_once 'Setting.class.php';
require_once 'DatabaseQueries.class.php';

class Base
{
    public $group;
    public $page;
    public $action;
    public $id;
    public $user;
    public $post;
    public $get;
    public $date;
    public $year;

    final public function __construct()
    {
        @session_start();
        DB::init();

        $this->user = $_SESSION['user'] ?? null;
        $this->date = date('Y-m-d H:i:s');

        $this->get = $this->filter($_GET);
        $this->post = $this->filter($_POST);

        $this->getPageList();
        $this->init();
    }

    protected function init()
    {

    }

    /**
     * @param string[] $checkArray
     * @return string[]
     */
    public function filter($checkArray)
    {
        foreach ($checkArray as $key => $value) {
            $checkArray[$key] =
                str_replace(
                    ['\'', '"', '«', '»', '<', '>', '`', '\\', '\`'],
                    '',
                    $value
                );
        }

        return $checkArray;
    }

    /**
     * @return string
     */
    public function getRealIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * @param int $length
     * @return string
     */
    public function generatePassword($length = 8)
    {
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ1234567890';
        $numChars = strlen($chars);
        $string = '';

        for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }

        return $string;
    }

    /**
     * @param int $user_id - Кому добавляем запись в истории
     * @param string $content - Запись в истории
     * @param int $summ
     * @return string
     * @throws Exception
     */
    public function addHistory($user_id, $content, $summ)
    {
        return DB::InsertData(
            'history',
            [
                'user_id' => $user_id,
                'content' => $content,
                'summ' => $summ,
                'date' => $this->date
            ]
        );
    }

    /**
     * @param string $title
     * @param string $message
     * @param string $email
     * @return bool
     * @throws phpmailerException
     */
    public function sendEmail($title, $message, $email)
    {
        require_once Setting::$sitePatch . 'libs/phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->Host = Setting::$mailHost;
        $mail->Username = Setting::$mailUsername;
        $mail->Password = Setting::$mailPassword;

        $mail->setFrom(Setting::$mailUsername, Setting::$siteName);
        $mail->addAddress($email, $email);
        $mail->addReplyTo(Setting::$mailUsername, Setting::$siteName);

        $mail->isHTML(true);
        $mail->CharSet = 'utf-8';
        $mail->Subject = '=?utf-8?B?' . base64_encode($title) . '?=';
        $mail->Body = $message;

        return $mail->send();
    }


    public function localFilter($string)
    {
        return preg_replace('/[^a-z0-9\s]/ui', '', $string);
    }


    public function checkEmail($email)
    {
        if (preg_match('/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i', $email)) {
            return true;
        }

        return false;
    }

    public function checkNick($nick)
    {
        if (strlen($nick) > 3 && preg_match('/^[a-zA-Z0-9 ]*?$/ui', $nick)) {
            return true;
        }

        return false;
    }

    public function hashPassword($password, $email)
    {
        return md5(md5($password . 'mZ60VsYNBtv~SER2IXvN~h~zAcMI#*xA%7g55@N@usC}O') . strtolower($email));
    }

    public function checkPasswords($password, $passwordRepeat)
    {
        if (strlen($password) > 5 && $password == $passwordRepeat) {
            return true;
        }

        return false;
    }

    public function currentPageURL()
    {
        $pageURL = 'http';
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $pageURL .= 's';
        }

        $pageURL .= '://';

        if ($_SERVER['SERVER_PORT'] != '80') {
            $pageURL .= $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
        } else {
            $pageURL .= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        }

        return $pageURL;
    }

    public function getPageUrl()
    {
        if (empty($this->pageUrl)) {
            $this->pageUrl = preg_replace(
                '/![a-zA-Z0-9-]/',
                '',
                explode('?', substr($_SERVER['REQUEST_URI'], 1))[0]
            );
        }

        if (empty($this->pageUrl)) {
            $this->pageUrl = 'login';
        }

        return $this->pageUrl;
    }

    public function getPageList()
    {
        $getDataList = explode('/', $this->getPageUrl());
        $this->page = $getDataList[0] ?? null;
        $this->action = $getDataList[1] ?? null;
        $this->id = $getDataList[2] ?? null;
    }
}
