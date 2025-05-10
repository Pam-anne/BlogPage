<?php require "views/partials/admin_head.php"; ?>
<?php require "views/partials/admin_nav.php"; ?>


<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Admin Dashboard</h1>
        <div>
            <a href="/admin/posts/create" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700">
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                New Post
            </a>
        </div>
    </div>

    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="mb-4 p-4 rounded-md bg-green-50 border border-green-200">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800"><?= $_SESSION['success_message'] ?></p>
                </div>
            </div>
        </div>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm font-medium text-gray-500 truncate">Total Posts</dt>
                    
                </dl>
            </div>
        </div>
        <!-- Add more stat cards as needed -->
    </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Recent Posts</h3>
        </div>
        <ul class="divide-y divide-gray-200">
            <?php if (empty($recentPosts)): ?>
                <li class="px-4 py-4">
                    <p class="text-sm text-gray-500">No posts found. Create your first blog post!</p>
                </li>
            <?php else: ?>
                <?php foreach ($recentPosts as $post): ?>
                    <li class="px-4 py-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-md font-medium text-indigo-600"><?= htmlspecialchars($post['title']) ?></h4>
                                <p class="text-sm text-gray-500">
                                    <?= date('F j, Y', strtotime($post['created_at'])) ?>
                                </p>
                            </div>
                            <div class="flex space-x-2">
                                <a href="/admin/posts/edit/<?= $post['id'] ?>" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <a href="/admin/posts/view/<?= $post['id'] ?>" class="text-green-600 hover:text-green-900">View</a>
                                <button 
                                    class="text-red-600 hover:text-red-900" 
                                    onclick="deletePost(<?= $post['id'] ?>)">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>


<?php require "views/partials/footer.php"; ?>