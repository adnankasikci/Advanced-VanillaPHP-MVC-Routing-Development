<?php

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = model('UserModel');
    }
    public function index()
    {
        $listUserResult = $this->userModel->listUser();

        $data = [
            'title' => 'Anasayfa | Adnan Frameworks',
            'content' => 'MVC kullanarak geliştirdiğim bir framework üzerine alıp geliştirmeler yapabilirsiniz.',
            'listUserResult' => $listUserResult
        ];

        user_layout('user/user', $data);
    }

    public function add()
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $addUserResult = $this->userModel->addUser($username, $email, $password);

            if ($addUserResult) {

                $data = [
                    'title' => 'Anasayfa | Adnan Frameworks',
                    'content' => 'MVC kullanarak geliştirdiğim bir framework üzerine alıp geliştirmeler yapabilirsiniz.',
                    'username' => $username,
                    'password' => $password,
                    'email' => $email
                ];

                user_layout('user/user_add', $data);
                exit;
            } else {
                echo "Kullanıcı eklenirken bir hata oluştu.";
            }
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userId'])) {

            $userId = $_POST['userId'];

            $deleteResult = $this->userModel->deleteUser($userId);

            if ($deleteResult) {
                header("Location: /php/user/");
                exit();
            } else {
                echo "Silme işlemi başarısız oldu.";
            }
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userId'])) {
            $userId = $_POST['userId'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $updateResult = $this->userModel->updateUser($userId, $username, $email, $password);

            if ($updateResult) {
                header("Location: /php/user/");
                exit();
            } else {
                echo "Silme işlemi başarısız oldu.";
            }
        }
    }
}
