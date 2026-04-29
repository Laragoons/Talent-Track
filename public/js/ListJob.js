let deleteMode = false;

function toggleCareer(card) {
    card.classList.toggle('selected');
}

function toggleDeleteMode() {
    deleteMode = !deleteMode;

    const allCareers  = document.getElementById('all-careers');
    const homeCareers = document.getElementById('home-careers');
    const btn         = document.getElementById('main-btn');

    if (deleteMode) {
        allCareers.classList.add('hidden');
        homeCareers.classList.remove('hidden');
        btn.textContent = 'Delete from home page';
        btn.classList.remove('bg-[#93A89A]', 'hover:bg-[#7A8C80]', 'text-black');
        btn.classList.add('bg-red-500', 'hover:bg-red-600', 'text-white');
    } else {
        allCareers.classList.remove('hidden');
        homeCareers.classList.add('hidden');
        btn.textContent = 'Add selected career list to home page';
        btn.classList.remove('bg-red-500', 'hover:bg-red-600', 'text-white');
        btn.classList.add('bg-[#93A89A]', 'hover:bg-[#7A8C80]', 'text-black');

        document.querySelectorAll('.career-card.selected').forEach(c => c.classList.remove('selected'));
    }
}

function handleBtn() {
    window.location.href = '/Home';
}