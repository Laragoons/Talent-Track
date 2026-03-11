<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Georgia&family=Trebuchet+MS&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'sage': '#7d9a8a',
                        'sage-dark': '#6b8778',
                        'sage-light': '#a8bfb3',
                        'sage-bg': '#e8f0ec',
                        'header-bg': '#2c2c2c',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- TOP LABEL: Detail Page -->
    <div class="bg-white border-b border-gray-200 px-4 py-2">
        <span class="text-gray-700 text-sm font-medium">Detail Page</span>
    </div>

    <!-- MAIN WRAPPER (the blue-bordered box from the design) -->
    <div class="border-2 border-blue-400 mx-0">

        <!-- ── NAVBAR ── -->
        <nav class="bg-header-bg text-white px-5 py-3 flex items-center justify-between">
            <span class="font-bold text-base tracking-wide">Logo</span>
            <button class="text-white">
                <!-- Cursor/arrow icon -->
                <svg width="22" height="22" viewBox="0 0 24 24" fill="white">
                    <path d="M4 4l7.07 17 2.51-7.39L21 11.07z"/>
                </svg>
            </button>
        </nav>

        <!-- ── HERO CARD ── -->
        <div class="bg-sage-bg px-4 pt-4 pb-6">
            <div class="bg-sage rounded-lg overflow-hidden flex flex-col sm:flex-row">
                <!-- Chef Image -->
                <div class="flex-shrink-0">
                    <img src="<?= htmlspecialchars($image) ?>"
                         alt="Chef"
                         class="w-full sm:w-64 h-56 sm:h-full object-cover"
                         onerror="this.src='https://images.unsplash.com/photo-1466637574441-749b8f19452f?w=400&h=300&fit=crop'">
                </div>
                <!-- Info -->
                <div class="flex-1 p-5 bg-sage text-white relative">
                    <div class="flex items-start justify-between">
                        <h1 class="text-3xl font-bold text-white mb-3"><?= htmlspecialchars($title) ?></h1>
                        <div class="flex gap-3 ml-4 mt-1">
                            <!-- Heart -->
                            <button id="btn-like" class="transition-transform hover:scale-110">
                                <svg id="heart-icon" class="w-6 h-6" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </button>
                            <!-- Bookmark -->
                            <button id="btn-save" class="transition-transform hover:scale-110">
                                <svg id="bookmark-icon" class="w-6 h-6" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <p class="text-white/90 text-sm leading-relaxed"><?= htmlspecialchars($description) ?></p>
                </div>
            </div>
        </div>

        <!-- ── SKILLS & DUTIES ── -->
        <div class="px-4 py-5 bg-white">
            <div class="flex flex-col sm:flex-row gap-0 border border-gray-400">

                <!-- Required Skills -->
                <div class="sm:w-2/5 border-r border-gray-400">
                    <div class="bg-sage-bg border-b border-gray-400 px-3 py-2">
                        <h2 class="font-bold text-sm text-gray-800">Required Skills</h2>
                    </div>
                    <div class="p-3 bg-white">
                        <ul class="space-y-1.5">
                            <?php foreach ($skills as $skill): ?>
                            <li class="flex items-start gap-2 text-xs text-gray-700 leading-snug">
                                <span class="mt-1 w-1.5 h-1.5 rounded-full bg-gray-600 flex-shrink-0"></span>
                                <?= htmlspecialchars($skill) ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Duties & Responsibilities -->
                <div class="flex-1">
                    <div class="bg-sage border-b border-gray-400 px-3 py-2">
                        <h2 class="font-bold text-sm text-white text-center">Duties &amp; Responsibilities</h2>
                    </div>
                    <div class="p-3 bg-white">
                        <ul class="space-y-2">
                            <?php foreach ($duties as $duty): ?>
                            <li class="flex items-start gap-2 text-xs text-gray-700 leading-snug">
                                <span class="mt-1 w-1.5 h-1.5 rounded-full bg-gray-600 flex-shrink-0"></span>
                                <?= htmlspecialchars($duty) ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <!-- ── SIMILAR CAREER ── -->
        <div class="bg-white px-4 pb-6">
            <h2 class="text-center text-2xl font-bold text-gray-900 mb-4">Similar Career</h2>

            <div class="grid grid-cols-3 gap-3">
                <?php foreach ($similar as $career): ?>
                <div class="career-card">
                    <!-- Title above image -->
                    <h3 class="font-bold text-lg text-gray-900 mb-2 text-left leading-tight">
                        <?= htmlspecialchars($career['title']) ?>
                    </h3>
                    <!-- Card with image + button -->
                    <div class="border border-gray-300 rounded overflow-hidden">
                        <div class="relative">
                            <img src="<?= htmlspecialchars($career['image']) ?>"
                                 alt="<?= htmlspecialchars($career['title']) ?>"
                                 class="w-full h-36 object-cover"
                                 onerror="this.src='https://images.unsplash.com/photo-1508830524289-0adcbe822b40?w=300&h=200&fit=crop'">
                            <!-- More Details button overlay at bottom -->
                            <div class="absolute bottom-0 left-0 right-0 bg-black/50 py-1.5 text-center">
                                <button class="btn-details text-white text-xs font-medium hover:text-gray-200 transition-colors"
                                        data-career="<?= htmlspecialchars($career['title']) ?>"
                                        data-desc="<?= htmlspecialchars($career['desc']) ?>">
                                    More Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- ── FOOTER ── -->
        <footer class="bg-sage text-white">
            <div class="py-6 px-4 text-center">
                <!-- Logo -->
                <div class="text-2xl font-bold text-gray-900 mb-4">Logo</div>

                <!-- Nav links -->
                <nav class="flex flex-wrap justify-center gap-x-5 gap-y-1 mb-5">
                    <?php foreach ($nav_links as $link): ?>
                    <a href="#" class="text-gray-800 hover:text-gray-900 text-xs transition-colors">
                        <?= htmlspecialchars($link) ?>
                    </a>
                    <?php endforeach; ?>
                </nav>

                <!-- Social Icons -->
                <div class="flex justify-center items-center gap-3">
                    <!-- Instagram (colorful) -->
                    <a href="#" class="hover:opacity-80 transition-opacity">
                        <div class="w-9 h-9 rounded-full overflow-hidden bg-white flex items-center justify-center">
                            <svg class="w-6 h-6" viewBox="0 0 24 24">
                                <defs>
                                    <radialGradient id="ig1" cx="30%" cy="107%" r="150%">
                                        <stop offset="0%" stop-color="#fdf497"/>
                                        <stop offset="5%" stop-color="#fdf497"/>
                                        <stop offset="45%" stop-color="#fd5949"/>
                                        <stop offset="60%" stop-color="#d6249f"/>
                                        <stop offset="90%" stop-color="#285AEB"/>
                                    </radialGradient>
                                </defs>
                                <rect width="24" height="24" rx="5" fill="url(#ig1)"/>
                                <circle cx="12" cy="12" r="4" fill="none" stroke="white" stroke-width="1.8"/>
                                <circle cx="17.5" cy="6.5" r="1.2" fill="white"/>
                            </svg>
                        </div>
                    </a>
                    <!-- X / Twitter (black) -->
                    <a href="#" class="hover:opacity-80 transition-opacity">
                        <div class="w-9 h-9 rounded-full bg-black flex items-center justify-center">
                            <svg class="w-5 h-5" fill="white" viewBox="0 0 24 24">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                        </div>
                    </a>
                    <!-- Facebook (blue) -->
                    <a href="#" class="hover:opacity-80 transition-opacity">
                        <div class="w-9 h-9 rounded-full bg-blue-600 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="white" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </div>
                    </a>
                    <!-- Email/Bird (yellow) -->
                    <a href="#" class="hover:opacity-80 transition-opacity">
                        <div class="w-9 h-9 rounded-full bg-yellow-400 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="white" viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </footer>

    </div><!-- end main wrapper -->

    <!-- ── MODAL ── -->
    <div id="modal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center p-4">
        <div id="modal-box" class="bg-white rounded-xl max-w-sm w-full p-6 shadow-2xl">
            <div class="flex justify-between items-center mb-3">
                <h3 id="modal-title" class="font-bold text-xl text-gray-800"></h3>
                <button id="modal-close" class="text-gray-400 hover:text-gray-700 text-xl leading-none">&times;</button>
            </div>
            <p id="modal-body" class="text-gray-600 text-sm leading-relaxed mb-5"></p>
            <button id="modal-cta" class="w-full bg-sage text-white py-2 rounded-lg text-sm font-semibold hover:bg-sage-dark transition-colors">
                Explore Career
            </button>
        </div>
    </div>

    <script src="public/js/main.js"></script>
</body>
</html>
