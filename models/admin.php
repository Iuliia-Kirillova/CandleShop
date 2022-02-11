<?php
class Admin
{
    private $userModel;
    public $isAuthorized;
    public function __construct()
    {
        $this->userModel = new User();
        $this->isAuthorized = (new User())->userIsAuthorized();
    }

    public function checkAdmin()
    {
//        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
//        $userId = $this->userModel->userIsAuthorizedId();

        // Получаем информацию о текущем пользователе
        $user = $this->userModel->getUserById();

        // Если роль текущего пользователя "admin", пускаем его в админпанель
        if ($this->isAuthorized) {
            if ($user['user_login'] == 'admin') {
                return true;
            }
        }

        // Иначе завершаем работу с сообщением об закрытом доступе
//        die('Access denied foo');
    }
}