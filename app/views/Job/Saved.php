<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: /Login");
    exit;
}

require_once '../app/config/connection.php';

$user_id = $_SESSION['user_id'];

$query = mysqli_query($conn, "
    SELECT c.id, c.title, c.image_url
    FROM saved_careers sc
    JOIN careers c ON sc.career_id = c.id
    WHERE sc.user_id = $user_id
");

$savedCareers = [];
while ($row = mysqli_fetch_assoc($query)) {
    $savedCareers[] = $row;
}

$savedCount = count($savedCareers);
$totalPages = (int) ceil($savedCount / 4);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved Careers - Talent Track</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        sage: {
                            DEFAULT: '#93A89A',
                            dark: '#7A8C80',
                            light: '#B2C6B9'
                        }
                    },
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #93A89A; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #7A8C80; }

        .career-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .career-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(0,0,0,0.12);
        }
        .career-card.selected {
            border: 2.5px solid #ef4444 !important;
        }
        .remove-badge { display: none; }
        .delete-mode .remove-badge { display: flex; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .page-fade { animation: fadeIn 0.3s ease both; }

        .dot {
            width: 10px; height: 10px;
            border-radius: 9999px;
            background: #ccc;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .dot.active {
            width: 28px;
            background: #4b5563;
        }
    </style>
</head>
<body class="bg-white font-sans text-gray-800 min-h-screen flex flex-col">

    <nav class="bg-sage text-white px-8 py-3 flex justify-between items-center sticky top-0 z-50 shadow-md">
        <div>
            <img src="/assets/Image/Logo.png" alt="Logo" class="h-8">
        </div>
        <div class="flex items-center space-x-3">
            <a href="/Profile">
                <img src="/assets/Image/userimg.png" alt="User Profile" class="w-9 h-9 rounded-full">
            </a>
        </div>
    </nav>

    <main class="flex-1 w-full max-w-7xl mx-auto px-8 py-10">

        <div class="flex justify-between items-center mb-2">
            <a href="/Home">
                <img src="/assets/Image/backarrow.png" alt="Back" class="h-10 hover:opacity-70 transition">
            </a>
            <button id="delete-toggle-btn" onclick="toggleDeleteMode()" class="hover:opacity-70 transition">
                <img src="/assets/Image/trash.png" alt="Delete" class="h-8 hover:scale-110 transition">
            </button>
        </div>

        <div class="mb-8">
            <h1 class="text-4xl font-extrabold text-black">Saved Careers</h1>
            <p class="text-gray-500 font-semibold mt-1 text-sm">
                <?php echo $savedCount; ?> career<?php echo $savedCount !== 1 ? 's' : ''; ?> saved
            </p>
        </div>

        <?php if (empty($savedCareers)): ?>
        <div class="flex flex-col items-center justify-center py-28 text-center">
            <div class="w-20 h-20 bg-sage/20 rounded-full flex items-center justify-center mb-5">
                <svg class="w-10 h-10 text-sage" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-700 mb-2">No saved careers yet</h2>
            <p class="text-gray-400 text-sm mb-6 max-w-xs">Browse careers and tap the bookmark icon to save ones you're interested in.</p>
            <a href="/Home" class="bg-sage text-white font-semibold px-6 py-3 rounded-xl hover:bg-sage-dark transition">
                Explore Careers
            </a>
        </div>

        <?php else: ?>

        <!-- Slider wrapper -->
        <div class="relative flex items-center">

            <!-- Left Arrow -->
            <button onclick="prevPage()" id="btn-prev" class="absolute -left-10 z-10 hover:opacity-70 transition">
                <img src="/assets/Image/panah.png" alt="prev" class="w-8 h-8">
            </button>

            <!-- Career Grid -->
            <div id="career-grid" class="grid grid-cols-4 gap-6 w-full delete-mode-container">
            </div>

            <!-- Right Arrow -->
            <button onclick="nextPage()" id="btn-next" class="absolute -right-10 z-10 hover:opacity-70 transition">
                <img src="/assets/Image/panah.png" alt="next" class="w-8 h-8 rotate-180">
            </button>

        </div>

        <!-- Page indicator -->
        <div class="mt-8 flex flex-col items-center gap-2">
            <p id="page-label" class="text-sm text-gray-500 font-semibold"></p>
            <div id="dots" class="flex gap-2 items-center"></div>
        </div>

        <!-- Delete action bar -->
        <div id="delete-bar" class="hidden fixed bottom-6 left-1/2 -translate-x-1/2 z-50">
            <button onclick="deleteSelected()"
                class="bg-red-500 hover:bg-red-600 text-white font-bold px-10 py-4 rounded-xl shadow-2xl transition text-base flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
                <span id="delete-bar-label">Remove Selected</span>
            </button>
        </div>

        <?php endif; ?>

    </main>

    <footer class="bg-sage pt-12 pb-6 px-8 text-center text-white flex flex-col items-center mt-auto">
        <div class="mb-6">
            <img src="/assets/Image/Logo.png" alt="Logo" class="h-10 mx-auto">
        </div>
        <div class="flex flex-wrap justify-center gap-6 text-sm font-semibold text-white mb-8">
            <a href="#" class="hover:underline">About Us</a>
            <a href="#" class="hover:underline">Services</a>
            <a href="#" class="hover:underline">Community</a>
            <a href="#" class="hover:underline">Contact Us</a>
            <a href="#" class="hover:underline">Terms Of Service</a>
        </div>
        <div class="flex space-x-6 items-center">
            <a href="https://www.instagram.com" target="_blank" class="hover:scale-110 transition">
                <img src="/assets/Image/instagram.png" alt="Instagram" class="w-8 h-8">
            </a>
            <a href="https://www.twitter.com" target="_blank" class="hover:scale-110 transition">
                <img src="/assets/Image/twitter.png" alt="Twitter" class="w-8 h-8">
            </a>
            <a href="https://www.facebook.com" target="_blank" class="hover:scale-110 transition">
                <img src="/assets/Image/facebook.png" alt="Facebook" class="w-8 h-8">
            </a>
            <a href="https://www.gmail.com" target="_blank" class="hover:scale-110 transition">
                <img src="/assets/Image/gmail.png" alt="Gmail" class="w-8 h-8">
            </a>
        </div>
    </footer>

    <script>
        const allCareers  = <?php echo json_encode($savedCareers); ?>;
        const totalPages  = <?php echo $totalPages; ?>;
        const perPage     = 4;
        let currentPage   = 0;
        let deleteMode    = false;

        function renderPage() {
            const grid  = document.getElementById('career-grid');
            const start = currentPage * perPage;
            const slice = allCareers.slice(start, start + perPage);

            grid.innerHTML = '';
            grid.className = `grid gap-6 w-full ${deleteMode ? 'delete-mode-container' : ''}`;

            grid.style.gridTemplateColumns = `repeat(4, minmax(0, 1fr))`;

            slice.forEach(career => {
                const img   = career.image_url || 'Chef.png';
                const card  = document.createElement('div');
                card.className = 'career-card rounded-2xl overflow-hidden border-2 border-transparent cursor-pointer select-none bg-white shadow-md page-fade';
                card.dataset.id = career.id;
                card.onclick = () => deleteMode ? toggleSelect(card) : (window.location.href = '/detail/' + career.id);

                card.innerHTML = `
                    <div class="relative">
                        <img src="/assets/Image/${img}"
                             alt="${career.title}"
                             class="w-full h-44 object-cover"
                             onerror="this.src='/assets/Image/Chef.png'">
                        <div class="remove-badge ${deleteMode ? 'flex' : 'hidden'} absolute top-2 right-2 bg-red-500 text-white rounded-full w-6 h-6 items-center justify-center shadow-lg">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"/>
                            </svg>
                        </div>
                        <div class="absolute top-2 left-2 bg-white/80 backdrop-blur-sm rounded-full w-8 h-8 flex items-center justify-center shadow">
                            <svg class="w-4 h-4 text-sage fill-current" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-3">
                        <p class="font-bold text-black text-sm leading-tight">${career.title}</p>
                        <a href="/detail/${career.id}"
                           onclick="event.stopPropagation()"
                           class="text-xs text-sage-dark font-semibold hover:underline mt-0.5 inline-block">
                            More Details →
                        </a>
                    </div>
                `;
                grid.appendChild(card);
            });

            // Update page label
            document.getElementById('page-label').textContent =
                `Page ${currentPage + 1} of ${totalPages}`;

            // Update dots
            const dotsEl = document.getElementById('dots');
            dotsEl.innerHTML = '';
            for (let i = 0; i < totalPages; i++) {
                const dot = document.createElement('span');
                dot.className = 'dot' + (i === currentPage ? ' active' : '');
                dot.onclick = () => goToPage(i);
                dotsEl.appendChild(dot);
            }

            // Show/hide arrows
            document.getElementById('btn-prev').style.visibility = currentPage === 0 ? 'hidden' : 'visible';
            document.getElementById('btn-next').style.visibility = currentPage === totalPages - 1 ? 'hidden' : 'visible';
        }

        function goToPage(page) {
            currentPage = page;
            renderPage();
        }

        function prevPage() {
            if (currentPage > 0) { currentPage--; renderPage(); }
        }

        function nextPage() {
            if (currentPage < totalPages - 1) { currentPage++; renderPage(); }
        }

        function toggleDeleteMode() {
            deleteMode = !deleteMode;
            renderPage();
            if (!deleteMode) {
                document.getElementById('delete-bar').classList.add('hidden');
            }
        }

        function toggleSelect(card) {
            card.classList.toggle('selected');
            updateDeleteBar();
        }

        function updateDeleteBar() {
            const selected = document.querySelectorAll('.career-card.selected');
            const bar      = document.getElementById('delete-bar');
            const label    = document.getElementById('delete-bar-label');
            if (selected.length > 0 && deleteMode) {
                bar.classList.remove('hidden');
                label.textContent = 'Remove ' + selected.length + ' Career' + (selected.length !== 1 ? 's' : '');
            } else {
                bar.classList.add('hidden');
            }
        }

        function deleteSelected() {
            const selected = document.querySelectorAll('.career-card.selected');
            const ids = Array.from(selected).map(c => parseInt(c.dataset.id));

            fetch('/unsaveCareers', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ career_ids: ids })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        }

        renderPage();
    </script>

</body>
</html>