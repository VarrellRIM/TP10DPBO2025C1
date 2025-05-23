<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($song) ? 'Edit Song' : 'Add New Song'; ?></h2>
<form action="index.php?entity=song&action=<?php echo isset($song) ? 'update&id='.$song['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label for="title" class="block mb-1">Title:</label>
        <input type="text" name="title" id="title" required class="w-full p-2 border rounded" 
               value="<?php echo isset($song) ? $song['title'] : ''; ?>">
    </div>
    <div>
        <label for="duration" class="block mb-1">Duration (mm:ss):</label>
        <input type="text" name="duration" id="duration" placeholder="e.g. 3:45" 
               pattern="[0-9]+:[0-5][0-9]" class="w-full p-2 border rounded" 
               value="<?php echo isset($song) ? $song['duration'] : ''; ?>">
    </div>
    <div>
        <label for="album_id" class="block mb-1">Album:</label>
        <select name="album_id" id="album_id" required class="w-full p-2 border rounded">
            <option value="">Select Album</option>
            <?php foreach ($albums as $album): ?>
                <option value="<?php echo $album['id']; ?>" <?php echo (isset($song) && $song['album_id'] == $album['id']) ? 'selected' : ''; ?>>
                    <?php echo $album['title']; ?> by <?php echo $album['artist_name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="track_number" class="block mb-1">Track Number:</label>
        <input type="number" name="track_number" id="track_number" min="1" class="w-full p-2 border rounded" 
               value="<?php echo isset($song) ? $song['track_number'] : ''; ?>">
    </div>
    <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        <a href="index.php?entity=song" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancel</a>
    </div>
</form>

<?php
require_once 'views/template/footer.php';
?>
