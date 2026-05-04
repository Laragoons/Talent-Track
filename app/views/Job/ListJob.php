<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Career List - Talent Track</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
        .career-card.selected {
            border: 3px solid black;
        }
        .career-card {
            border: 3px solid transparent;
        }
    </style>
</head>
<body class="bg-white font-sans min-h-screen p-8">

    <div class="w-full px-12 py-4">

        <div class="flex justify-between items-start mb-4">
            <a href="/Home">
                <img src="/assets/Image/backarrow.png" alt="Back" class="h-12">
            </a>
            <button onclick="toggleDeleteMode()" class="hover:scale-110 transition">
                <img src="/assets/Image/trash.png" alt="Delete" class="h-10">
            </button>
        </div>

        <h1 class="text-4xl font-extrabold text-black mb-8">Full Career List</h1>

        <div class="pr-2">

            <div id="all-careers" class="grid grid-cols-5 gap-4">
                <?php
                $careers = [
                    ["name" => "Animator",         "img" => "animator1.png"],
                    ["name" => "Programmer",        "img" => "programmer1.png"],
                    ["name" => "Sales Executive",   "img" => "sales&executive1.png"],
                    ["name" => "Designer",          "img" => "designer1.png"],
                    ["name" => "Writer",            "img" => "writer1.png"],
                    ["name" => "Lawyer",            "img" => "lawyer1.png"],
                    ["name" => "Chef",              "img" => "chef1.png"],
                    ["name" => "Photographer",      "img" => "photographer1.png"],
                    ["name" => "Industrial Expert", "img" => "industrialexpert1.png"],
                    ["name" => "Athlete",           "img" => "athlete1.png"],
                    ["name" => "Musician",          "img" => "musician1.png"],
                    ["name" => "Teacher",           "img" => "teacher1.png"],
                    ["name" => "Actor/Actress",     "img" => "actoractress1.png"],
                    ["name" => "Journalist",        "img" => "journalist1.png"],
                    ["name" => "Streamer",          "img" => "streamer1.png"],
                ];
                foreach($careers as $career): ?>
                <div class="career-card rounded-2xl overflow-hidden cursor-pointer select-none"
                     onclick="toggleCareer(this)">
                    <img src="/assets/Image/<?php echo $career['img']; ?>"
                         alt="<?php echo $career['name']; ?>"
                         class="w-full h-44 object-cover">
                    <p class="font-semibold text-black py-2 px-1"><?php echo $career['name']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>

            <div id="home-careers" class="grid grid-cols-5 gap-4 hidden">
                <?php
                $homeCareers = [
                    ["name" => "Chef",      "img" => "chef1.png"],
                    ["name" => "Animator",  "img" => "animator1.png"],
                    ["name" => "Athlete",   "img" => "athlete1.png"],
                    ["name" => "Programmer","img" => "programmer1.png"],
                ];
                foreach($homeCareers as $career): ?>
                <div class="career-card rounded-2xl overflow-hidden cursor-pointer select-none"
                     onclick="toggleCareer(this)">
                    <img src="/assets/Image/<?php echo $career['img']; ?>"
                         alt="<?php echo $career['name']; ?>"
                         class="w-full h-44 object-cover">
                    <p class="font-semibold text-black py-2 px-1"><?php echo $career['name']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>

        </div>

        <div class="mt-6">
            <button id="main-btn" onclick="handleBtn()"
                class="w-full bg-[#93A89A] text-black font-semibold py-4 rounded-xl text-base hover:bg-[#7A8C80] transition">
                Add selected career list to home page
            </button>
        </div>

    </div>

    <script src="/js/ListJob.js"></script>

</body>
</html>