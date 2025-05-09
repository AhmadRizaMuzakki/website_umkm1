<?php
require_once 'Config/DB.php';

class Provinsi
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT * FROM provinsi");
        return $stmt->fetchAll();
    }

    public function show($id)
    {
        
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO provinsi (nama,ibukota,latitude,longitude) VALUES (?,?,?,?)");
        return $stmt->execute([$data['nama'], $data['ibukota'], $data['latitude'], $data['longitude']]);
    }
    
    public function update($id, $data)
    {
        
        $stmt = $this->pdo->prepare("UPDATE provinsi SET nama=?, ibukota = ?, latitude = ?, longitude =? WHERE id = ?");
        return $stmt->execute([$data['nama'], $data['ibukota'], $data['latitude'], $data['longitude'],$id]);
    }

    public function delete($id)
    {
        try {
            // Hapus data terkait di tabel periksa terlebih dahulu
            $stmt = $this->pdo->prepare("DELETE FROM kabkota WHERE provinsi_id = ?");
$stmt->execute([$id]);

$stmt = $this->pdo->prepare("DELETE FROM provinsi WHERE id = ?");

            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            // Tangani error jika terjadi
            return false;
        }
    }
}

$provinsi = new Provinsi($pdo);
