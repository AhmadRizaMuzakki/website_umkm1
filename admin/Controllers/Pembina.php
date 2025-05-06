<?php
require_once 'Config/DB.php';

class Pembina
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT * FROM pembina");
        return $stmt->fetchAll();
    }

    public function show($id)
    {
        
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO pembina (nama,gender,tgl_lahir,tmp_lahir,keahlian) VALUES (?,?,?,?,?)");
        return $stmt->execute([$data['nama'], $data['gender'], $data['tgl_lahir'],$data['tmp_lahir'],$data['keahlian']]);
    }
    
    public function update($id, $data)
    {
        
        $stmt = $this->pdo->prepare("UPDATE pembina SET nama=?, gender = ?, tgl_lahir =?,tmp_lahir=?,keahlian=? WHERE id = ?");
        return $stmt->execute([$data['nama'], $data['gender'], $data['tgl_lahir'],$data['tmp_lahir'],$data['keahlian'],$id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM pembina WHERE id = ?");  
        return $stmt->execute([$id]);
    }
}

$pembina = new Pembina($pdo);
