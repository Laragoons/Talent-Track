<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved Careers - Talent Track</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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

        .fill-active { fill: currentColor !important; }

        .career-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .career-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(0,0,0,0.12);
        }

        .delete-mode .career-card {
            position: relative;
        }
        .delete-mode .career-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(239,68,68,0.08);
            border-radius: 1rem;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.2s;
        }
        .delete-mode .career-card.selected::after {
            opacity: 1;
        }
        .delete-mode .career-card.selected {
            border: 2.5px solid #ef4444 !important;
        }

        .remove-badge {
            display: none;
        }
        .delete-mode .remove-badge {
            display: flex;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .career-card { animation: fadeIn 0.35s ease both; }
        .career-card:nth-child(1) { animation-delay: 0.05s; }
        .career-card:nth-child(2) { animation-delay: 0.10s; }
        .career-card:nth-child(3) { animation-delay: 0.15s; }
        .career-card:nth-child(4) { animation-delay: 0.20s; }
        .career-card:nth-child(5) { animation-delay: 0.25s; }
        .career-card:nth-child(6) { animation-delay: 0.30s; }

        .empty-state { animation: fadeIn 0.5s ease both; }
    </style>
</head>
<body class="bg-white font-sans text-gray-800 min-h-screen flex flex-col">

    <!-- Navbar -->
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

    <!-- Main Content -->
    <main class="flex-1 w-full max-w-7xl mx-auto px-8 py-10">

        <!-- Header Row -->
        <div class="flex justify-between items-center mb-2">
            <a href="/Home">
                <img src="/assets/Image/backarrow.png" alt="Back" class="h-10 hover:opacity-70 transition">
            </a>
            <button id="delete-toggle-btn" onclick="toggleDeleteMode()"
                class="flex items-center gap-2 text-sm font-semibold text-gray-600 hover:text-red-500 transition">
                <img src="/assets/Image/trash.png" alt="Delete" class="h-8 hover:scale-110 transition">
            </button>
        </div>

        <div class="flex justify-between items-end mb-8">
            <div>
                <h1 class="text-4xl font-extrabold text-black">Saved Careers</h1>
                <p id="career-count" class="text-sage-dark font-semibold mt-1 text-sm"></p>
            </div>
            <div id="delete-hint" class="hidden text-red-500 text-sm font-semibold animate-pulse">
                Select careers to remove
            </div>
        </div>

        <!-- Career Grid -->
        <div id="career-grid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Cards injected by JS -->
        </div>

        <!-- Empty State -->
        <div id="empty-state" class="hidden empty-state flex flex-col items-center justify-center py-28 text-center">
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

        <!-- Delete Action Bar -->
        <div id="delete-bar" class="hidden fixed bottom-6 left-1/2 -translate-x-1/2 z-50">
            <button onclick="deleteSelected()"
                class="bg-red-500 hover:bg-red-600 text-white font-bold px-10 py-4 rounded-xl shadow-2xl transition text-base flex items-center gap-3">
                <i class="fa-solid fa-trash-can"></i>
                <span id="delete-bar-label">Remove Selected</span>
            </button>
        </div>

    </main>

    <!-- Footer -->
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
        // ─── Data ────────────────────────────────────────────────────────────────
        // In production this would come from the backend / session.
        // For now we seed from localStorage so the bookmark toggle on other pages works.
        const ALL_CAREERS = [
            { id: 1,  title: "Chef",              img: "/assets/Image/Chef.png" },
            { id: 2,  title: "Animator",          img: "/assets/Image/Animator.png" },
            { id: 3,  title: "Athlete",           img: "/assets/Image/Athlete.png" },
            { id: 4,  title: "Programmer",        img: "/assets/Image/programmer2.png" },
            { id: 5,  title: "Sales Executive",   img: "/assets/Image/sales&executive1.png" },
            { id: 6,  title: "Designer",          img: "/assets/Image/designer1.png" },
            { id: 7,  title: "Writer",            img: "/assets/Image/writer1.png" },
            { id: 8,  title: "Lawyer",            img: "/assets/Image/lawyer1.png" },
            { id: 9,  title: "Photographer",      img: "/assets/Image/photographer1.png" },
            { id: 10, title: "Industrial Expert", img: "/assets/Image/industrialexpert1.png" },
            { id: 11, title: "Musician",          img: "/assets/Image/musician1.png" },
            { id: 12, title: "Teacher",           img: "/assets/Image/teacher1.png" },
            { id: 13, title: "Actor/Actress",     img: "/assets/Image/actoractress1.png" },
            { id: 14, title: "Journalist",        img: "/assets/Image/journalist1.png" },
            { id: 15, title: "Streamer",          img: "/assets/Image/streamer1.png" },
        ];

        // Load saved IDs from localStorage (set by bookmark buttons on other pages)
        function getSavedIds() {
            try {
                return JSON.parse(localStorage.getItem('savedCareers') || '[]');
            } catch { return []; }
        }
        function setSavedIds(ids) {
            localStorage.setItem('savedCareers', JSON.stringify(ids));
        }

        // Seed some defaults for demo if empty
        if (getSavedIds().length === 0) {
            setSavedIds([1, 2, 3, 4]);
        }

        // ─── Render ──────────────────────────────────────────────────────────────
        let deleteMode = false;

        function render() {
            const savedIds = getSavedIds();
            const grid     = document.getElementById('career-grid');
            const empty    = document.getElementById('empty-state');
            const countEl  = document.getElementById('career-count');

            grid.innerHTML = '';

            if (savedIds.length === 0) {
                empty.classList.remove('hidden');
                countEl.textContent = '';
                return;
            }

            empty.classList.add('hidden');
            countEl.textContent = savedIds.length + ' career' + (savedIds.length !== 1 ? 's' : '') + ' saved';

            savedIds.forEach(id => {
                const career = ALL_CAREERS.find(c => c.id === id);
                if (!career) return;

                const card = document.createElement('div');
                card.className = 'career-card rounded-2xl overflow-hidden border-2 border-transparent cursor-pointer select-none bg-white shadow-md';
                card.dataset.id = career.id;
                card.onclick = () => deleteMode ? toggleSelect(card) : goToDetail(career.id);

                card.innerHTML = `
                    <div class="relative">
                        <img src="${career.img}"
                             alt="${career.title}"
                             class="w-full h-44 object-cover"
                             onerror="this.src='https://placehold.co/400x300/93A89A/ffffff?text=${encodeURIComponent(career.title)}'">
                        <!-- Remove badge (delete mode only) -->
                        <div class="remove-badge absolute top-2 right-2 bg-red-500 text-white rounded-full w-6 h-6 items-center justify-center shadow-lg">
                            <i class="fa-solid fa-minus text-xs"></i>
                        </div>
                        <!-- Bookmark icon -->
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

            updateDeleteBar();
        }

        function goToDetail(id) {
            window.location.href = '/detail/' + id;
        }

        // ─── Delete Mode ─────────────────────────────────────────────────────────
        function toggleDeleteMode() {
            deleteMode = !deleteMode;
            const grid    = document.getElementById('career-grid');
            const hint    = document.getElementById('delete-hint');
            const bar     = document.getElementById('delete-bar');

            if (deleteMode) {
                grid.classList.add('delete-mode');
                hint.classList.remove('hidden');
            } else {
                grid.classList.remove('delete-mode');
                hint.classList.add('hidden');
                bar.classList.add('hidden');
                // Deselect all
                document.querySelectorAll('.career-card.selected').forEach(c => c.classList.remove('selected'));
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
            const idsToRemove = Array.from(selected).map(c => parseInt(c.dataset.id));
            const savedIds    = getSavedIds().filter(id => !idsToRemove.includes(id));
            setSavedIds(savedIds);

            // Exit delete mode and re-render
            deleteMode = false;
            document.getElementById('career-grid').classList.remove('delete-mode');
            document.getElementById('delete-hint').classList.add('hidden');
            document.getElementById('delete-bar').classList.add('hidden');
            render();
        }

        // ─── Init ─────────────────────────────────────────────────────────────────
        render();
    </script>

</body>
</html>