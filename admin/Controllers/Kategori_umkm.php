<?php
require_once 'Config/DB.php';

class Kategori_umkm
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT * FROM kategori_umkm");
        return $stmt->fetchAll();
    }

    public function show($id)
    {
        
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO kategori_umkm (nama) VALUES (?)");
        return $stmt->execute([$data['nama']]);
    }
    
    public function update($id, $data)
    {
        
        $stmt = $this->pdo->prepare("UPDATE kategori_umkm SET nama=? WHERE id = ?");
        return $stmt->execute([$data['nama'],$id]);
    }

    public function delete($id)
    {
        try {
            // Hapus data terkait di tabel periksa terlebih dahulu
            $stmt = $this->pdo->prepare("DELETE FROM umkm WHERE kategori_umkm_id = ?");
            $stmt->execute([$id]);
            
            // Kemudian hapus data paramedik
            $stmt = $this->pdo->prepare("DELETE FROM kategori_umkm WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            // Tangani error jika terjadi
            return false;
        }
    }
}

$kategori = new Kategori_umkm($pdo);
