<?php
require_once 'Config/DB.php';

class Users
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll();
    }

    public function login($email, $password)
    {
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }

    return false;
    }


    public function show($id)
    {
        
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO users(email,password) VALUES (?,?)");
        return $stmt->execute([$data['email'], $data['password']]);
    }
    
    public function update($id, $data)
    {
        
        $stmt = $this->pdo->prepare("UPDATE users SET email=?, password = ? WHERE id = ?");
        return $stmt->execute([$data['email'], $data['password'],$id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");  
        return $stmt->execute([$id]);
    }
}

$users = new Users($pdo);
