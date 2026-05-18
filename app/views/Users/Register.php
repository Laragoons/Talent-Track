<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Talent Track</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .left-panel {
            background: linear-gradient(135deg, #EAF4F4 0%, #6B9080 100%);
        }
        input:focus {
            outline: none;
        }
    </style>
</head>
<body class="font-sans h-screen overflow-hidden">

    <div class="flex h-full">

        <div class="left-panel w-1/2 flex flex-col justify-center items-center px-16 py-12">

            <div class="w-full max-w-sm">
                <h1 class="text-4xl font-bold text-gray-800 text-center mb-2">Hello!</h1>
                <p class="text-center text-gray-600 text-sm mb-6">Use your email or another service to<br>continue with Talent Track</p>

                <?php if (!empty($_GET['error'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 text-sm px-4 py-3 rounded-lg mb-4 text-center">
                    <?= htmlspecialchars($_GET['error']) ?>
                </div>
                <?php endif; ?>

                <?php if (!empty($_GET['success'])): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 text-sm px-4 py-3 rounded-lg mb-4 text-center">
                    <?= htmlspecialchars($_GET['success']) ?>
                </div>
                <?php endif; ?>

                <form action="/Register" method="POST">

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Username</label>
                        <input
                            type="text"
                            name="username"
                            value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
                            required
                            class="w-full bg-white/70 border border-white rounded-lg px-4 py-3 text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-[#6B9080] transition"
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                        <input
                            type="email"
                            name="email"
                            value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                            required
                            class="w-full bg-white/70 border border-white rounded-lg px-4 py-3 text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-[#6B9080] transition"
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                required
                                class="w-full bg-white/70 border border-white rounded-lg px-4 py-3 pr-12 text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-[#6B9080] transition"
                            >
                            <button type="button" onclick="togglePassword('password', 'eye1')" class="absolute right-3 top-1/2 -translate-y-1/2">
                                <img id="eye1" src="/assets/Image/eye.png" alt="Toggle" class="w-5 h-5 opacity-60 hover:opacity-100 transition">
                            </button>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Confirm Password</label>
                        <div class="relative">
                            <input
                                type="password"
                                id="confirmPassword"
                                name="confirm_password"
                                required
                                class="w-full bg-white/70 border border-white rounded-lg px-4 py-3 pr-12 text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-[#6B9080] transition"
                            >
                            <button type="button" onclick="togglePassword('confirmPassword', 'eye2')" class="absolute right-3 top-1/2 -translate-y-1/2">
                                <img id="eye2" src="/assets/Image/eye.png" alt="Toggle" class="w-5 h-5 opacity-60 hover:opacity-100 transition">
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-white text-gray-800 font-bold py-3 rounded-full shadow hover:shadow-md hover:bg-gray-50 transition mb-6">
                        Daftar
                    </button>

                </form>

                <div class="flex justify-center gap-6 mb-6">
                    <a href="https://www.google.com" target="_blank" class="hover:scale-110 transition">
                        <img src="/assets/Image/Google.png" alt="Google" class="w-10 h-10">
                    </a>
                    <a href="https://www.facebook.com" target="_blank" class="hover:scale-110 transition">
                        <img src="/assets/Image/Facebook.png" alt="Facebook" class="w-10 h-10">
                    </a>
                    <a href="https://mail.google.com" target="_blank" class="hover:scale-110 transition">
                        <img src="/assets/Image/Gmail.png" alt="Gmail" class="w-10 h-10">
                    </a>
                    <a href="https://www.github.com" target="_blank" class="hover:scale-110 transition">
                        <img src="/assets/Image/Github.png" alt="GitHub" class="w-10 h-10">
                    </a>
                </div>

                <p class="text-center text-sm text-gray-600">
                    Already have an account?
                    <a href="/Login" style="color: #5CB6FF;" class="font-bold hover:underline">Click Here</a>
                </p>
            </div>
        </div>

        <div class="w-1/2 relative overflow-hidden">
            <img src="/assets/Image/registerbanner.png" alt="Banner" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/30 flex items-center justify-center px-12">
                <h2 class="text-center font-black leading-tight" style="font-size: 80px; line-height: 1.1;">
                    <span class="text-white">Find </span><span style="color: #69E6B0;">Careers</span><br>
                    <span class="text-white">That Suit</span><br>
                    <span class="text-white">Your </span><span style="color: #69E6B0;">Talent</span><br>
                    <span class="text-white">Today!</span>
                </h2>
            </div>
        </div>

    </div>

    <script src="/js/register.js"></script>

</body>
</html>