// Fake job data for modal
const CreateCategoryForm = document.getElementById('createCategory');
// var inputCatergoryValue = document.getElementById('CategoryName');


CreateCategoryForm.addEventListener('submit', (e) => {
    submitNewCategory(e);

})

function submitNewCategory(e) {
    e.preventDefault();
    const categoryName = document.getElementById('CategoryName').value;
    var data = {categoryName};
   
    fetch('http://localhost/CareerLink/app/Models/Services/test.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body : JSON.stringify(data)
    })
    .then(res => {
        if (res.ok) {
             return res.text();
        } else {
            return "Error" + res.status;
        }
    })
    .then(data => {
        alert(data);
    })
   

}






































const jobsData = [
    {
        title: "Senior Frontend Developer",
        recruiter: "Sarah Johnson",
        company: "Tech Corp",
        salary: "$150,000",
        location: "San Francisco, CA",
        category: "Technology",
        tags: ["Remote", "Full-time", "React", "TypeScript"],
        description: "We are seeking an experienced Senior Frontend Developer to join our dynamic team. You will be responsible for building responsive, high-performance web applications using modern technologies. The ideal candidate has 5+ years of experience with React, TypeScript, and modern CSS frameworks. You'll work closely with our design and backend teams to deliver exceptional user experiences."
    },
    {
        title: "Head Chef",
        recruiter: "Michael Chen",
        company: "Fine Dining Co",
        salary: "$85,000",
        location: "New York, NY",
        category: "Food & Beverage",
        tags: ["On-site", "Full-time", "Experience Required"],
        description: "Join our prestigious fine dining restaurant as Head Chef. Lead a talented kitchen team and create innovative culinary experiences. Requires 10+ years of experience in high-end restaurants, strong leadership skills, and a passion for excellence. You'll manage menu development, kitchen operations, and team training while maintaining our Michelin-star standards."
    },
    {
        title: "Data Scientist",
        recruiter: "Emily Rodriguez",
        company: "Data Labs Inc",
        salary: "$140,000",
        location: "Boston, MA",
        category: "Technology",
        tags: ["Remote", "Full-time", "Python", "ML"],
        description: "Data Labs is looking for a talented Data Scientist to drive insights from complex datasets. You'll develop machine learning models, perform advanced analytics, and collaborate with cross-functional teams. Requirements include a Master's degree in a quantitative field, expertise in Python, and experience with deep learning frameworks. Strong communication skills essential."
    },
    {
        title: "Marketing Manager",
        recruiter: "David Kim",
        company: "Marketing Pro",
        salary: "$105,000",
        location: "Austin, TX",
        category: "Marketing",
        tags: ["Hybrid", "Full-time", "SEO", "Content Strategy"],
        description: "Lead our marketing initiatives and drive brand growth as our Marketing Manager. Develop and execute comprehensive marketing strategies across digital channels. Manage a team of 5, oversee campaign budgets, and analyze performance metrics. Ideal candidate has 7+ years in marketing, proven SEO expertise, and excellent project management skills."
    },
    {
        title: "Registered Nurse",
        recruiter: "Lisa Anderson",
        company: "City Hospital",
        salary: "$95,000",
        location: "Chicago, IL",
        category: "Healthcare",
        tags: ["On-site", "Full-time", "Benefits", "BSN Required"],
        description: "City Hospital is seeking compassionate Registered Nurses to join our critical care unit. Provide high-quality patient care, collaborate with healthcare teams, and maintain accurate medical records. BSN required, critical care certification preferred. Competitive benefits package including health insurance, retirement plan, and continuing education opportunities."
    },
    {
        title: "Financial Analyst",
        recruiter: "James Wilson",
        company: "Finance Group",
        salary: "$110,000",
        location: "Seattle, WA",
        category: "Finance",
        tags: ["Hybrid", "Full-time", "Excel", "CPA Preferred"],
        description: "Finance Group seeks a detail-oriented Financial Analyst to support our corporate finance team. Conduct financial modeling, prepare reports, and provide strategic recommendations. Bachelor's in Finance/Accounting required, CPA preferred. Proficiency in Excel, SQL, and financial software essential. Strong analytical and communication skills needed for this role."
    }
];

// Open modal functions
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

// Close modal functions
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
}

// Event listeners for action buttons
document.getElementById('createTagBtn').addEventListener('click', () => {
    openModal('createTagModal');
});

document.getElementById('createCategoryBtn').addEventListener('click', () => {
    openModal('createCategoryModal');
});

document.getElementById('showTagsBtn').addEventListener('click', () => {
    openModal('showTagsModal');
});

document.getElementById('showCategoriesBtn').addEventListener('click', () => {
    openModal('showCategoriesModal');
});

// Close modals when clicking outside
document.querySelectorAll('.modal-overlay').forEach(overlay => {
    overlay.addEventListener('click', (e) => {
        if (e.target === overlay) {
            closeModal(overlay.id);
        }
    });
});

// Close modals with Escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        document.querySelectorAll('.modal-overlay.active').forEach(modal => {
            closeModal(modal.id);
        });
    }
});

