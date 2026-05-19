const interestImageMap = {
    "Animating":       "/assets/Image/animating0.png",
    "Coding":          "/assets/Image/coding0.png",
    "Business":        "/assets/Image/business0.png",
    "Designing":       "/assets/Image/designing0.png",
    "Writing":         "/assets/Image/writing0.png",
    "Law":             "/assets/Image/law0.png",
    "Cooking":         "/assets/Image/cooking0.png",
    "Photography":     "/assets/Image/photography0.png",
    "Health & Safety": "/assets/Image/health&safety0.png",
    "Sports":          "/assets/Image/sports0.png",
    "Music":           "/assets/Image/music0.png",
    "Teaching":        "/assets/Image/teaching0.png",
    "Acting":          "/assets/Image/acting0.png",
    "Journalism":      "/assets/Image/journalism0.png",
    "Streaming":       "/assets/Image/streaming0.png",
};

let editMode = false;
let interests = (typeof interestsFromDB !== 'undefined') ? [...interestsFromDB] : [];

function renderInterests() {
    const grid = document.getElementById('interest-grid');
    grid.innerHTML = '';

    interests.forEach((name, index) => {
        const src = interestImageMap[name] || '/assets/Image/coding0.png';
        const card = document.createElement('div');
        card.className = 'flex flex-col gap-3 relative';
        card.innerHTML = `
            <div class="w-full aspect-square rounded-2xl overflow-hidden relative">
                <img src="${src}" alt="${name}" class="w-full h-full object-cover">
                <button class="cross-btn absolute top-2 right-2 w-8 h-8 flex items-center justify-center ${editMode ? '' : 'hidden'}" onclick="deleteInterest(${index})">
                    <img src="/assets/Image/cross.png" alt="Remove" class="w-8 h-8">
                </button>
            </div>
            <p class="text-2xl font-bold">${name}</p>
        `;
        grid.appendChild(card);
    });

    const plusCard = document.createElement('div');
    plusCard.className = 'flex flex-col gap-3';
    plusCard.innerHTML = `
        <a href="/Interest">
            <div class="w-full aspect-square rounded-2xl border-2 border-gray-200 shadow-md flex items-center justify-center cursor-pointer hover:bg-gray-50 transition">
                <img src="/assets/Image/plus.png" alt="Add" class="w-16 h-16">
            </div>
        </a>
    `;
    grid.appendChild(plusCard);
}

function toggleEditMode() {
    editMode = !editMode;
    renderInterests();
}

function deleteInterest(index) {
    const name = interests[index];

    fetch('/deleteInterest', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name: name })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            interests.splice(index, 1);
            renderInterests();
        } else {
            alert('Failed to remove interest.');
        }
    })
    .catch(() => {
        alert('Something went wrong.');
    });
}

document.getElementById('edit-btn').addEventListener('click', toggleEditMode);

renderInterests();