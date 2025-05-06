<?php
require_once 'Config/DB.php';

class Umkm
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("
    SELECT umkm.*, 
           kabkota.nama AS kabkota, 
           kategori_umkm.nama AS kategori, 
           pembina.nama AS pembina 
    FROM umkm 
    INNER JOIN kabkota ON umkm.kabkota_id = kabkota.id 
    INNER JOIN kategori_umkm ON umkm.kategori_umkm_id = kategori_umkm.id 
    INNER JOIN pembina ON umkm.pembina_id = pembina.id
");

        return $stmt->fetchAll();
    }

    public function show($id)
    {
        
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO umkm (nama,modal,pemilik,alamat,website,email,kabkota_id,rating,kategori_umkm_id,pembina_id) VALUES (?,?,?,?,?,?,?,?,?,?)");
        return $stmt->execute([$data['nama'], $data['modal'], $data['pemilik'],$data['alamat'],$data['website'],$data['email'],$data['kabkota_id'],$data['rating'],$data['kategori_umkm_id'],$data['pembina_id']]);
    }
    
    public function update($id, $data)
    {
        
        $stmt = $this->pdo->prepare("UPDATE umkm SET nama=?, modal=?,pemilik=?,alamat=?,website=?,email=?,kabkota_id=?,rating=?,kategori_umkm_id=?,pembina_id=? WHERE id = ?");
        return $stmt->execute([$data['nama'], $data['modal'], $data['pemilik'],$data['alamat'],$data['website'],$data['email'],$data['kabkota_id'],$data['rating'],$data['kategori_umkm_id'],$data['pembina_id'],$id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM umkm WHERE id = ?");  
        return $stmt->execute([$id]);
    }
}

$umkm = new Umkm($pdo);
