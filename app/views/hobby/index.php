<?php
$username = "Username";

$careers = [
    [
        "title" => "Chef",
        "description" => "A chef is a professional cook who works in a restaurant or kitchen. They prepare and cook many kinds of food. A chef plans menus and chooses fresh ingredients. They make sure the food tastes delicious and looks attractive. Chefs need creativity and good cooking skills. They also work with other kitchen staff to serve food quickly.",
        "image" => "https://images.unsplash.com/photo-1577219491135-ce391730fb2c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
    ],
    [
        "title" => "Animator",
        "description" => "An animator is a person who creates moving images and animations. They design characters and scenes for cartoons, movies, or games. Animators use computers and special software to make pictures move. They need creativity and drawing skills. Animators also work with a team to complete animation projects. Their work makes stories more interesting and entertaining.",
        "image" => "https://images.unsplash.com/photo-1551269901-5c5e14c25df7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
    ],
    [
        "title" => "Architect",
        "description" => "An architect is a professional who designs buildings and other structures. They create plans and drawings for houses, offices, and public buildings. Architects think about safety, function, and beauty in their designs. They often use computers and design software to make building plans. Architects also work with engineers and builders during construction.",
        "image" => "https://images.unsplash.com/photo-1503387762-592deb58ef4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
    ],
    [
        "title" => "Programmer",
        "description" => "A programmer writes code to create software programs. They turn the program designs created by software developers and engineers into instructions that a computer can follow. Programmers must understand various coding languages like Python, Java, or C++. They also test their code to find and fix errors, ensuring the software runs smoothly and meets user needs.",
        "image" => "https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
    ]
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
    </style>
</head>
<body class="bg-white text-gray-800 font-sans">

    <nav class="bg-sage text-white px-8 py-3 flex justify-between items-center">
        <div class="text-xl font-bold tracking-wider">Logo</div>
        <div class="flex items-center space-x-4">
            <a href="#" class="bg-white text-sage px-4 py-1 rounded-full text-sm font-semibold hover:bg-gray-100 transition">Sign In</a>
            <a href="#" class="bg-white text-sage px-4 py-1 rounded-full text-sm font-semibold hover:bg-gray-100 transition">Sign Up</a>
            <img src="https://ui-avatars.com/api/?name=User&background=random" alt="User Profile" class="w-8 h-8 rounded-full border-2 border-white">
        </div>
    </nav>

    <section class="max-w-7xl mx-auto px-8 py-16 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <h1 class="text-5xl font-extrabold text-black">Hello, <?php echo htmlspecialchars($username); ?>!</h1>
        <p class="text-lg font-semibold text-black leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean viverra, arcu ut tempor condimentum, turpis nisi rutrum felis, et luctus erat ligula mattis elit. Ut.
        </p>
    </section>

    <section class="bg-sage py-12 px-8">
        <h2 class="text-center text-4xl font-bold text-white mb-10">These are your interest</h2>
        
        <div class="flex justify-center items-center space-x-6 relative max-w-5xl mx-auto">
            <button class="text-black text-3xl hover:text-white transition absolute left-0 z-10">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <img src="https://images.unsplash.com/photo-1561070791-2526d30994b5?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Interest 1" class="w-64 h-64 object-cover rounded-xl shadow-lg opacity-80 transform scale-90 transition duration-300">
            
            <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Interest 2" class="w-80 h-80 object-cover rounded-xl shadow-2xl transform scale-105 z-10 border-4 border-transparent">
            
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Interest 3" class="w-64 h-64 object-cover rounded-xl shadow-lg opacity-80 transform scale-90 transition duration-300">

            <button class="text-black text-3xl hover:text-white transition absolute right-0 z-10">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>

        <div class="flex justify-center mt-8 space-x-3">
            <span class="w-10 h-3 bg-gray-800 rounded-full"></span>
            <span class="w-3 h-3 bg-white rounded-full"></span>
            <span class="w-3 h-3 bg-white rounded-full"></span>
            <span class="w-3 h-3 bg-white rounded-full"></span>
        </div>
    </section>

    <section class="max-w-5xl mx-auto px-8 py-16">
        <h2 class="text-center text-4xl font-bold text-black mb-12">Career That Suits Your Interest</h2>

        <div class="space-y-8">
            <?php foreach($careers as $career): ?>
            <div class="flex flex-col md:flex-row bg-sage rounded-2xl overflow-hidden shadow-xl h-auto md:h-72">
                <div class="md:w-5/12">
                    <img src="<?php echo $career['image']; ?>" alt="<?php echo $career['title']; ?>" class="w-full h-full object-cover">
                </div>
                
                <div class="md:w-7/12 p-6 md:p-8 flex flex-col relative">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-3xl font-extrabold text-black tracking-tight"><?php echo $career['title']; ?></h3>
                        <div class="flex space-x-4 text-2xl text-black">
                            <button class="hover:text-red-500 transition"><i class="fa-regular fa-heart"></i></button>
                            <button class="hover:text-yellow-500 transition"><i class="fa-regular fa-bookmark"></i></button>
                        </div>
                    </div>
                    
                    <p class="text-white text-sm md:text-base leading-snug line-clamp-5">
                        <?php echo $career['description']; ?>
                    </p>
                    
                    <div class="mt-auto flex justify-end pt-4 md:absolute md:bottom-6 md:right-6">
                        <a href="#" class="bg-sage-light text-black font-bold py-2 px-6 rounded-lg shadow-sm hover:bg-white transition duration-300">
                            More Details
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <footer class="bg-sage pt-12 pb-6 px-8 text-center text-white flex flex-col items-center">
        <div class="text-4xl font-bold mb-6 text-black tracking-wider">Logo</div>
        
        <div class="flex flex-wrap justify-center gap-6 text-sm font-semibold text-white mb-8">
            <a href="#" class="hover:underline">About Us</a>
            <a href="#" class="hover:underline">Services</a>
            <a href="#" class="hover:underline">Community</a>
            <a href="#" class="hover:underline">Contact Us</a>
            <a href="#" class="hover:underline">Terms Of Service</a>
        </div>
        
        <div class="flex space-x-6 text-2xl">
            <a href="#" class="text-pink-500 bg-transparent rounded-full hover:scale-110 transition"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" class="text-black bg-white rounded-md p-1 hover:scale-110 transition"><i class="fa-brands fa-x-twitter text-lg"></i></a>
            <a href="#" class="text-blue-600 bg-white rounded-full hover:scale-110 transition"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" class="text-red-500 bg-white p-1 rounded-md hover:scale-110 transition"><i class="fa-solid fa-envelope text-lg"></i></a>
        </div>
    </footer>

</body>
</html>