// 1. Get DOM elements
const openModalBtn = document.getElementById('openModalBtn');
const closeModalBtn = document.getElementById('closeModalBtn');
const cancelBtn = document.getElementById('cancelBtn');
const modalOverlay = document.getElementById('modalOverlay');
const jobForm = document.getElementById('jobForm');
const tagSelect = document.getElementById('tagSelect');
const modalTagsContainer = document.getElementById('modalTagsContainer');
const tagsData = document.getElementById('tagsData');
const salaryInput = document.getElementById('salary');
const submitBtn = document.querySelector('.submit-btn');

// 2. State Management
let tags = [];
const availableTags = [
    'Remote', 'On-site', 'Hybrid', 'Full-time', 'Part-time', 'Contract', 
    'Internship', 'Benefits', 'Health Insurance', '401k', 'Flexible Hours', 
    'Paid Time Off', 'Professional Development', 'Stock Options', 'Bonus',
    'Entry Level', 'Mid Level', 'Senior Level', 'Leadership', 'Team Lead'
];

// 3. Modal Logic
const openModal = () => {
    modalOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';
};

const closeModal = () => {
    modalOverlay.classList.remove('active');
    document.body.style.overflow = 'auto';
    setTimeout(resetForm, 300); // Reset form after transition
};

openModalBtn.addEventListener('click', openModal);
closeModalBtn.addEventListener('click', closeModal);
cancelBtn.addEventListener('click', closeModal);

modalOverlay.addEventListener('click', (e) => {
    if (e.target === modalOverlay) closeModal();
});

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modalOverlay.classList.contains('active')) {
        closeModal();
    }
});

// 4. Tag System Logic
tagSelect.addEventListener('change', function() {
    const selectedValue = this.value;
    if (!selectedValue || tags.includes(selectedValue)) return;
    
    // Add to state
    tags.push(selectedValue);
    
    // Create UI element
    const tagElement = document.createElement('span');
    tagElement.className = 'modal-tag';
    tagElement.innerHTML = `
        ${selectedValue}
        <button type="button" class="remove-tag" data-tag="${selectedValue}">×</button>
    `;
    modalTagsContainer.appendChild(tagElement);
    
    // Remove from select dropdown
    const optionToRemove = Array.from(this.options).find(opt => opt.value === selectedValue);
    if (optionToRemove) optionToRemove.remove();
    
    this.value = ''; // Reset select

    // Add removal listener
    tagElement.querySelector('.remove-tag').addEventListener('click', function() {
        const val = this.dataset.tag;
        tags = tags.filter(t => t !== val);
        tagElement.remove();
        
        // Restore to dropdown in alphabetical order
        const newOption = document.createElement('option');
        newOption.value = val;
        newOption.textContent = val;
        
        const options = Array.from(tagSelect.options);
        let inserted = false;
        for (let i = 1; i < options.length; i++) {
            if (options[i].value.localeCompare(val) > 0) {
                tagSelect.insertBefore(newOption, options[i]);
                inserted = true;
                break;
            }
        }
        if (!inserted) tagSelect.appendChild(newOption);
    });
});

// 5. Form Handling
jobForm.addEventListener('submit', (e) => {
    // Pack tags as JSON
    tagsData.value = JSON.stringify(tags);
    
    // Use raw numeric value for salary if it exists
    if (salaryInput.dataset.rawValue) {
        salaryInput.value = salaryInput.dataset.rawValue;
    }

    console.log('Form Ready to Submit:', {
        title: document.getElementById('jobTitle').value,
        tags: tagsData.value
    });
});

// 6. Reset Form Logic
function resetForm() {
    jobForm.reset();
    tags = [];
    modalTagsContainer.innerHTML = '';
    
    // Restore dropdown
    tagSelect.innerHTML = '<option value="" disabled selected>Choose a tag...</option>';
    availableTags.sort().forEach(tag => {
        const option = document.createElement('option');
        option.value = tag;
        option.textContent = tag;
        tagSelect.appendChild(option);
    });

    // Reset styles
    document.querySelectorAll('.job-form input, .job-form select').forEach(input => {
        input.style.borderColor = '';
    });
}

// 7. Visual Effects & Animations
// Intersection Observer for Scroll Animation
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, { threshold: 0.2 });

document.querySelectorAll('.job-offer-card').forEach(card => {
    observer.observe(card);
});

// Salary Formatting
salaryInput.addEventListener('input', function() {
    let value = this.value.replace(/[^0-9]/g, '');
    this.dataset.rawValue = value; // Keep clean number for DB
});

// Visual Validation Feedback
const inputs = document.querySelectorAll('input[required], select[required]');
inputs.forEach(input => {
    input.addEventListener('blur', function() {
        if (this.value.trim() === '') {
            this.style.borderColor = 'var(--danger, #ff4d4d)';
            this.style.animation = 'shake 0.5s ease';
        } else {
            this.style.borderColor = 'var(--success, #2ecc71)';
        }
        setTimeout(() => this.style.animation = '', 500);
    });
});

// Inject Shake Animation CSS
const style = document.createElement('style');
style.textContent = `
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }
`;
document.head.appendChild(style);

console.log('Recruiter Dashboard Initialized 🚀');