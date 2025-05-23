<?php
require_once 'viewmodel/ArtistViewModel.php';
require_once 'viewmodel/AlbumViewModel.php';
require_once 'viewmodel/SongViewModel.php';

// Default entity and action
$entity = isset($_GET['entity']) ? $_GET['entity'] : 'artist';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity == 'artist') {
    $viewModel = new ArtistViewModel();
    
    if ($action == 'list') {
        $artistList = $viewModel->getArtistList();
        require_once 'views/artist_list.php';
    } 
    elseif ($action == 'add') {
        require_once 'views/artist_form.php';
    } 
    elseif ($action == 'edit') {
        $artist = $viewModel->getArtistById($_GET['id']);
        require_once 'views/artist_form.php';
    } 
    elseif ($action == 'save') {
        $viewModel->addArtist($_POST['name'], $_POST['country'], $_POST['formed_year']);
        header('Location: index.php?entity=artist');
    } 
    elseif ($action == 'update') {
        $viewModel->updateArtist($_GET['id'], $_POST['name'], $_POST['country'], $_POST['formed_year']);
        header('Location: index.php?entity=artist');
    } 
    elseif ($action == 'delete') {
        $viewModel->deleteArtist($_GET['id']);
        header('Location: index.php?entity=artist');
    }
} 
elseif ($entity == 'album') {
    $viewModel = new AlbumViewModel();
    
    if ($action == 'list') {
        $albumList = $viewModel->getAlbumList();
        require_once 'views/album_list.php';
    } 
    elseif ($action == 'add') {
        $artists = $viewModel->getArtists();
        require_once 'views/album_form.php';
    } 
    elseif ($action == 'edit') {
        $album = $viewModel->getAlbumById($_GET['id']);
        $artists = $viewModel->getArtists();
        require_once 'views/album_form.php';
    } 
    elseif ($action == 'save') {
        $viewModel->addAlbum($_POST['title'], $_POST['release_year'], $_POST['genre'], $_POST['artist_id']);
        header('Location: index.php?entity=album');
    } 
    elseif ($action == 'update') {
        $viewModel->updateAlbum($_GET['id'], $_POST['title'], $_POST['release_year'], $_POST['genre'], $_POST['artist_id']);
        header('Location: index.php?entity=album');
    } 
    elseif ($action == 'delete') {
        $viewModel->deleteAlbum($_GET['id']);
        header('Location: index.php?entity=album');
    }
} 
elseif ($entity == 'song') {
    $viewModel = new SongViewModel();
    
    if ($action == 'list') {
        $songList = $viewModel->getSongList();
        require_once 'views/song_list.php';
    } 
    elseif ($action == 'add') {
        $albums = $viewModel->getAlbums();
        require_once 'views/song_form.php';
    } 
    elseif ($action == 'edit') {
        $song = $viewModel->getSongById($_GET['id']);
        $albums = $viewModel->getAlbums();
        require_once 'views/song_form.php';
    } 
    elseif ($action == 'save') {
        $viewModel->addSong($_POST['title'], $_POST['duration'], $_POST['album_id'], $_POST['track_number']);
        header('Location: index.php?entity=song');
    } 
    elseif ($action == 'update') {
        $viewModel->updateSong($_GET['id'], $_POST['title'], $_POST['duration'], $_POST['album_id'], $_POST['track_number']);
        header('Location: index.php?entity=song');
    } 
    elseif ($action == 'delete') {
        $viewModel->deleteSong($_GET['id']);
        header('Location: index.php?entity=song');
    }
}
?>
