// Add interactivity to bookmark buttons
const bookmarkButtons = document.querySelectorAll('.bookmark-btn');

bookmarkButtons.forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.stopPropagation();
        this.classList.toggle('bookmarked');
        
        // Add animation effect
        this.style.transform = 'scale(1.3) rotate(360deg)';
        
        setTimeout(() => {
            this.style.transform = '';
        }, 300);
    });
});

// Add click handler for Read More buttons
const readMoreButtons = document.querySelectorAll('.read-more-btn');

readMoreButtons.forEach(btn => {
    btn.addEventListener('click', function() {
        // Get the job title from the card
        const card = this.closest('.job-card');
        const jobTitle = card.querySelector('.job-title').textContent;
        
        // You can redirect to a job details page here
        // For now, we'll show an alert
        console.log(`Navigating to job details for: ${jobTitle}`);
        
        // Example: window.location.href = `job-details.php?id=${jobId}`;
        
    });
});

// Add hover effect to job cards
const jobCards = document.querySelectorAll('.job-card');

jobCards.forEach(card => {
    card.addEventListener('mouseenter', function() {
        // Add subtle tilt effect based on mouse position
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

// Notification button interaction
const notificationBtn = document.querySelector('.notification-btn');

notificationBtn.addEventListener('click', function() {
    // Add shake animation
    this.style.animation = 'shake 0.5s ease';
    
    setTimeout(() => {
        this.style.animation = '';
    }, 500);
    
    alert('You have 3 new notifications!');
});

// Add shake animation keyframes dynamically
const style = document.createElement('style');
style.textContent = `
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }
`;
document.head.appendChild(style);

// Profile button interaction
const profileBtn = document.querySelector('.profile-btn');

profileBtn.addEventListener('click', function() {
    console.log('Navigating to profile page');
    // window.location.href = 'profile.php';
    alert('Redirecting to your profile...');
});

// Add intersection observer for scroll animations
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

// Observe all job cards
jobCards.forEach(card => {
    observer.observe(card);
});

// Add typing effect for welcome message (optional enhancement)
const sectionTitle = document.querySelector('.section-title');
const originalText = sectionTitle.textContent;

// Uncomment below to enable typing effect
/*
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

console.log('Dashboard loaded successfully! 🚀');

const modal = document.getElementById('jobModal');
const closeModalBtn = document.querySelector('.modal-close');

readMoreButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        const card = btn.closest('.job-card');

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

closeModalBtn.addEventListener('click', () => {
    modal.classList.remove('active');
});

modal.addEventListener('click', e => {
    if (e.target === modal) {
        modal.classList.remove('active');
    }
});

document.querySelector('.apply-btn').addEventListener('click', () => {
    alert('Application submitted successfully!');
    modal.classList.remove('active');
});
