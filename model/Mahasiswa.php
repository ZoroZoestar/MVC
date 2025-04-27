<?php
require_once 'Database.php';

class Mahasiswa {
    private $conn;
    private $table = "mahasiswa";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function create($nim, $nama, $jurusan) {
        $query = "INSERT INTO " . $this->table . " (nim, nama, jurusan) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nim, $nama, $jurusan]);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function update($id, $nim, $nama, $jurusan) {
        $query = "UPDATE " . $this->table . " SET nim = ?, nama = ?, jurusan = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nim, $nama, $jurusan, $id]);
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>
