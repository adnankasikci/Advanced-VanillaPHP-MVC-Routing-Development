<?php


class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getDB();
    }

    public function addUser($username, $email, $password)
    {
        try {
            $state = $this->db->prepare("INSERT INTO users (username, email, parola) VALUES (?, ?, ?)");
            $state->execute(["$username", "$email", "$password"]);
            return true;
        } catch (PDOException $e) {
            echo "Kullanıcı Ekleme Yapılamadı: " . $e->getMessage();
        }
    }

    public function listUser()
    {
        try {
            $state = $this->db->prepare("SELECT * FROM users");
            $state->execute();
            $listUserResult = $state->fetchAll(PDO::FETCH_ASSOC);
            return $listUserResult;
        } catch (PDOException $e) {
            echo "Kullanıcı Listelenemedi" . $e->getMessage();
            return false;
        }
    }

    public function deleteUser($userId)
    {
        try {
            $state = $this->db->prepare("DELETE FROM users WHERE id = $userId");
            $state->execute();
            return true;
        } catch (PDOException $e) {
            echo "Kullanıcı Listelenemedi" . $e->getMessage();
            return false;
        }
    }
    public function updateUser($userId, $username, $email, $parola)
    {
        try {
            $state = $this->db->prepare("UPDATE users SET username = ?, email = ?, parola = ? WHERE id = ?");
            $state->execute(["$username", "$email", "$parola", "$userId"]);
            return true;
        } catch (PDOException $e) {
            echo "Kullanıcı Güncellendi" . $e->getMessage();
            return false;
        }
    }
}
