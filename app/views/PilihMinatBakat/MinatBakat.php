<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Minat - Talent Track</title>
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
        .interest-card.selected {
            border: 3px solid black;
        }
        .interest-card {
            border: 3px solid transparent;
        }
    </style>
</head>
<body class="bg-white font-sans min-h-screen p-8">

    <div class="w-full px-12 py-4">

        <a href="/" class="block mb-4">
            <img src="/assets/Image/backarrow.png" alt="Back" class="h-12">
        </a>

        <h1 class="text-4xl font-extrabold text-black mb-8">What are your interest?</h1>

        <div class="pr-2">
            <div class="grid grid-cols-5 gap-4" id="interest-grid">

                <?php
                $interests = [
                    ["name" => "Animating",      "img" => "animating0.png"],
                    ["name" => "Coding",         "img" => "coding0.png"],
                    ["name" => "Business",       "img" => "business0.png"],
                    ["name" => "Designing",      "img" => "designing0.png"],
                    ["name" => "Writing",        "img" => "writing0.png"],
                    ["name" => "Law",            "img" => "law0.png"],
                    ["name" => "Cooking",        "img" => "cooking0.png"],
                    ["name" => "Photography",    "img" => "photography0.png"],
                    ["name" => "Health & Safety","img" => "health&safety0.png"],
                    ["name" => "Sports",         "img" => "sports0.png"],
                    ["name" => "Music",          "img" => "music0.png"],
                    ["name" => "Teaching",       "img" => "teaching0.png"],
                    ["name" => "Acting",         "img" => "acting0.png"],
                    ["name" => "Journalism",     "img" => "journalism0.png"],
                    ["name" => "Streaming",      "img" => "streaming0.png"],
                ];
                foreach($interests as $interest): ?>
                <div class="interest-card rounded-2xl overflow-hidden cursor-pointer select-none"
                     onclick="toggleInterest(this)">
                    <img src="/assets/Image/<?php echo $interest['img']; ?>"
                         alt="<?php echo $interest['name']; ?>"
                         class="w-full h-44 object-cover">
                    <p class="font-semibold text-black py-2 px-1"><?php echo $interest['name']; ?></p>
                </div>
                <?php endforeach; ?>

            </div>
        </div>

        <div class="mt-6">
            <button onclick="proceed()"
                class="w-full bg-[#93A89A] text-black font-semibold py-4 rounded-xl text-base hover:bg-[#7A8C80] transition">
                Please pick atleast two of your interest to proceed
            </button>
        </div>

    </div>

    <script src="/js/minatbakat.js"></script>

</body>
</html>