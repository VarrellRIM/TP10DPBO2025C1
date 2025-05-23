# Music Store Management System

This is a simple PHP web application for managing a music store's catalog, built using the MVVM (Model-View-ViewModel) architecture pattern.

## Features

- Manage Artists (Add, Edit, Delete, View)
- Manage Albums (Add, Edit, Delete, View) with relation to Artists
- Manage Songs (Add, Edit, Delete, View) with relation to Albums

## Database Structure

The application uses a MySQL database with the following tables:
- `artists` - Contains information about music artists/bands
- `albums` - Contains album information with foreign key to artists
- `songs` - Contains song information with foreign key to albums

## Project Structure

The project follows the MVVM (Model-View-ViewModel) architecture:

### Models
- `Artist.php` - Handles data operations for artists
- `Album.php` - Handles data operations for albums
- `Song.php` - Handles data operations for songs

### ViewModels
- `ArtistViewModel.php` - Connects Artist model with artist views
- `AlbumViewModel.php` - Connects Album model with album views
- `SongViewModel.php` - Connects Song model with song views

### Views
- `artist_list.php` - Displays list of all artists
- `artist_form.php` - Form for adding/editing artists
- `album_list.php` - Displays list of all albums
- `album_form.php` - Form for adding/editing albums
- `song_list.php` - Displays list of all songs
- `song_form.php` - Form for adding/editing songs

## Setup Instructions

1. Import the database schema from `database/music_store.sql`
2. Configure the database connection in `config/Database.php`
3. Place the project files in your web server directory
4. Access the application through your web browser

## MVVM Pattern Implementation

- **Models** handle data operations and database interactions
- **ViewModels** act as intermediaries between Models and Views
- **Views** present data to users and handle user interface elements
- Data binding is implemented through the connection between ViewModels and Views

## Security Features

- PDO is used for database operations
- Prepared statements are utilized to prevent SQL injection attacks
