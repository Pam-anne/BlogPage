<?php


// Get errors and old form data from session (if any)
$errors = $_SESSION['contact_errors'] ?? [];
$formData = $_SESSION['contact_form_data'] ?? [];

// Clear session data after displaying once
unset($_SESSION['contact_errors'], $_SESSION['contact_form_data']);
?>

<?php require "views/partials/head.php"; ?>
<?php require "views/partials/nav.php"; ?>

<div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
  <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
    <div class="relative left-1/2 -z-10 aspect-1155/678 w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
  </div>

  <div class="mx-auto max-w-2xl text-center">
    <h2 class="text-4xl font-semibold tracking-tight text-balance text-gray-900 sm:text-5xl">Contact Us</h2>
    <p class="mt-2 text-lg/8 text-gray-600">Have questions or want to learn more? We'd love to hear from you!</p>
  </div>

  <?php if (!empty($errors)): ?>
    <div class="mx-auto mt-6 max-w-xl bg-red-50 p-4 rounded-md">
      <ul class="text-red-700 list-disc list-inside">
        <?php foreach ($errors as $error): ?>
          <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <?php if (isset($_GET['success'])): ?>
    <div class="mx-auto mt-6 max-w-xl bg-green-50 p-4 rounded-md">
      <p class="text-green-700 text-center font-medium">Thank you for your message! We'll get back to you soon.</p>
    </div>
  <?php endif; ?>

  <form action="/contact" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20" id="contactForm">
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
      <div>
        <label for="first-name" class="block text-sm/6 font-semibold text-gray-900">First name</label>
        <div class="mt-2.5">
          <input type="text" name="first-name" id="first-name" autocomplete="given-name"
            value="<?= htmlspecialchars($formData['first-name'] ?? '') ?>"
            class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
        </div>
      </div>

      <div>
        <label for="last-name" class="block text-sm/6 font-semibold text-gray-900">Last name</label>
        <div class="mt-2.5">
          <input type="text" name="last-name" id="last-name" autocomplete="family-name"
            value="<?= htmlspecialchars($formData['last-name'] ?? '') ?>"
            class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
        </div>
      </div>

      <div class="sm:col-span-2">
        <label for="email" class="block text-sm/6 font-semibold text-gray-900">Email</label>
        <div class="mt-2.5">
          <input type="email" name="email" id="email" autocomplete="email"
            value="<?= htmlspecialchars($formData['email'] ?? '') ?>"
            class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
        </div>
      </div>

      <div class="sm:col-span-2">
        <label for="message" class="block text-sm/6 font-semibold text-gray-900">Message</label>
        <div class="mt-2.5">
          <textarea name="message" id="message" rows="4"
            class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"><?= htmlspecialchars($formData['message'] ?? '') ?></textarea>
        </div>
      </div>
    </div>

    <div class="mt-10">
      <button type="submit"
        class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        Send Message
      </button>
    </div>
  </form>
</div>

<?php require "views/partials/footer.php"; ?>
