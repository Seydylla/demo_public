<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LumenBlog — Stories Worth Reading</title>

  <!-- Tailwind CSS via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="views/js/tailwind.config.js"></script>
  <link rel="stylesheet" href="views/style/custom.css">

  <!-- Custom CSS Styles matching index.css -->
</head>

<body class="min-h-screen bg-bg font-body text-ink">

  <!-- ================= NAVBAR ================= -->
  <?php require 'views/partials/nav.php' ?>

  <main>

    <!-- ================= BLOG GRID ================= -->
    <section id="articles" class="mx-auto max-w-7xl px-5 py-20 sm:px-8">
      <div class="flex flex-col items-start justify-between gap-6 sm:flex-row sm:items-end">
        <div>
          <p class="text-sm font-semibold uppercase tracking-widest text-brand">Latest Articles</p>
          <h2 class="font-display mt-2 text-3xl font-bold text-ink sm:text-4xl">Fresh from the blog</h2>
        </div>

        <div id="categories" class="chip-scroll flex max-w-full gap-2 overflow-x-auto pb-1">
          <!-- Categories rendering dynamically -->
        </div>
      </div>

      <div id="postGrid" class="mt-10 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Post grid items rendering dynamically -->
      </div>
    </section>

  </main>

  <?php require 'views/partials/footer.php' ?>

  <!-- ================= SCRIPTS & SYSTEM STATE ================= -->
  <script src="views/js/main.js"></script>

</body>
</html>