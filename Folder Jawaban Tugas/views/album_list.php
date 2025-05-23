<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Album List</h2>
<a href="index.php?entity=album&action=add" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Album</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Title</th>
        <th class="border p-2">Artist</th>
        <th class="border p-2">Release Year</th>
        <th class="border p-2">Genre</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($albumList as $album): ?>
    <tr>
        <td class="border p-2"><?php echo $album['title']; ?></td>
        <td class="border p-2"><?php echo $album['artist_name']; ?></td>
        <td class="border p-2"><?php echo $album['release_year']; ?></td>
        <td class="border p-2"><?php echo $album['genre']; ?></td>
        <td class="border p-2">
            <a href="index.php?entity=album&action=edit&id=<?php echo $album['id']; ?>" class="text-blue-500">Edit</a>
            <a href="index.php?entity=album&action=delete&id=<?php echo $album['id']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure? This will delete all related songs!');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
