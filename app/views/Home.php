<?php
$username = "Soodiesaurus";

$careers = [
    1 => [
        "title" => "Chef",
        "description" => "A chef is a professional cook who works in a restaurant or kitchen. They prepare and cook many kinds of food. A chef plans menus and chooses fresh ingredients. They make sure the food tastes delicious and looks attractive. Chefs need creativity and good cooking skills. They also work with other kitchen staff to serve food quickly.",
        "image" => "assets/Image/Chef.png",
    ],
    2 => [
        "title" => "Animator",
        "description" => "An animator is a person who creates moving images and animations. They design characters and scenes for cartoons, movies, or games. Animators use computers and special software to make pictures move. They need creativity and drawing skills. Animators also work with a team to complete animation projects. Their work makes stories more interesting and entertaining.",
        "image" => "assets/Image/Animator.png",
    ],
    3 => [
        "title" => "Athlete",
        "description" => "An athlete competes in sports at a professional or amateur level, dedicating themselves to physical training, discipline, and continuous improvement. They represent their team or country and inspire others through their performance and dedication.",
        "image" => "assets/Image/Athlete.png",
    ],
    4 => [
        "title" => "Programmer",
        "description" => "A programmer writes code to create software programs. They turn the program designs created by software developers and engineers into instructions that a computer can follow. Programmers must understand various coding languages like Python, Java, or C++. They also test their code to find and fix errors, ensuring the software runs smoothly and meets user needs.",
        "image" => "assets/Image/programmer2.png",
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Exploration System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        #carousel-left, #carousel-center, #carousel-right {
            will-change: opacity, transform;
        }

        /* Save toast */
        #save-toast {
            display: flex;
            transition: opacity 0.3s ease, transform 0.3s ease;
            opacity: 0;
            pointer-events: none;
            transform: translate(-50%, 10px);
        }
        #save-toast.show {
            opacity: 1;
            pointer-events: auto;
            transform: translate(-50%, 0);
        }
    </style>
