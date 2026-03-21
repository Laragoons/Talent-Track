const defaultInterests = [
    { label: "Designing",    src: "assets/Image/designing.png" },
    { label: "Programming",  src: "assets/Image/Programmer.png" },
    { label: "Cooking",      src: "assets/Image/Chef2.png" },
    { label: "Architecture", src: "assets/Image/Architect.png" },
    { label: "Animation",    src: "assets/Image/Animator.png" },
    { label: "Coding",       src: "assets/Image/coding.png" },
];

const saved = localStorage.getItem('userInterests');
const interests = saved ? JSON.parse(saved) : defaultInterests;

let current = 1;
let isAnimating = false;
const total = interests.length;
const totalDots = Math.max(1, total - 3 + 1);

const leftImg   = document.getElementById('carousel-left');
const centerImg = document.getElementById('carousel-center');
const rightImg  = document.getElementById('carousel-right');
const dotsWrap  = document.getElementById('carousel-dots');
const btnLeft   = document.getElementById('carousel-btn-left');
const btnRight  = document.getElementById('carousel-btn-right');

function buildDots() {
    dotsWrap.innerHTML = '';
    for (let i = 0; i < totalDots; i++) {
        const dot = document.createElement('span');
        dot.style.display      = 'inline-block';
        dot.style.height       = '12px';
        dot.style.borderRadius = '9999px';
        dot.style.cursor       = 'pointer';
        dot.style.transition   = 'all 0.4s ease';
        dotsWrap.appendChild(dot);
    }
}

function updateDots() {
    const activeDot = current - 1;
    dotsWrap.querySelectorAll('span').forEach((dot, i) => {
        if (i === activeDot) {
            dot.style.width           = '40px';
            dot.style.backgroundColor = '#1f2937';
        } else {
            dot.style.width           = '12px';
            dot.style.backgroundColor = '#ffffff';
        }
    });
}

function renderImages() {
    const prev = (current - 1 + total) % total;
    const next = (current + 1) % total;
    leftImg.src   = interests[prev].src;
    leftImg.alt   = interests[prev].label;
    centerImg.src = interests[current].src;
    centerImg.alt = interests[current].label;
    rightImg.src  = interests[next].src;
    rightImg.alt  = interests[next].label;
}

function goTo(newIndex, direction) {
    if (isAnimating) return;
    isAnimating = true;

    const shiftOut = direction === 'right' ? '-60px' : '60px';
    const shiftIn  = direction === 'right' ? '60px'  : '-60px';
    const els = [leftImg, centerImg, rightImg];

    els.forEach(el => {
        el.style.transition = 'opacity 0.4s cubic-bezier(0.4,0,0.2,1), transform 0.4s cubic-bezier(0.4,0,0.2,1)';
        el.style.opacity    = '0';
        el.style.transform  = `translateX(${shiftOut})`;
    });

    setTimeout(() => {
        current = newIndex;
        renderImages();
        updateDots();

        els.forEach(el => {
            el.style.transition = 'none';
            el.style.transform  = `translateX(${shiftIn})`;
            el.style.opacity    = '0';
        });

        void leftImg.offsetWidth;

        els.forEach(el => {
            el.style.transition = 'opacity 0.4s cubic-bezier(0.4,0,0.2,1), transform 0.4s cubic-bezier(0.4,0,0.2,1)';
            el.style.transform  = 'translateX(0)';
        });
        leftImg.style.opacity   = '0.75';
        centerImg.style.opacity = '1';
        rightImg.style.opacity  = '0.75';

        setTimeout(() => { isAnimating = false; }, 420);
    }, 410);
}

btnLeft.addEventListener('click', () => {
    goTo(current - 1 < 1 ? totalDots : current - 1, 'left');
});
btnRight.addEventListener('click', () => {
    goTo(current + 1 > totalDots ? 1 : current + 1, 'right');
});

buildDots();
renderImages();
updateDots();
leftImg.style.opacity   = '0.75';
centerImg.style.opacity = '1';
rightImg.style.opacity  = '0.75';