const interestImageMap = {
    "Animating":       "assets/Image/animating0.png",
    "Coding":          "assets/Image/coding0.png",
    "Business":        "assets/Image/business0.png",
    "Designing":       "assets/Image/designing0.png",
    "Writing":         "assets/Image/writing0.png",
    "Law":             "assets/Image/law0.png",
    "Cooking":         "assets/Image/cooking0.png",
    "Photography":     "assets/Image/photography0.png",
    "Health & Safety": "assets/Image/health&safety0.png",
    "Sports":          "assets/Image/sports0.png",
    "Music":           "assets/Image/music0.png",
    "Teaching":        "assets/Image/teaching0.png",
    "Acting":          "assets/Image/acting0.png",
    "Journalism":      "assets/Image/journalism0.png",
    "Streaming":       "assets/Image/streaming0.png",
};

const interests = (typeof userInterestsFromDB !== 'undefined' && userInterestsFromDB.length > 0)
    ? userInterestsFromDB.map(name => ({
        label: name,
        src: interestImageMap[name] || "assets/Image/coding0.png"
      }))
    : [{ label: "Explore", src: "assets/Image/coding0.png" }];

let current = 0;
let isAnimating = false;
const total = interests.length;

const leftImg   = document.getElementById('carousel-left');
const centerImg = document.getElementById('carousel-center');
const rightImg  = document.getElementById('carousel-right');
const dotsWrap  = document.getElementById('carousel-dots');
const btnLeft   = document.getElementById('carousel-btn-left');
const btnRight  = document.getElementById('carousel-btn-right');

function buildDots() {
    dotsWrap.innerHTML = '';
    for (let i = 0; i < total; i++) {
        const dot = document.createElement('span');
        dot.style.display      = 'inline-block';
        dot.style.height       = '12px';
        dot.style.borderRadius = '9999px';
        dot.style.cursor       = 'pointer';
        dot.style.transition   = 'all 0.4s ease';
        dot.addEventListener('click', () => {
            if (i !== current) goTo(i, i > current ? 'right' : 'left');
        });
        dotsWrap.appendChild(dot);
    }
}

function updateDots() {
    dotsWrap.querySelectorAll('span').forEach((dot, i) => {
        if (i === current) {
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
        current = (newIndex + total) % total;
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

btnLeft.addEventListener('click',  () => goTo(current - 1, 'left'));
btnRight.addEventListener('click', () => goTo(current + 1, 'right'));

buildDots();
renderImages();
updateDots();
leftImg.style.opacity   = '0.75';
centerImg.style.opacity = '1';
rightImg.style.opacity  = '0.75';