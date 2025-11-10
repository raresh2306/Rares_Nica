
// Development flag: if true, cookie modal always shows (ignores stored consent)
const SHOW_COOKIE_MODAL_DURING_DEV = true;

//Replace Me text in header
const checkReplace = document.querySelector('.replace-me');

if (checkReplace !== null) {
  const replace = new ReplaceMe(checkReplace, {
    animation: 'animated fadeIn',
    speed: 1250,
    separator: ',',
    loopCount: 'infinite',
    autoRun: true,
  });
}

// User Scroll For Navbar
function userScroll() {
  const navbar = document.querySelector('.navbar');
  const toTopBtn = document.querySelector('#to-top');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      navbar.classList.add('bg-dark');
      navbar.classList.add('border-bottom');
      navbar.classList.add('border-secondary');
      navbar.classList.add('navbar-sticky');
      toTopBtn.classList.add('show');
    } else {
      navbar.classList.remove('bg-dark');
      navbar.classList.remove('border-bottom');
      navbar.classList.remove('border-secondary');
      navbar.classList.remove('navbar-sticky');
      toTopBtn.classList.remove('show');
    }
  });
}

document.addEventListener('DOMContentLoaded', userScroll);



// Video Modal
const videoBtn = document.querySelector('.video-btn');
const videoModal = document.querySelector('#videoModal');
const video = document.querySelector('#video');
let videoSrc;

if (videoBtn !== null) {
  videoBtn.addEventListener('click', () => {
    videoSrc = videoBtn.getAttribute('data-bs-src');
  });
}

if (videoModal !== null) {
  videoModal.addEventListener('shown.bs.modal', () => {
    video.setAttribute(
      'src',
      videoSrc + '?autoplay=1;modestbranding=1;showInfo=0'
    );
  });

  videoModal.addEventListener('hide.bs.modal', () => {
    video.setAttribute('src', videoSrc);
  });
}

// Cookie consent modal with localStorage persistence
function setupCookieConsent() {
  const consentKey = 'cookieConsent';

  let shouldShow = true;
  if (!SHOW_COOKIE_MODAL_DURING_DEV) {
    try {
      if (localStorage.getItem(consentKey) === 'true') {
        shouldShow = false;
      }
    } catch (_) {
      // storage unavailable; default to showing
    }
  }

  if (!shouldShow) return;

  const consentModalEl = document.getElementById('cookieConsentModal');
  if (!consentModalEl || typeof bootstrap === 'undefined') return;

  const consentModal = new bootstrap.Modal(consentModalEl);
  const acceptBtn = document.getElementById('acceptCookiesBtn');

  consentModal.show();

  if (acceptBtn) {
    acceptBtn.addEventListener('click', () => {
      try {
        localStorage.setItem(consentKey, 'true');
      } catch (_) {}
      consentModal.hide();
    });
  }
}

// Smooth scroll and Back-to-Top behavior
function setupSmoothScroll() {
  const samePageLinks = document.querySelectorAll('a[href^="#"]');
  samePageLinks.forEach((link) => {
    const href = link.getAttribute('href');
    if (!href || href === '#') return;
    link.addEventListener('click', (e) => {
      const targetId = href.slice(1);
      const target = document.getElementById(targetId);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  const toTopBtn = document.querySelector('#to-top');
  if (toTopBtn) {
    toTopBtn.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }
}

// Form enhancements: enable/disable submit and success modal
function setupFormEnhancements() {
  const form = document.querySelector('#contact form');
  if (!form) return;

  const agree = form.querySelector('#agree-check');
  const submitBtn = form.querySelector('input[type="submit"]');

  if (agree && submitBtn) {
    submitBtn.disabled = !agree.checked;
    agree.addEventListener('change', () => {
      submitBtn.disabled = !agree.checked;
    });
  }

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const successEl = document.getElementById('formSuccessModal');
    if (successEl && typeof bootstrap !== 'undefined') {
      const successModal = new bootstrap.Modal(successEl);
      successModal.show();
    } else {
      alert('Thanks! Your request has been received. We will contact you soon.');
    }

    form.reset();
    if (submitBtn) submitBtn.disabled = true;
  });
}

// Player modal (click to expand)
document.addEventListener('DOMContentLoaded', () => {
  const cards = document.querySelectorAll('.player-card');
  const modalEl = document.getElementById('playerModal');
  if (!modalEl || cards.length === 0) return;

  const modal = new bootstrap.Modal(modalEl);
  const modalTitle = document.getElementById('playerModalLabel');
  const modalImg = document.getElementById('playerModalImg');
  const modalName = document.getElementById('playerModalName');
  const modalPos = document.getElementById('playerModalPos');
  const modalStats = document.getElementById('playerModalStats');
  const modalDetail = document.getElementById('playerModalDetail');

  cards.forEach((card) => {
    card.addEventListener('click', () => {
      const name = card.getAttribute('data-name') || '';
      const position = card.getAttribute('data-position') || '';
      const number = card.getAttribute('data-number') || '';
      const matches = card.getAttribute('data-matches');
      const goals = card.getAttribute('data-goals');
      const assists = card.getAttribute('data-assists');
      const cleanSheets = card.getAttribute('data-cleansheets');
      const saves = card.getAttribute('data-saves');
      const detail = card.getAttribute('data-detail') || '';

      // Image from card
      const img = card.querySelector('img');
      if (img) {
        modalImg.setAttribute('src', img.getAttribute('src'));
        modalImg.setAttribute('alt', name);
      }

      modalTitle.textContent = name;
      modalName.textContent = `${name}  - ${number}`;
      modalPos.textContent = position;

      // Build stats block depending on position
      if (position.toLowerCase() === 'goalkeeper') {
        modalStats.innerHTML = `<span class="badge bg-primary me-2">Matches: ${matches || '-'}</span>
                                <span class="badge bg-success me-2">Clean sheets: ${cleanSheets || '-'}</span>
                                <span class="badge bg-info">Saves: ${saves || '-'}</span>`;
      } else {
        modalStats.innerHTML = `<span class="badge bg-primary me-2">Matches: ${matches || '-'}</span>
                                <span class="badge bg-success me-2">Goals: ${goals || '-'}</span>
                                <span class="badge bg-info">Assists: ${assists || '-'}</span>`;
      }

      modalDetail.textContent = detail;
      modal.show();
    });
  });
});

// Initialize extras
document.addEventListener('DOMContentLoaded', () => {
  setupSmoothScroll();
  setupFormEnhancements();
  setupCookieConsent();
});
