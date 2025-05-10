<?php require "views/partials/head.php"; ?>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">Admin Login</h2>
  </div>
  
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <?php if (!empty($errors)): ?>
      <div class="mb-4 p-4 rounded-md bg-red-50 border border-red-200">
        <div class="flex">
          <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
            </svg>
          </div>
          <div class="ml-3">
            <h3 class="text-sm font-medium text-red-800">Please fix the following errors:</h3>
            <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
              <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <form class="space-y-6" action="" method="POST">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-900">Email address</label>
        <div class="mt-2">
          <input 
            type="email" 
            name="email" 
            id="email" 
            autocomplete="email" 
            value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" 
            required 
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
          >
        </div>
      </div>
      
      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
        </div>
        <div class="mt-2">
          <input 
            type="password" 
            name="password" 
            id="password" 
            autocomplete="current-password" 
            required 
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
          >
        </div>
      </div>
      
      <div>
        <button 
          type="submit" 
          class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
        >
          Log in
        </button>
      </div>
    </form>
  </div>
</div>

<?php require "views/partials/footer.php"; ?>