// Delete tag/category function
function deleteItem(type, name) {
    const confirmed = confirm(`Are you sure you want to delete this ${type}: "${name}"?`);
    if (confirmed) {
        console.log(`Deleting ${type}: ${name}`);
        // Here you would make an AJAX call to delete the item
        // For now, we'll just remove it from the DOM
        event.target.parentElement.remove();
        
        // Show success message
        alert(`${type.charAt(0).toUpperCase() + type.slice(1)} "${name}" deleted successfully!`);
    }
}

// Open job details modal
function openJobDetails(jobIndex) {
    const job = jobsData[jobIndex];
    const modalContent = document.getElementById('jobDetailsContent');
    const modalTitle = document.getElementById('jobDetailTitle');
    
    modalTitle.textContent = job.title;
    
    // Build the modal content
    modalContent.innerHTML = `
        <div class="detail-section">
            <h3>Job Information</h3>
            <div class="detail-grid">
                <div class="detail-row">
                    <span class="info-icon">👤</span>
                    <strong>Recruiter:</strong> ${job.recruiter}
                </div>
                <div class="detail-row">
                    <span class="info-icon">🏢</span>
                    <strong>Company:</strong> ${job.company}
                </div>
                <div class="detail-row">
                    <span class="info-icon">💰</span>
                    <strong>Salary:</strong> ${job.salary}
                </div>
                <div class="detail-row">
                    <span class="info-icon">📍</span>
                    <strong>Location:</strong> ${job.location}
                </div>
                <div class="detail-row">
                    <span class="info-icon">🏷️</span>
                    <strong>Category:</strong> ${job.category}
                </div>
            </div>
        </div>
        
        <div class="detail-section">
            <h3>Tags</h3>
            <div class="job-tags">
                ${job.tags.map(tag => `<span class="tag">${tag}</span>`).join('')}
            </div>
        </div>
        
        <div class="detail-section">
            <h3>Job Description</h3>
            <p class="description-text">${job.description}</p>
        </div>
        
        <form class="archive-form" action="archive_job.php" method="POST">
            <input type="hidden" name="job_id" value="${jobIndex}">
            <input type="hidden" name="job_title" value="${job.title}">
            <button type="submit" class="archive-btn">
                🗄️ Archive Job Offer
            </button>
        </form>
    `;
    
    openModal('jobDetailsModal');
}

// Animate statistics numbers on scroll
const observerOptions = {
    threshold: 0.5,
    rootMargin: '0px'
};

const animateNumbers = (entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const element = entry.target;
            const targetNumber = parseInt(element.textContent.replace(/,/g, ''));
            let currentNumber = 0;
            const increment = targetNumber / 50;
            const duration = 1500;
            const stepTime = duration / 50;
            
            const timer = setInterval(() => {
                currentNumber += increment;
                if (currentNumber >= targetNumber) {
                    element.textContent = targetNumber.toLocaleString();
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(currentNumber).toLocaleString();
                }
            }, stepTime);
            
            observer.unobserve(element);
        }
    });
};

const numberObserver = new IntersectionObserver(animateNumbers, observerOptions);

// Observe all number elements
document.querySelectorAll('.circle-number, .total-number, .stat-number').forEach(number => {
    numberObserver.observe(number);
});

// Add hover effects to cards
const jobCards = document.querySelectorAll('.job-card');

jobCards.forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.zIndex = '10';
    });
    
    card.addEventListener('mouseleave', function() {
        this.style.zIndex = '1';
    });
});

// Logout confirmation
document.querySelector('.logout-btn').addEventListener('click', () => {
    const confirmed = confirm('Are you sure you want to log out?');
    if (confirmed) {
        console.log('Logging out...');
        // window.location.href = 'logout.php';
        alert('Logging out... (This would redirect to logout page)');
    }
});

// Form submissions with console logging
document.querySelectorAll('.modal-form').forEach(form => {
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });
        
        console.log('Form submitted:', data);
        alert('Form submitted! Check console for data.');
        
        // Close the modal after submission
        const modal = form.closest('.modal-overlay');
        if (modal) {
            closeModal(modal.id);
        }
        
        // Reset form
        form.reset();
        
        // In production, you would submit to PHP here
        // form.submit();
    });
});

// Add animation to action buttons
const actionButtons = document.querySelectorAll('.action-btn');

actionButtons.forEach(btn => {
    btn.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-5px) scale(1.05)';
    });
    
    btn.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
    });
});

// Add ripple effect to buttons
function createRipple(event) {
    const button = event.currentTarget;
    const ripple = document.createElement('span');
    const rect = button.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;
    
    ripple.style.width = ripple.style.height = size + 'px';
    ripple.style.left = x + 'px';
    ripple.style.top = y + 'px';
    ripple.classList.add('ripple');
    
    button.appendChild(ripple);
    
    setTimeout(() => {
        ripple.remove();
    }, 600);
}

// Add ripple effect CSS
const rippleStyle = document.createElement('style');
rippleStyle.textContent = `
    button {
        position: relative;
        overflow: hidden;
    }
    
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        transform: scale(0);
        animation: ripple-animation 0.6s ease-out;
        pointer-events: none;
    }
    
    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(rippleStyle);

// Apply ripple to all buttons
document.querySelectorAll('button').forEach(button => {
    button.addEventListener('click', createRipple);
});
