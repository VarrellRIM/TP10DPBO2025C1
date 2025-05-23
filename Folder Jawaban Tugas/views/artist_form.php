<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($artist) ? 'Edit Artist' : 'Add New Artist'; ?></h2>
<form action="index.php?entity=artist&action=<?php echo isset($artist) ? 'update&id='.$artist['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label for="name" class="block mb-1">Name:</label>
        <input type="text" name="name" id="name" required class="w-full p-2 border rounded" 
               value="<?php echo isset($artist) ? $artist['name'] : ''; ?>">
    </div>
    <div>
        <label for="country" class="block mb-1">Country:</label>
        <input type="text" name="country" id="country" class="w-full p-2 border rounded" 
               value="<?php echo isset($artist) ? $artist['country'] : ''; ?>">
    </div>
    <div>
        <label for="formed_year" class="block mb-1">Formed Year:</label>
        <input type="number" name="formed_year" id="formed_year" class="w-full p-2 border rounded" 
               value="<?php echo isset($artist) ? $artist['formed_year'] : ''; ?>">
    </div>
    <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        <a href="index.php?entity=artist" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancel</a>
    </div>
</form>

<?php
require_once 'views/template/footer.php';
?>
