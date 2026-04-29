/**
 * career.js
 * Logika interaksi halaman Daftar Jalur Karir
 */

const selected = new Set();

/**
 * Toggle pilih / batal satu kartu karir
 * @param {HTMLElement} el  - elemen .career-card yang diklik
 * @param {number}      id  - id karir
 */
function toggleCard(el, id) {
  const chk = document.getElementById('chk-' + id);

  if (selected.has(id)) {
    selected.delete(id);
    chk.checked = false;
    el.classList.remove('selected');
  } else {
    selected.add(id);
    chk.checked = true;
    el.classList.add('selected');
  }

  updateCounter();
}

/**
 * Trash icon → pilih semua / batal semua
 */
function initTrashBtn() {
  const trashBtn = document.getElementById('trashBtn');
  if (!trashBtn) return;

  trashBtn.addEventListener('click', function (e) {
    e.preventDefault();

    const cards  = document.querySelectorAll('[id^="card-"]');
    const allSel = selected.size === cards.length;

    cards.forEach(card => {
      const id  = parseInt(card.id.replace('card-', ''));
      const chk = document.getElementById('chk-' + id);

      if (allSel) {
        selected.delete(id);
        chk.checked = false;
        card.classList.remove('selected');
      } else {
        selected.add(id);
        chk.checked = true;
        card.classList.add('selected');
      }
    });

    updateCounter();
  });
}

/**
 * Update badge jumlah karir yang dipilih
 */
function updateCounter() {
  const wrap = document.getElementById('selCount');
  const num  = document.getElementById('selNum');

  if (!wrap || !num) return;

  num.textContent = selected.size;
  wrap.classList.toggle('hidden', selected.size === 0);
}

/**
 * Auto-hide toast notification setelah 4 detik
 */
function initToast() {
  const toast = document.getElementById('toast');
  if (!toast) return;
  setTimeout(() => toast.remove(), 4000);
}

/**
 * Init semua listener setelah DOM siap
 */
document.addEventListener('DOMContentLoaded', function () {
  initTrashBtn();
  initToast();
});