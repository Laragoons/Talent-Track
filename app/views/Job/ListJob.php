<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: /Login");
    exit;
}

require_once '../app/config/connection.php';

$user_id = $_SESSION['user_id'];

$allQuery = mysqli_query($conn, "SELECT * FROM careers ORDER BY title");
$allCareers = [];
while ($row = mysqli_fetch_assoc($allQuery)) {
    $allCareers[] = $row;
}

$savedQuery = mysqli_query($conn, "SELECT career_id FROM saved_careers WHERE user_id = $user_id");
$savedIds = [];
while ($row = mysqli_fetch_assoc($savedQuery)) {
    $savedIds[] = $row['career_id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Careers - Talent Track</title>
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

        .career-row {
            transition: transform 0.3s ease;
        }
        .career-row:hover {
            transform: scale(1.01);
        }
        .fill-active { fill: currentColor !important; }

        .toast {
            position: fixed;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%) translateY(10px);
            background: #305549;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            font-size: 0.875rem;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease, transform 0.3s ease;
            z-index: 50;
        }
        .toast.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
    </style>
</head>
<body class="bg-white text-gray-800 font-sans">

    <nav class="bg-sage text-white px-8 py-3 flex justify-between items-center sticky top-0 z-50 shadow-md">
        <div>
            <img src="/assets/Image/Logo.png" alt="Logo" class="h-8">
        </div>
        <div class="flex items-center space-x-3">
            <a href="/Saved" class="border border-white text-white px-5 py-1.5 rounded-full text-sm font-semibold hover:bg-white hover:text-sage transition">
                Saved
            </a>
            <a href="/Profile">
                <img src="/assets/Image/userimg.png" alt="User Profile" class="w-9 h-9 rounded-full">
            </a>
            <a href="/logout" class="border border-white text-white px-5 py-1.5 rounded-full text-sm font-semibold hover:bg-white hover:text-sage transition">
                Logout
            </a>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto px-8 pt-10 pb-4 flex items-center gap-4">
        <a href="/Home">
            <img src="/assets/Image/backarrow.png" alt="Back" class="h-10 hover:opacity-70 transition">
        </a>
        <h1 class="text-4xl font-extrabold text-black">All Careers</h1>
    </div>
    <p class="max-w-5xl mx-auto px-8 pb-8 text-gray-500 text-sm font-medium">
        Browse every career available on Talent Track. Click the bookmark to save one.
    </p>

    <section class="max-w-5xl mx-auto px-8 pb-20">
        <div class="space-y-8">
            <?php foreach ($allCareers as $career): ?>
            <?php $isSaved = in_array($career['id'], $savedIds); ?>
            <div class="career-row flex flex-col md:flex-row bg-sage rounded-2xl overflow-hidden shadow-xl h-auto md:h-72">
                <!-- Image -->
                <div class="md:w-5/12 flex-shrink-0">
                    <img
                        src="/assets/Image/<?php echo htmlspecialchars($career['image_url'] ?? 'Chef.png'); ?>"
                        alt="<?php echo htmlspecialchars($career['title']); ?>"
                        class="w-full h-full object-cover"
                        onerror="this.src='/assets/Image/Chef.png'"
                    >
                </div>

                <div class="md:w-7/12 p-6 md:p-8 flex flex-col relative">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-3xl font-extrabold text-black tracking-tight">
                            <?php echo htmlspecialchars($career['title']); ?>
                        </h3>
                        <button
                            type="button"
                            onclick="toggleSave(this, <?php echo $career['id']; ?>)"
                            class="btn-save transition-transform hover:scale-110 active:scale-95 hover:text-yellow-600 <?php echo $isSaved ? 'text-yellow-600' : ''; ?>"
                            aria-label="Save <?php echo htmlspecialchars($career['title']); ?>">
                            <svg class="w-7 h-7 stroke-current bookmark-icon <?php echo $isSaved ? 'fill-active' : 'fill-none'; ?>" viewBox="0 0 24 24" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                            </svg>
                        </button>
                    </div>
                    <p class="text-white text-sm md:text-base leading-snug line-clamp-5">
                        <?php echo htmlspecialchars($career['description']); ?>
                    </p>
                    <div class="mt-auto flex justify-end pt-4 md:absolute md:bottom-6 md:right-6">
                        <a href="/detail/<?php echo $career['id']; ?>"
                           class="bg-sage-light text-black font-bold py-2 px-6 rounded-lg shadow-sm hover:bg-white transition duration-300">
                            More Details
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <footer class="bg-sage pt-12 pb-6 px-8 text-center text-white flex flex-col items-center">
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
                <img src="/assets/Image/Instagram.png" alt="Instagram" class="w-8 h-8">
            </a>
            <a href="https://www.twitter.com" target="_blank" class="hover:scale-110 transition">
                <img src="/assets/Image/Twitter.png" alt="Twitter" class="w-8 h-8">
            </a>
            <a href="https://www.facebook.com" target="_blank" class="hover:scale-110 transition">
                <img src="/assets/Image/Facebook.png" alt="Facebook" class="w-8 h-8">
            </a>
            <a href="https://www.gmail.com" target="_blank" class="hover:scale-110 transition">
                <img src="/assets/Image/Gmail.png" alt="Gmail" class="w-8 h-8">
            </a>
        </div>
    </footer>

    <div id="toast" class="toast"></div>

    <script>
        function showToast(message) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.classList.add('show');
            setTimeout(() => toast.classList.remove('show'), 2200);
        }

        function toggleSave(btn, careerId) {
            const svg = btn.querySelector('svg');

            fetch('/toggleSaveAjax', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ career_id: careerId })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    if (data.saved) {
                        svg.classList.add('fill-active');
                        btn.classList.add('text-yellow-600');
                        showToast('Career saved!');
                    } else {
                        svg.classList.remove('fill-active');
                        btn.classList.remove('text-yellow-600');
                        showToast('Removed from saved.');
                    }
                }
            })
            .catch(() => showToast('Something went wrong.'));
        }
    </script>

</body>
</html>