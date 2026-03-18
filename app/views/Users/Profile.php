<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
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
<body class="font-sans">

    <nav class="bg-sage text-white px-8 py-3 flex justify-between items-center">
        <div class="text-xl font-bold tracking-wider">Logo</div>
        <div class="flex items-center space-x-3">
            <a href="#" class="border border-white text-white px-5 py-1.5 rounded-full text-sm font-semibold hover:bg-white hover:text-sage transition">Sign In</a>
            <a href="#" class="border border-white text-white px-5 py-1.5 rounded-full text-sm font-semibold hover:bg-white hover:text-sage transition">Sign Up</a>
            <img src="https://ui-avatars.com/api/?name=US&background=3d2f2f&color=fff" alt="User Profile" class="w-9 h-9 rounded-full">
        </div>
    </nav>

</body>
</html>