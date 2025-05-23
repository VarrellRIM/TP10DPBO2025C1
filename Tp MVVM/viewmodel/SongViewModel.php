<?php
require_once 'model/Song.php';
require_once 'model/Album.php';

class SongViewModel {
    private $song;
    private $album;

    public function __construct() {
        $this->song = new Song();
        $this->album = new Album();
    }

    public function getSongList() {
        return $this->song->getAll();
    }

    public function getSongById($id) {
        return $this->song->getById($id);
    }

    public function getAlbums() {
        return $this->album->getAll();
    }

    public function addSong($title, $duration, $album_id, $track_number) {
        return $this->song->create($title, $duration, $album_id, $track_number);
    }

    public function updateSong($id, $title, $duration, $album_id, $track_number) {
        return $this->song->update($id, $title, $duration, $album_id, $track_number);
    }

    public function deleteSong($id) {
        return $this->song->delete($id);
    }
}
?>
