<?php
require_once 'config/Database.php';

class Album {
    private $conn;
    private $table = 'albums';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT a.*, art.name as artist_name 
                 FROM " . $this->table . " a 
                 JOIN artists art ON a.artist_id = art.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT a.*, art.name as artist_name 
                 FROM " . $this->table . " a 
                 JOIN artists art ON a.artist_id = art.id 
                 WHERE a.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($title, $release_year, $genre, $artist_id) {
        $query = "INSERT INTO " . $this->table . " (title, release_year, genre, artist_id) VALUES (:title, :release_year, :genre, :artist_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':release_year', $release_year);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':artist_id', $artist_id);
        return $stmt->execute();
    }

    public function update($id, $title, $release_year, $genre, $artist_id) {
        $query = "UPDATE " . $this->table . " SET title = :title, release_year = :release_year, genre = :genre, artist_id = :artist_id WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':release_year', $release_year);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':artist_id', $artist_id);
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
