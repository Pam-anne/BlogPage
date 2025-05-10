<?php require "views/partials/admin_head.php"; ?>
<?php require "views/partials/admin_nav.php"; ?>

<form action="create-post.php" method="POST" enctype="multipart/form-data" class="space-y-6">
  <div>
    <label class="block">Title</label>
    <input type="text" name="title" required class="w-full p-2 border rounded" />
  </div>

  <div>
    <label class="block">Excerpt</label>
    <textarea name="excerpt" rows="2" class="w-full p-2 border rounded"></textarea>
  </div>

  <div>
    <label class="block">Content</label>
    <textarea name="content" rows="6" class="w-full p-2 border rounded"></textarea>
  </div>

  <div>
    <label class="block">Category</label>
    <select name="category_id" required class="w-full p-2 border rounded">
      <?php
        // populate categories
        $categories = $db->query("SELECT id, name FROM categories")->fetchAll();
        foreach ($categories as $cat) {
            echo "<option value='{$cat['id']}'>{$cat['name']}</option>";
        }
      ?>
    </select>
  </div>

  <div>
    <label class="block">Author</label>
    <select name="author_id" required class="w-full p-2 border rounded">
      <?php
        // populate authors
        $authors = $db->query("SELECT id, name FROM authors")->fetchAll();
        foreach ($authors as $auth) {
            echo "<option value='{$auth['id']}'>{$auth['name']}</option>";
        }
      ?>
    </select>
  </div>

  <div>
    <label class="block">Publish Date</label>
    <input type="date" name="published_at" required class="w-full p-2 border rounded" />
  </div>

  <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Publish</button>
</form>


<?php require "views/partials/footer.php"; ?>





