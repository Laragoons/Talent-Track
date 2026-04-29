const defaultInterests = [
    { label: "Drawing",   src: "/assets/Image/drawing.png" },
    { label: "Designing", src: "/assets/Image/designing.png" },
    { label: "Cooking",   src: "/assets/Image/cooking.png" },
];

function getInterests() {
    const saved = localStorage.getItem('userInterests');
    return saved ? JSON.parse(saved) : defaultInterests;
}

function saveInterests(interests) {
    localStorage.setItem('userInterests', JSON.stringify(interests));
}

let editMode = false;

function renderInterests() {
    const interests = getInterests();
    const grid = document.getElementById('interest-grid');
    grid.innerHTML = '';

    interests.forEach((interest, index) => {
        const card = document.createElement('div');
        card.className = 'flex flex-col gap-3 relative';
        card.innerHTML = `
            <div class="w-full aspect-square rounded-2xl overflow-hidden relative">
                <img src="${interest.src}" alt="${interest.label}" class="w-full h-full object-cover">
                <button class="cross-btn absolute top-2 right-2 hidden" onclick="deleteInterest(${index})">
                    <img src="/assets/Image/cross.png" alt="Remove" class="w-6 h-6">
                </button>
            </div>
            <p class="text-2xl font-bold">${interest.label}</p>
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

    if (editMode) showCrosses();
}

function toggleEditMode() {
    editMode = !editMode;
    if (editMode) {
        showCrosses();
    } else {
        hideCrosses();
    }
}

function showCrosses() {
    document.querySelectorAll('.cross-btn').forEach(btn => {
        btn.classList.remove('hidden');
    });
}

function hideCrosses() {
    document.querySelectorAll('.cross-btn').forEach(btn => {
        btn.classList.add('hidden');
    });
}

function deleteInterest(index) {
    const interests = getInterests();
    interests.splice(index, 1);
    saveInterests(interests);
    renderInterests();
    if (editMode) showCrosses();
}

document.getElementById('edit-btn').addEventListener('click', toggleEditMode);

renderInterests();