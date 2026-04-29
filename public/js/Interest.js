function toggleInterest(card) {
    card.classList.toggle('selected');
}

function proceed() {
    const selectedCards = document.querySelectorAll('.interest-card.selected');
    if (selectedCards.length < 2) {
        alert('Pick at least two interests!');
        return;
    }

    const selected = [];
    selectedCards.forEach(card => {
        const img   = card.querySelector('img');
        const label = card.querySelector('p');
        selected.push({
            label: label.textContent.trim(),
            src:   img.getAttribute('src'),
        });
    });

    localStorage.setItem('userInterests', JSON.stringify(selected));
    window.location.href = '/Home';
}