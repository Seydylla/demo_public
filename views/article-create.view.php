<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create Article — LumenBlog</title>

  <!-- Load Tailwind CSS, your Config, and Custom CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="/views/js/tailwind.config.js"></script>
  <link rel="stylesheet" href="/views/style/custom.css">
</head>
<body class="bg-bg font-body text-ink min-h-screen p-10">

  <main class="max-w-2xl mx-auto bg-white p-8 rounded-2xl border border-mint shadow-sm">
    <h1 class="text-2xl font-bold mb-6">Create New Article</h1>

    <form action="/article/create" method="POST" class="space-y-4">
      <div>
        <label class="block text-sm font-medium mb-1">Title</label>
        <input type="text" name="title" required class="w-full border rounded-lg p-2.5" />
      </div>

      <div>
        <label class="block text-sm font-medium mb-1">Category</label>
        <input type="text" name="catagory" required class="w-full border rounded-lg p-2.5" placeholder="Travel, Tech, etc." />
      </div>

      <div>
        <label class="block text-sm font-medium mb-1">Header / Excerpt</label>
        <textarea name="header" required class="w-full border rounded-lg p-2.5" rows="3"></textarea>
      </div>

      <div class="grid grid-cols-3 gap-4">
        <div>
          <label class="block text-sm font-medium mb-1">Image Number</label>
          <input type="number" name="img" value="1" required class="w-full border rounded-lg p-2.5" />
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Read Time (min)</label>
          <input type="number" name="read_time" value="5" required class="w-full border rounded-lg p-2.5" />
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Writer ID</label>
          <input type="number" name="writer_id" value="1" required class="w-full border rounded-lg p-2.5" />
        </div>
      </div>

      <!-- Visible Button with fallback styling -->
      <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-semibold py-3 rounded-full transition cursor-pointer">
        Publish Article
      </button>
    </form>
  </main>

</body>
</html>