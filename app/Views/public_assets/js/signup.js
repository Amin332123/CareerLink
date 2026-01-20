// Get elements
const candidateBtn = document.getElementById('candidateBtn');
const recruiterBtn = document.getElementById('recruiterBtn');
const candidateForm = document.getElementById('candidateForm');
const recruiterForm = document.getElementById('recruiterForm');
const skillInput = document.getElementById('skillInput');
const addSkillBtn = document.getElementById('addSkillBtn');
const skillsContainer = document.getElementById('skillsContainer');

// Skills array to store added skills
let skills = [];

// Toggle between Candidate and Recruiter forms
candidateBtn.addEventListener('click', () => {
    candidateBtn.classList.add('active');
    recruiterBtn.classList.remove('active');
    candidateForm.classList.add('active');
    recruiterForm.classList.remove('active');
});

recruiterBtn.addEventListener('click', () => {
    recruiterBtn.classList.add('active');
    candidateBtn.classList.remove('active');
    recruiterForm.classList.add('active');
    candidateForm.classList.remove('active');
});

// Handle file upload display for candidate
const candidateImageInput = document.getElementById('candidateImage');
candidateImageInput.addEventListener('change', (e) => {
    const fileName = e.target.files[0]?.name;
    const fileNameDisplay = candidateImageInput.parentElement.querySelector('.file-name');
    if (fileName) {
        fileNameDisplay.textContent = `✓ ${fileName}`;
        fileNameDisplay.style.color = '#10b981';
    }
});

// Handle file upload display for recruiter
const companyImageInput = document.getElementById('companyImage');
companyImageInput.addEventListener('change', (e) => {
    const fileName = e.target.files[0]?.name;
    const fileNameDisplay = companyImageInput.parentElement.querySelector('.file-name');
    if (fileName) {
        fileNameDisplay.textContent = `✓ ${fileName}`;
        fileNameDisplay.style.color = '#10b981';
    }
});

// Add skill function
function addSkill() {
    const skillValue = skillInput.value.trim();
    
    if (skillValue === '') {
        skillInput.focus();
        return;
    }
    
    // Check if skill already exists
    if (skills.includes(skillValue)) {
        alert('This skill is already added!');
        skillInput.value = '';
        skillInput.focus();
        return;
    }
    
    // Add skill to array
    skills.push(skillValue);
    
    // Create skill tag
    const skillTag = document.createElement('span');
    skillTag.className = 'skill-tag';
    skillTag.innerHTML = `
        ${skillValue}
        <button class="remove-skill" onclick="removeSkill('${skillValue}', this)">×</button>
    `;
    
    // Add to container
    skillsContainer.appendChild(skillTag);
    
    // Clear input
    skillInput.value = '';
    skillInput.focus();
}

// Remove skill function
function removeSkill(skillValue, button) {
    // Remove from array
    skills = skills.filter(skill => skill !== skillValue);
    
    // Remove from DOM
    button.parentElement.remove();
}

// Add skill on button click
addSkillBtn.addEventListener('click', addSkill);

// Add skill on Enter key press
skillInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        e.preventDefault();
        addSkill();
    }
});

// Handle Candidate Form Submission
candidateForm.addEventListener('submit', (e) => {
    // Check if at least one skill is added
    if (skills.length === 0) {
        e.preventDefault();
        alert('Please add at least one skill!');
        return;
    }
    
    // Convert skills array to JSON and store in hidden input
    const skillsData = document.getElementById('skillsData');
    skillsData.value = JSON.stringify(skills);
    
    // Form will now submit to signup_candidate.php with all data including skills array
    console.log('Submitting candidate with skills:', skills);
});

// Handle Recruiter Form Submission
recruiterForm.addEventListener('submit', (e) => {
    // Form will submit to signup_recruiter.php with all data
    console.log('Submitting recruiter form');
});

// Add smooth animations for form inputs
const inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"]');

inputs.forEach(input => {
    input.addEventListener('focus', (e) => {
        e.target.parentElement.style.transform = 'scale(1.02)';
        e.target.parentElement.style.transition = 'transform 0.2s ease';
    });
    
    input.addEventListener('blur', (e) => {
        e.target.parentElement.style.transform = 'scale(1)';
    });
});