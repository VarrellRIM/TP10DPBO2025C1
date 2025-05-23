<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Artist List</h2>
<a href="index.php?entity=artist&action=add" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Artist</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Name</th>
        <th class="border p-2">Country</th>
        <th class="border p-2">Formed Year</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($artistList as $artist): ?>
    <tr>
        <td class="border p-2"><?php echo $artist['name']; ?></td>
        <td class="border p-2"><?php echo $artist['country']; ?></td>
        <td class="border p-2"><?php echo $artist['formed_year']; ?></td>
        <td class="border p-2">
            <a href="index.php?entity=artist&action=edit&id=<?php echo $artist['id']; ?>" class="text-blue-500">Edit</a>
            <a href="index.php?entity=artist&action=delete&id=<?php echo $artist['id']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure? This will delete all related albums and songs!');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
