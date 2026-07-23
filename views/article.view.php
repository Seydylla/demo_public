<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($article['title']) ?> — LumenBlog</title>

  <!-- Tailwind CSS via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="views/js/tailwind.config.js"></script>
  <link rel="stylesheet" href="views/style/custom.css">
</head>

<body class="min-h-screen bg-bg font-body text-ink">

  <!-- ================= NAVBAR ================= -->
  <?php require 'views/partials/nav.php' ?>

  <main>
    <!-- ================= SINGLE ARTICLE VIEW ================= -->
    <?php 
      // Reuse your image and avatar path mapping rules from the collection view
      $imagePath = "/images/" . $article['img'];
      $avatarNumber = ($article['writer_id'] == 2) ? 2 : 1;
      $avatarPath = "/images/avatar-" . $avatarNumber . ".jpg";
    ?>

    <article class="mx-auto max-w-4xl px-5 py-12 sm:px-8 sm:py-20">
      
      <!-- Back Link & Category -->
      <div class="flex items-center gap-4 text-xs font-semibold uppercase tracking-wide">
        <a href="/articles" class="text-slate hover:text-brand transition">← Back to Articles</a>
        <span class="h-1 w-1 rounded-full bg-line"></span>
        <span class="text-brand"><?= htmlspecialchars($article['catagory']) ?></span>
      </div>

      <!-- Title & Excerpt Meta -->
      <h1 class="font-display mt-6 text-3xl font-bold leading-tight text-ink sm:text-5xl">
        <?= htmlspecialchars($article['title']) ?>
      </h1>
      
      <p class="mt-4 text-lg leading-relaxed text-ink/70 font-medium">
        <?= htmlspecialchars($article['header']) ?>
      </p>

      <!-- Author and Meta Header -->
      <div class="mt-8 flex items-center gap-3 border-b border-fog pb-6">
        <img src="<?= htmlspecialchars($avatarPath) ?>" alt="<?= htmlspecialchars($article['writer_name'] ?? 'Author') ?>" class="h-10 w-10 rounded-full object-cover" />
        <div>
          <span class="block text-sm font-semibold text-ink"><?= htmlspecialchars($article['writer_name'] ?? 'Author') ?></span>
          <div class="flex items-center gap-2 text-xs text-slate mt-0.5">
            <span><?= htmlspecialchars($article['date']) ?></span>
            <span class="h-1 w-1 rounded-full bg-line"></span>
            <span><?= htmlspecialchars($article['read_time']) ?> min read</span>
          </div>
        </div>
      </div>

      <!-- Featured Image Banner -->
      <div class="mt-8 overflow-hidden rounded-2xl border border-mint bg-white">
        <img src="<?= htmlspecialchars($imagePath) ?>" alt="<?= htmlspecialchars($article['title']) ?>" class="h-[32rem] w-full object-cover" />
      </div>

      <!-- Article Body Content Area -->
      <div class="prose max-w-none mt-10 text-base leading-loose text-ink/80 space-y-6">
        <!-- If your database adds a body/content column later, echo it here. 
             For now, this renders the main header/excerpt statement as copy. -->
        <p><?= htmlspecialchars($article['header']) ?></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
      </div>

    </article>
  </main>

  <!-- ================= FOOTER ================= -->
  <?php require 'views/partials/footer.php' ?>

  <!-- ================= SCRIPTS & SYSTEM STATE ================= -->
  <script src="views/js/main.js"></script>

</body>
</html>