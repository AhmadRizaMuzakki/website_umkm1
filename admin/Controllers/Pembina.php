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
        
    }

    public function update($id, $data)
    {
        
    }

    public function delete($id)
    {
        
    }
}

$pembina = new Pembina($pdo);