</head>
<body class="bg-white text-gray-800 font-sans">

    <nav class="bg-sage text-white px-8 py-3 flex justify-between items-center">
        <div>
            <img src="assets/Image/Logo.png" alt="Logo" class="h-8">
        </div>
        <div class="flex items-center space-x-3">
            <a href="/Login" class="border border-white text-white px-5 py-1.5 rounded-full text-sm font-semibold hover:bg-white hover:text-sage transition">Sign In</a>
            <a href="/Register" class="border border-white text-white px-5 py-1.5 rounded-full text-sm font-semibold hover:bg-white hover:text-sage transition">Sign Up</a>
            <a href="/Profile">
                <img src="assets/Image/userimg.png" alt="User Profile" class="w-9 h-9 rounded-full">
            </a>
        </div>
    </nav>

    <section class="max-w-7xl mx-auto px-8 py-16 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <h1 class="text-5xl font-extrabold text-black">Hello, <?php echo htmlspecialchars($username); ?>!</h1>
        <p class="text-lg font-semibold text-black leading-relaxed">
            "Temukan jalur karier yang paling sesuai dengan kepribadian dan keahlianmu. Mari mulai melangkah menuju masa depan yang cerah dengan mengeksplorasi berbagai pilihan profesi yang ada di bawah ini."
        </p>
    </section>

    <section class="bg-sage py-12 px-8">
        <h2 class="text-center text-4xl font-bold text-white mb-10">These are your interest</h2>

        <div class="flex justify-center items-center relative max-w-5xl mx-auto gap-6">

            <button id="carousel-btn-left"
                class="text-black text-3xl hover:text-white transition absolute left-0 z-10 select-none">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <img id="carousel-left"   src="" alt="" class="w-64 h-64 object-cover rounded-xl transform scale-90 flex-shrink-0">
            <img id="carousel-center" src="" alt="" class="w-80 h-80 object-cover rounded-xl transform scale-105 z-10 flex-shrink-0">
            <img id="carousel-right"  src="" alt="" class="w-64 h-64 object-cover rounded-xl transform scale-90 flex-shrink-0">

            <button id="carousel-btn-right"
                class="text-black text-3xl hover:text-white transition absolute right-0 z-10 select-none">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>

        <div id="carousel-dots" class="flex justify-center mt-8 space-x-3 items-center"></div>
    </section>

    <section class="max-w-5xl mx-auto px-8 py-16">
        <h2 class="text-center text-4xl font-bold text-black mb-12">Career That Suits Your Interest</h2>

        <div class="space-y-8">
            <?php foreach($careers as $id => $career): ?>
            <div class="flex flex-col md:flex-row bg-sage rounded-2xl overflow-hidden shadow-xl h-auto md:h-72 transition-transform duration-300 hover:scale-[1.01]">
                <div class="md:w-5/12">
                    <img src="<?php echo $career['image']; ?>" alt="<?php echo $career['title']; ?>" class="w-full h-full object-cover">
                </div>
                <div class="md:w-7/12 p-6 md:p-8 flex flex-col relative">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-3xl font-extrabold text-black tracking-tight"><?php echo $career['title']; ?></h3>
                        <div class="flex space-x-4 text-2xl text-black">
                            <!-- Like button -->
                            <button class="btn-like transition-transform hover:scale-110 active:scale-95 hover:text-red-500">
                                <svg class="w-7 h-7 stroke-current fill-none" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </button>
                            <!-- Save / Bookmark button -->
                            <button
                                class="btn-save transition-transform hover:scale-110 active:scale-95 hover:text-yellow-600"
                                data-id="<?php echo $id; ?>"
                                data-title="<?php echo htmlspecialchars($career['title']); ?>"
                                aria-label="Save <?php echo htmlspecialchars($career['title']); ?>">
                                <svg class="w-7 h-7 stroke-current fill-none bookmark-icon" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <p class="text-white text-sm md:text-base leading-snug line-clamp-5">
                        <?php echo $career['description']; ?>
                    </p>
                    <div class="mt-auto flex justify-end pt-4 md:absolute md:bottom-6 md:right-6">
                        <a href="/detail/<?php echo $id; ?>" class="bg-sage-light text-black font-bold py-2 px-6 rounded-lg shadow-sm hover:bg-white transition duration-300">
                            More Details
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <div class="text-center py-6">
        <a href="/ListPekerjaan" class="text-black font-bold text-lg hover:text-red-500 transition">See more</a>
    </div>

    <footer class="bg-sage pt-12 pb-6 px-8 text-center text-white flex flex-col items-center">
        <div class="mb-6">
            <img src="assets/Image/Logo.png" alt="Logo" class="h-10 mx-auto">
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
                <img src="assets/Image/instagram.png" alt="Instagram" class="w-8 h-8">
            </a>
            <a href="https://www.twitter.com" target="_blank" class="hover:scale-110 transition">
                <img src="assets/Image/twitter.png" alt="Twitter" class="w-8 h-8">
            </a>
            <a href="https://www.facebook.com" target="_blank" class="hover:scale-110 transition">
                <img src="assets/Image/facebook.png" alt="Facebook" class="w-8 h-8">
            </a>
            <a href="https://www.gmail.com" target="_blank" class="hover:scale-110 transition">
                <img src="assets/Image/gmail.png" alt="Gmail" class="w-8 h-8">
            </a>
        </div>
    </footer>

    <!-- Save toast notification -->
    <div id="save-toast" class="fixed bottom-6 left-1/2 z-50
        bg-gray-900 text-white text-sm font-semibold px-5 py-3 rounded-xl shadow-2xl
        items-center gap-3">
        <svg class="w-5 h-5 text-yellow-400 fill-current flex-shrink-0" viewBox="0 0 24 24">
            <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
        </svg>
        <span id="save-toast-msg">Saved!</span>
        <a href="/Saved" class="ml-2 underline text-sage-light hover:text-white transition">View Saved</a>
    </div>

    <script>
        // ── Like buttons ────────────────────────────────────────────────────────
        document.querySelectorAll('.btn-like').forEach(button => {
            button.addEventListener('click', function () {
                this.querySelector('svg').classList.toggle('fill-active');
            });
        });

        // ── Save / Bookmark helpers ─────────────────────────────────────────────
        function getSaved() {
            try { return JSON.parse(localStorage.getItem('savedCareers') || '[]'); }
            catch { return []; }
        }
        function setSaved(ids) {
            localStorage.setItem('savedCareers', JSON.stringify(ids));
        }

        // ── Apply saved state on load ───────────────────────────────────────────
        function syncBookmarkButtons() {
            const saved = getSaved();
            document.querySelectorAll('.btn-save').forEach(btn => {
                const id = parseInt(btn.dataset.id);
                const icon = btn.querySelector('.bookmark-icon');
                if (saved.includes(id)) {
                    icon.classList.add('fill-active');
                    btn.classList.add('text-yellow-600');
                } else {
                    icon.classList.remove('fill-active');
                    btn.classList.remove('text-yellow-600');
                }
            });
        }

        // ── Toast ───────────────────────────────────────────────────────────────
        let toastTimer;
        function showToast(msg) {
            const toast = document.getElementById('save-toast');
            document.getElementById('save-toast-msg').textContent = msg;
            toast.classList.add('show');
            clearTimeout(toastTimer);
            toastTimer = setTimeout(() => {
                toast.classList.remove('show');
            }, 2500);
        }

        // ── Save button click ───────────────────────────────────────────────────
        document.querySelectorAll('.btn-save').forEach(btn => {
            btn.addEventListener('click', function () {
                const id    = parseInt(this.dataset.id);
                const title = this.dataset.title;
                let saved   = getSaved();
                const icon  = this.querySelector('.bookmark-icon');

                if (saved.includes(id)) {
                    // Un-save
                    saved = saved.filter(s => s !== id);
                    setSaved(saved);
                    icon.classList.remove('fill-active');
                    this.classList.remove('text-yellow-600');
                    showToast(`"${title}" removed from saved`);
                } else {
                    // Save
                    saved.push(id);
                    setSaved(saved);
                    icon.classList.add('fill-active');
                    this.classList.add('text-yellow-600');
                    showToast(`"${title}" saved!`);
                }
            });
        });

        syncBookmarkButtons();
    </script>

    <script src="/js/home.js"></script>

</body>
</html>