<?php
$careers = [
    1 => [
        "title"       => "Chef",
        "image"       => "/assets/Image/Chef.png",
        "description" => "Seorang Chef adalah dirigen di balik simfoni dapur profesional yang memadukan keahlian teknis kuliner tingkat tinggi dengan visi artistik yang tak terbatas. Lebih dari sekadar mengolah bahan makanan, mereka mengemban tanggung jawab krusial dalam merancang konsep menu inovatif, mengkurasi bahan baku berkualitas terbaik, serta menjaga konsistensi rasa yang menjadi identitas sebuah restoran. Dalam kesehariannya, seorang Chef harus mampu menyeimbangkan peran sebagai seorang kreator yang detail dalam estetika penyajian (plating), sekaligus sebagai pemimpin yang tangguh dalam mengelola manajemen staf, efisiensi operasional, dan standar sanitasi yang ketat.",
        "skills"      => ["Basic cooking and food preparation", "Food hygiene and safety standards", "Time management & multitasking", "Creativity in menu development", "Strong teamwork and leadership"],
        "duties"      => ["Preparing ingredients & standardized recipes", "Ensuring food quality and presentation", "Maintaining kitchen cleanliness/sanitation", "Managing stock and kitchen equipment", "Coordinating with kitchen staff (Sous Chefs)"],
        "similar"     => [2, 3, 4],
    ],
    2 => [
        "title"       => "Programmer",
        "image"       => "/assets/Image/Programmer.png",
        "description" => "A programmer writes code to create software programs. They turn designs created by developers and engineers into instructions a computer can follow. Programmers must understand coding languages like Python, Java, or C++. They test their code to find and fix errors, ensuring software runs smoothly and meets user needs.",
        "skills"      => ["Proficiency in programming languages", "Problem solving and logical thinking", "Understanding of data structures", "Version control (e.g. Git)", "Debugging and testing"],
        "duties"      => ["Writing clean and efficient code", "Debugging and fixing software issues", "Collaborating with development teams", "Reviewing code from other developers", "Documenting code and processes"],
        "similar"     => [1, 3, 4],
    ],
    3 => [
        "title"       => "Athlete",
        "image"       => "/assets/Image/Athlete.png",
        "description" => "An athlete competes in sports at a professional or amateur level, dedicating themselves to physical training, discipline, and continuous improvement. They represent their team or country and inspire others through their performance and dedication.",
        "skills"      => ["Physical fitness and endurance", "Sport-specific technical skills", "Mental resilience and focus", "Teamwork and sportsmanship", "Discipline and time management"],
        "duties"      => ["Training and conditioning regularly", "Competing in events and tournaments", "Following team strategies and game plans", "Maintaining physical and mental health", "Engaging with fans and the community"],
        "similar"     => [1, 2, 4],
    ],
    
    4 => [
        "title"       => "Architect",
        "image"       => "/assets/Image/Architect.png",
        "description" => "An architect designs buildings and structures, creating plans for houses, offices, and public buildings. They think about safety, function, and beauty in their designs, using computers and design software to develop detailed building plans.",
        "skills"      => ["Design and spatial thinking", "Proficiency in CAD software", "Knowledge of building codes", "Project management", "Communication and presentation"],
        "duties"      => ["Designing building plans and blueprints", "Consulting with clients on requirements", "Ensuring designs meet safety standards", "Coordinating with engineers and builders", "Overseeing construction progress"],
        "similar"     => [1, 2, 3],
    ],
    5 => [
        "title"       => "Teacher",
        "image"       => "/assets/Image/Teacher.png",
        "description" => "A teacher educates and inspires students by delivering lessons, assessing progress, and creating a positive learning environment. They adapt their teaching methods to suit different learning styles and help students reach their full potential.",
        "skills"      => ["Strong communication skills", "Patience and empathy", "Subject matter expertise", "Classroom management", "Lesson planning and curriculum design"],
        "duties"      => ["Preparing and delivering lessons", "Assessing and grading student work", "Communicating with parents and guardians", "Managing classroom environment", "Continuously updating teaching methods"],
        "similar"     => [1, 2, 3],
    ],
    6 => [
        "title"       => "Athlete",
        "image"       => "/assets/Image/Athlete.png",
        "description" => "An athlete competes in sports at a professional or amateur level, dedicating themselves to physical training, discipline, and continuous improvement. They represent their team or country and inspire others through their performance.",
        "skills"      => ["Physical fitness and endurance", "Sport-specific technical skills", "Mental resilience and focus", "Teamwork and sportsmanship", "Discipline and time management"],
        "duties"      => ["Training and conditioning regularly", "Competing in events and tournaments", "Following team strategies and game plans", "Maintaining physical and mental health", "Engaging with fans and the community"],
        "similar"     => [1, 2, 3],
    ],
];

