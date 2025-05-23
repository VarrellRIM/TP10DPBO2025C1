<?php
require_once 'config/Database.php';

class Song {
    private $conn;
    private $table = 'songs';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT s.*, a.title as album_title, art.name as artist_name 
                 FROM " . $this->table . " s 
                 JOIN albums a ON s.album_id = a.id 
                 JOIN artists art ON a.artist_id = art.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT s.*, a.title as album_title, art.name as artist_name 
                 FROM " . $this->table . " s 
                 JOIN albums a ON s.album_id = a.id 
                 JOIN artists art ON a.artist_id = art.id 
                 WHERE s.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($title, $duration, $album_id, $track_number) {
        $query = "INSERT INTO " . $this->table . " (title, duration, album_id, track_number) VALUES (:title, :duration, :album_id, :track_number)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':album_id', $album_id);
        $stmt->bindParam(':track_number', $track_number);
        return $stmt->execute();
    }

    public function update($id, $title, $duration, $album_id, $track_number) {
        $query = "UPDATE " . $this->table . " SET title = :title, duration = :duration, album_id = :album_id, track_number = :track_number WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':album_id', $album_id);
        $stmt->bindParam(':track_number', $track_number);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
