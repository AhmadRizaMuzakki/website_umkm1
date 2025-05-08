<?php
require_once 'Config/DB.php';

class Kabkota
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT kabkota.*, provinsi.nama as provinsi_id FROM kabkota inner join provinsi on kabkota.provinsi_id = provinsi.id");
        return $stmt->fetchAll();
    }

    public function show($id)
    {
        
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO kabkota (nama,latitude,longitude,provinsi_id) VALUES (?,?,?,?)");
        return $stmt->execute([$data['nama'], $data['latitude'], $data['longitude'],$data['provinsi_id']]);
    }
    
    public function update($id, $data)
    {
        
        $stmt = $this->pdo->prepare("UPDATE kabkota SET nama=?, latitude = ?, longitude =?,provinsi_id=? WHERE id = ?");
        return $stmt->execute([$data['nama'], $data['latitude'], $data['longitude'],$data['provinsi_id'],$id]);
    }

    public function delete($id)
    {
        try {
            // Hapus data terkait di tabel periksa terlebih dahulu
            $stmt = $this->pdo->prepare("DELETE FROM umkm WHERE kabkota_id = ?");
            $stmt->execute([$id]);
            
            // Kemudian hapus data paramedik
            $stmt = $this->pdo->prepare("DELETE FROM kabkota WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            // Tangani error jika terjadi
            return false;
        }
    }
}

$kabkota = new Kabkota($pdo);
