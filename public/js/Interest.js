function toggleInterest(card) {
    card.classList.toggle('selected');
}

function proceed() {
    const selectedCards = document.querySelectorAll('.interest-card.selected');

    if (selectedCards.length === 0) {
        alert('Pick at least one interest!');
        return;
    }

    const selectedNames = [];
    selectedCards.forEach(card => {
        selectedNames.push(card.dataset.name);
    });

    fetch('/saveInterests', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ interests: selectedNames })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            window.location.href = '/Home';
        } else {
            alert('Failed to save: ' + (data.message || 'Try again'));
        }
    })
    .catch(() => {
        alert('Something went wrong, try again.');
    });
}