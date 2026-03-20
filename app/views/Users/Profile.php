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
</head>
<body class="font-sans bg-white text-gray-800 h-screen overflow-hidden">

    <nav class="bg-sage text-white px-6 py-3 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <a href="/">
                <img src="/assets/Image/backarrow.png" alt="Back" class="h-7">
            </a>
            <span class="text-xl font-bold">Profile</span>
        </div>
        <div class="flex items-center space-x-3">
            <a href="/Login" class="border border-white text-white px-5 py-1.5 rounded-full text-sm font-semibold hover:bg-white hover:text-sage transition">Sign In</a>
            <a href="/Register" class="border border-white text-white px-5 py-1.5 rounded-full text-sm font-semibold hover:bg-white hover:text-sage transition">Sign Up</a>
            <a href="/Profile">
                <img src="/assets/Image/userimg.png" alt="User Profile" class="w-9 h-9 rounded-full">
            </a>
        </div>
    </nav>

    <div class="flex h-[calc(100vh-56px)]">

        <div class="w-80 bg-[#CCE3DE] flex-shrink-0 p-6 overflow-y-auto">

            <div class="flex items-center gap-4 mb-6">
                <img src="/assets/Image/userimg.png" alt="Profile" class="w-16 h-16 rounded-full object-cover border-2 border-sage">
                <div>
                    <p class="font-bold text-lg leading-tight">Daniel Agus<br>Marsudi</p>
                </div>
            </div>

            <div class="mb-4">
                <p class="font-bold text-base mb-2">Personal Info</p>
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <img src="/assets/Image/tinymail.png" alt="Email" class="w-4 h-4">
                    <span>Email</span>
                    <span class="font-medium text-gray-800">Soodiesaurus@gmail.com</span>
                </div>
            </div>

            <div>
                <p class="font-bold text-base mb-2">About Me</p>
                <p class="text-sm text-gray-700 leading-relaxed">
                    Saya adalah pribadi yang kreatif dan senang mengeksplorasi berbagai hal baru. Menggambar menjadi cara saya mengekspresikan ide dan imajinasi, sementara baking dan cooking adalah hobi yang membuat saya merasa rileks dan bahagia. Saya menikmati proses belajar, mencoba resep baru, serta berbagi hasil karya dengan orang-orang terdekat. Bagi saya, setiap detail kecil itu penting, baik dalam sebuah gambar maupun dalam sebuah hidangan. Saya percaya bahwa kreativitas dan ketekunan adalah kunci untuk terus berkembang dan menjadi versi terbaik dari diri saya.
                </p>
            </div>
        </div>

        <div class="flex-1 p-8 overflow-y-auto relative flex flex-col items-center">

            <div class="flex justify-end w-full mb-4">
                <button class="hover:scale-110 transition">
                    <img src="/assets/Image/editing.png" alt="Edit" class="w-8 h-8">
                </button>
            </div>

            <div class="grid grid-cols-2 gap-6 w-full max-w-2xl">

                <div class="flex flex-col gap-3">
                    <div class="w-full aspect-square rounded-2xl overflow-hidden">
                        <img src="/assets/Image/drawing.png" alt="Drawing" class="w-full h-full object-cover">
                    </div>
                    <p class="text-2xl font-bold">Drawing</p>
                </div>

                <div class="flex flex-col gap-3">
                    <div class="w-full aspect-square rounded-2xl overflow-hidden">
                        <img src="/assets/Image/designing.png" alt="Designing" class="w-full h-full object-cover">
                    </div>
                    <p class="text-2xl font-bold">Designing</p>
                </div>

                <div class="flex flex-col gap-3">
                    <div class="w-full aspect-square rounded-2xl overflow-hidden">
                        <img src="/assets/Image/cooking.png" alt="Cooking" class="w-full h-full object-cover">
                    </div>
                    <p class="text-2xl font-bold">Cooking</p>
                </div>

                <div class="flex flex-col gap-3">
                    <div class="w-full aspect-square rounded-2xl border-2 border-gray-200 shadow-md flex items-center justify-center cursor-pointer hover:bg-gray-50 transition">
                        <img src="/assets/Image/plus.png" alt="Add" class="w-16 h-16">
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>