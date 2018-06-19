<?php

final class Register extends Page
{
    private $template;
    public $needAuth = false;

    public function show()
    {
        global $template;
        $this->template = $template;

        $this->template->assign("confirmation", false);
        $this->template->assign("partner", $_SESSION['refer'] ?? 0);
    }

    /**
     * {@inheritdoc}
     */
    public function update($data)
    {
        global $template;

        if (!$this->checkEmail($this->post['Email'])) {
            $template->message('error', 'Введите правильный Email');
            return;
        }

        if (!$this->checkPasswords($this->post['Password'], $this->post['PasswordRepeat'])) {
            $template->message('error', 'Пароли не совпадают');
            return;
        }

        $playerCEFetch = DB::SelectData('users', ['email' => $this->post['Email']]);
        $PlayerID = $playerCEFetch['id'];

        if (!empty($PlayerID)) {
            $template->message('error', 'Email уже используется другим пользователем');
            return;
        }

        $password = $this->hashPassword($this->post['Password'], $this->post['Email']);

        $cache = md5($password . $this->post['Email']);
        $playerDataInsert = [
            'email' => $this->post['Email'],
            'password' => $password,
            'name' => $this->post['fio'],
            'confirmation' => false,
            'cache' => $cache,
            'referal' => $_SESSION['refer'] ?? 1,
        ];
        $IdPlayer = DB::InsertData('users', $playerDataInsert);
        $userCEFetch = DB::SelectData('users', ['id' => $IdPlayer]);
        $userCEFetch['ip'] = $this->getRealIp();
        $_SESSION['user'] = $userCEFetch;
        header("Location: /cabinet");
    }
}