if (!isset($careers[$id])) {
    header("Location: /");
    exit;
}

$career = $careers[$id];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Detail - <?php echo htmlspecialchars($career['title']); ?></title>
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
</head>
<body class="bg-white font-sans text-gray-800">

    <nav class="bg-sage text-white px-8 py-3 flex justify-between items-center">
        <div>
            <img src="/assets/Image/Logo.png" alt="Logo" class="h-8">
        </div>
        <div class="flex items-center space-x-3">
            <a href="#" class="border border-white text-white px-5 py-1.5 rounded-full text-sm font-semibold hover:bg-white hover:text-sage transition">Sign In</a>
            <a href="#" class="border border-white text-white px-5 py-1.5 rounded-full text-sm font-semibold hover:bg-white hover:text-sage transition">Sign Up</a>
            <img src="https://ui-avatars.com/api/?name=US&background=3d2f2f&color=fff" alt="User Profile" class="w-9 h-9 rounded-full">
        </div>
    </nav>

    <main class="max-w-6xl mx-auto p-6 lg:p-12">

        <section class="bg-[#789685]/30 rounded-3xl overflow-hidden flex flex-col md:flex-row mb-12 border border-[#789685]/50">
            <div class="md:w-1/2">
                <img src="<?php echo htmlspecialchars($career['image']); ?>" alt="<?php echo htmlspecialchars($career['title']); ?>" class="w-full h-full object-cover">
            </div>
            <div class="md:w-1/2 p-8 lg:p-12">
                <div class="flex justify-between items-start mb-4">
                    <h1 class="text-4xl font-bold text-gray-800"><?php echo htmlspecialchars($career['title']); ?></h1>
                    <div class="flex gap-4">
                        <button class="btn-interact transition-transform hover:scale-110 active:scale-95 hover:text-red-500">
                            <svg class="w-7 h-7 stroke-current fill-none" viewBox="0 0 24 24" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </button>
                        <button class="btn-interact transition-transform hover:scale-110 active:scale-95 hover:text-yellow-600">
                            <svg class="w-7 h-7 stroke-current fill-none" viewBox="0 0 24 24" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <p class="text-gray-700 leading-relaxed text-sm lg:text-base">
                    <?php echo htmlspecialchars($career['description']); ?>
                </p>
            </div>
        </section>

        <section class="grid md:grid-cols-2 gap-8 mb-16">
            <div class="border-2 border-black rounded-2xl overflow-hidden shadow-[8px_8px_0px_0px_rgba(120,150,133,0.4)]">
                <h2 class="bg-[#789685]/50 border-b-2 border-black p-4 text-2xl font-bold text-center">Required Skills</h2>
                <ul class="p-6 space-y-3 list-disc list-inside font-medium text-gray-700 text-lg">
                    <?php foreach($career['skills'] as $skill): ?>
                    <li><?php echo htmlspecialchars($skill); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="border-2 border-black rounded-2xl overflow-hidden shadow-[8px_8px_0px_0px_rgba(120,150,133,0.4)]">
                <h2 class="bg-[#789685]/50 border-b-2 border-black p-4 text-2xl font-bold text-center">Duties & Responsibilities</h2>
                <ul class="p-6 space-y-3 list-disc list-inside font-medium text-gray-700 text-lg">
                    <?php foreach($career['duties'] as $duty): ?>
                    <li><?php echo htmlspecialchars($duty); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>

        <section class="mb-20">
            <h2 class="text-center text-4xl font-bold mb-10">Similar Career</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach($career['similar'] as $similarId): ?>
                <?php $similar = $careers[$similarId]; ?>
                <div class="flex flex-col">
                    <h3 class="text-2xl font-bold text-center mb-4"><?php echo htmlspecialchars($similar['title']); ?></h3>
                    <div class="relative group rounded-3xl overflow-hidden aspect-square border-4 border-[#789685]">
                        <img src="<?php echo htmlspecialchars($similar['image']); ?>" alt="<?php echo htmlspecialchars($similar['title']); ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        <div class="absolute bottom-4 right-4">
                            <a href="/detail/<?php echo $similarId; ?>" class="bg-[#789685] text-white text-xs font-bold px-4 py-2 rounded-lg shadow-lg">More Details</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

    </main>

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
        document.querySelectorAll('.btn-interact').forEach(button => {
            button.addEventListener('click', function() {
                this.querySelector('svg').classList.toggle('fill-active');
            });
        });
    </script>
    <style>
        .fill-active { fill: currentColor !important; }
    </style>
</body>
</html>