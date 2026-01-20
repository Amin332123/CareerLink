// =======================
// Bookmarks
// =======================
const bookmarkButtons = document.querySelectorAll('.bookmark-btn');

bookmarkButtons.forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.stopPropagation();
        this.classList.toggle('bookmarked');

        this.style.transform = 'scale(1.3) rotate(360deg)';
        setTimeout(() => {
            this.style.transform = '';
        }, 300);
    });
});

// =======================
// Modal Setup
// =======================
const modal = document.getElementById('jobModal');
const closeBtn = document.querySelector('.modal-close');

document.querySelectorAll('.read-more-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const card = btn.closest('.job-card');

        // Populate modal
        document.getElementById('modalJobTitle').textContent =
            card.querySelector('.job-title').textContent;

        document.getElementById('modalCompany').textContent =
            card.querySelector('.company').textContent;

        document.getElementById('modalRecruiter').textContent =
            card.querySelector('.recruiter').textContent;

        document.getElementById('modalSalary').textContent =
            card.querySelector('.salary-amount').textContent;

        document.getElementById('modalCompanyLogo').src =
            card.querySelector('.company-logo img').src;

        const tagsContainer = document.getElementById('modalTags');
        tagsContainer.innerHTML = '';
        card.querySelectorAll('.tag').forEach(tag => {
            const span = document.createElement('span');
            span.className = 'tag';
            span.textContent = tag.textContent;
            tagsContainer.appendChild(span);
        });

        modal.classList.add('active');
    });
});

// Close modal
closeBtn.addEventListener('click', () => modal.classList.remove('active'));
modal.addEventListener('click', e => {
    if (e.target === modal) modal.classList.remove('active');
});

// Apply button inside modal
document.querySelector('.apply-btn').addEventListener('click', () => {
    alert('Your application has been sent successfully!');
    modal.classList.remove('active');
});

// =======================
// Job Card Hover Effects
// =======================
const jobCards = document.querySelectorAll('.job-card');

jobCards.forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.addEventListener('mousemove', tiltCard);
    });

    card.addEventListener('mouseleave', function() {
        this.removeEventListener('mousemove', tiltCard);
        this.style.transform = 'translateY(-10px) scale(1.02)';
    });
});

function tiltCard(e) {
    const card = e.currentTarget;
    const rect = card.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    const centerX = rect.width / 2;
    const centerY = rect.height / 2;

    const rotateX = (y - centerY) / 20;
    const rotateY = (centerX - x) / 20;

    card.style.transform = `translateY(-10px) scale(1.02) perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
}

// =======================
// Notifications
// =======================
const notificationBtn = document.querySelector('.notification-btn');

notificationBtn.addEventListener('click', function() {
    this.style.animation = 'shake 0.5s ease';
    setTimeout(() => {
        this.style.animation = '';
    }, 500);
    alert('You have 3 new notifications!');
});

// Add shake animation dynamically
const style = document.createElement('style');
style.textContent = `
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }
`;
document.head.appendChild(style);

// =======================
// Profile Button
// =======================
const profileBtn = document.querySelector('.profile-btn');

profileBtn.addEventListener('click', function() {
    console.log('Navigating to profile page');
    alert('Redirecting to your profile...');
});

// =======================
// Scroll Animations
// =======================
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

jobCards.forEach(card => {
    observer.observe(card);
});

// =======================
// Optional Typing Effect for Welcome Section
// =======================
/*
const sectionTitle = document.querySelector('.section-title');
const originalText = sectionTitle.textContent;
sectionTitle.textContent = '';
let i = 0;
function typeWriter() {
    if (i < originalText.length) {
        sectionTitle.textContent += originalText.charAt(i);
        i++;
        setTimeout(typeWriter, 100);
    }
}
setTimeout(typeWriter, 500);
*/

console.log('Recommended Jobs Dashboard loaded successfully! 🚀');
