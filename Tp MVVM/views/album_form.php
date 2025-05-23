<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($album) ? 'Edit Album' : 'Add New Album'; ?></h2>
<form action="index.php?entity=album&action=<?php echo isset($album) ? 'update&id='.$album['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label for="title" class="block mb-1">Title:</label>
        <input type="text" name="title" id="title" required class="w-full p-2 border rounded" 
               value="<?php echo isset($album) ? $album['title'] : ''; ?>">
    </div>
    <div>
        <label for="release_year" class="block mb-1">Release Year:</label>
        <input type="number" name="release_year" id="release_year" class="w-full p-2 border rounded" 
               value="<?php echo isset($album) ? $album['release_year'] : ''; ?>">
    </div>
    <div>
        <label for="genre" class="block mb-1">Genre:</label>
        <input type="text" name="genre" id="genre" class="w-full p-2 border rounded" 
               value="<?php echo isset($album) ? $album['genre'] : ''; ?>">
    </div>
    <div>
        <label for="artist_id" class="block mb-1">Artist:</label>
        <select name="artist_id" id="artist_id" required class="w-full p-2 border rounded">
            <option value="">Select Artist</option>
            <?php foreach ($artists as $artist): ?>
                <option value="<?php echo $artist['id']; ?>" <?php echo (isset($album) && $album['artist_id'] == $artist['id']) ? 'selected' : ''; ?>>
                    <?php echo $artist['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        <a href="index.php?entity=album" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancel</a>
    </div>
</form>

<?php
require_once 'views/template/footer.php';
?>
