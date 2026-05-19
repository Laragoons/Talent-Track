<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: /Login");
    exit;
}

require_once '../app/config/connection.php';

$user_id = $_SESSION['user_id'];

$userQuery = mysqli_query($conn, "SELECT * FROM users WHERE id = $user_id");
$user      = mysqli_fetch_assoc($userQuery);

$savedQuery = mysqli_query($conn, "SELECT COUNT(*) as total FROM saved_careers WHERE user_id = $user_id");
$savedRow   = mysqli_fetch_assoc($savedQuery);
$savedCount = $savedRow['total'];

$interestQuery = mysqli_query($conn, "
    SELECT i.name 
    FROM user_interests ui
    JOIN interests i ON ui.interest_id = i.id
    WHERE ui.user_id = $user_id
");
$userInterests = [];
while ($row = mysqli_fetch_assoc($interestQuery)) {
    $userInterests[] = $row['name'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Talent Track</title>
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
        .saved-link {
            transition: background 0.2s, transform 0.15s;
        }
        .saved-link:hover {
            transform: translateX(3px);
        }
    </style>
</head>
<body class="font-sans bg-white text-gray-800 h-screen overflow-hidden">

    <nav class="bg-sage text-white px-6 py-3 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <a href="/Home">
                <img src="/assets/Image/backarrow.png" alt="Back" class="h-7">
            </a>
            <span class="text-xl font-bold">Profile</span>
        </div>
        <div class="flex items-center space-x-3">
            <a href="/Profile">
                <img src="/assets/Image/userimg.png" alt="User Profile" class="w-9 h-9 rounded-full">
            </a>
        </div>
    </nav>

    <div class="flex h-[calc(100vh-56px)]">

        <div class="w-80 bg-[#CCE3DE] flex-shrink-0 p-6 overflow-y-auto flex flex-col gap-6">

            <div class="flex items-center gap-4">
                <img src="/assets/Image/userimg.png" alt="Profile" class="w-16 h-16 rounded-full object-cover border-2 border-sage">
                <div>
                    <p class="font-bold text-lg leading-tight"><?php echo htmlspecialchars($user['name']); ?></p>
                </div>
            </div>

            <div>
                <p class="font-bold text-base mb-2">Personal Info</p>
                <div class="flex items-center gap-2 text-sm text-gray-600 flex-wrap">
                    <img src="/assets/Image/tinymail.png" alt="Email" class="w-4 h-4">
                    <span>Email</span>
                    <span class="font-medium text-gray-800 break-all"><?php echo htmlspecialchars($user['email']); ?></span>
                </div>
            </div>

            <div>
                <p class="font-bold text-base mb-2">About Me</p>
                <p class="text-sm text-gray-700 leading-relaxed">
                    Saya adalah pribadi yang kreatif dan senang mengeksplorasi berbagai hal baru. Menggambar menjadi cara saya mengekspresikan ide dan imajinasi, sementara baking dan cooking adalah hobi yang membuat saya merasa rileks dan bahagia.
                </p>
            </div>

            <div>
                <p class="font-bold text-base mb-2">My Careers</p>
                <a href="/Saved" class="saved-link flex items-center justify-between bg-white rounded-xl px-4 py-3 shadow-sm border border-sage/30 hover:border-sage hover:bg-sage/5">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 bg-sage/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-sage-dark fill-current" viewBox="0 0 24 24">
                                <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-sm text-gray-800">Saved Careers</p>
                            <p class="text-xs text-gray-500 mt-0.5"><?php echo $savedCount; ?> career<?php echo $savedCount !== 1 ? 's' : ''; ?> saved</p>
                        </div>
                    </div>
                    <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

        </div>

        <div class="flex-1 p-8 overflow-y-auto relative flex flex-col items-center">

            <div class="flex justify-end w-full mb-4">
                <button id="edit-btn" class="hover:scale-110 transition">
                    <img src="/assets/Image/editing.png" alt="Edit" class="w-8 h-8">
                </button>
            </div>

            <div id="interest-grid" class="grid grid-cols-2 gap-6 w-full max-w-2xl">
            </div>
        </div>
    </div>

    <script>
        const interestsFromDB = <?php echo json_encode($userInterests); ?>;
    </script>
    <script src="/js/profile.js"></script>

</body>
</html>