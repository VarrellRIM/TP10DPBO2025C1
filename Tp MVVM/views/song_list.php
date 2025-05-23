<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Song List</h2>
<a href="index.php?entity=song&action=add" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Song</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Title</th>
        <th class="border p-2">Duration</th>
        <th class="border p-2">Album</th>
        <th class="border p-2">Artist</th>
        <th class="border p-2">Track #</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($songList as $song): ?>
    <tr>
        <td class="border p-2"><?php echo $song['title']; ?></td>
        <td class="border p-2"><?php echo $song['duration']; ?></td>
        <td class="border p-2"><?php echo $song['album_title']; ?></td>
        <td class="border p-2"><?php echo $song['artist_name']; ?></td>
        <td class="border p-2"><?php echo $song['track_number']; ?></td>
        <td class="border p-2">
            <a href="index.php?entity=song&action=edit&id=<?php echo $song['id']; ?>" class="text-blue-500">Edit</a>
            <a href="index.php?entity=song&action=delete&id=<?php echo $song['id']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
