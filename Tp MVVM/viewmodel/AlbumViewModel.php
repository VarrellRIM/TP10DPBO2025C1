<?php
require_once 'model/Album.php';
require_once 'model/Artist.php';

class AlbumViewModel {
    private $album;
    private $artist;

    public function __construct() {
        $this->album = new Album();
        $this->artist = new Artist();
    }

    public function getAlbumList() {
        return $this->album->getAll();
    }

    public function getAlbumById($id) {
        return $this->album->getById($id);
    }

    public function getArtists() {
        return $this->artist->getAll();
    }

    public function addAlbum($title, $release_year, $genre, $artist_id) {
        return $this->album->create($title, $release_year, $genre, $artist_id);
    }

    public function updateAlbum($id, $title, $release_year, $genre, $artist_id) {
        return $this->album->update($id, $title, $release_year, $genre, $artist_id);
    }

    public function deleteAlbum($id) {
        return $this->album->delete($id);
    }
}
?>
