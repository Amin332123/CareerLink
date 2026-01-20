<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recommended Jobs - Career Link</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public_assets/css/recommendedJobs.css">
</head>
<body>

<div class="page-container">

    <!-- Background -->
    <div class="background-animation">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>

    <!-- Header -->
    <header class="page-header">
        <h1>Recommended Job Offers</h1>
        <p>Hand-picked opportunities based on your profile</p>
    </header>

    <!-- Jobs -->
    <div class="jobs-grid">

        <div class="job-card">
            <div class="card-header">
                <div class="company-logo">
                    <img src="https://ui-avatars.com/api/?name=Next+Tech&background=6366f1&color=fff&size=60">
                </div>
                <div class="bookmark-btn">⭐</div>
            </div>

            <div class="card-body">
                <h3 class="job-title">Junior Web Developer</h3>

                <div class="job-meta">
                    <span class="recruiter">👤 Recruiter: Adam Lee</span>
                    <span class="company">🏢 Next Tech</span>
                </div>

                <div class="salary-badge">
                    <span class="salary-icon">💰</span>
                    <span class="salary-amount">$70,000 – $90,000</span>
                </div>

                <div class="job-tags">
                    <span class="tag">Remote</span>
                    <span class="tag">Full-time</span>
                </div>
            </div>

            <div class="card-footer">
                <button class="read-more-btn">
                    Read More <span class="arrow">→</span>
                </button>
            </div>
        </div>

        <!-- Duplicate cards as needed -->
        <div class="job-card">
            <div class="card-header">
                <div class="company-logo">
                    <img src="https://ui-avatars.com/api/?name=Creative+Labs&background=ec4899&color=fff&size=60">
                </div>
                <div class="bookmark-btn">⭐</div>
            </div>

            <div class="card-body">
                <h3 class="job-title">UI / UX Designer</h3>

                <div class="job-meta">
                    <span class="recruiter">👤 Recruiter: Lina Gomez</span>
                    <span class="company">🏢 Creative Labs</span>
                </div>

                <div class="salary-badge">
                    <span class="salary-icon">💰</span>
                    <span class="salary-amount">$85,000 – $110,000</span>
                </div>

                <div class="job-tags">
                    <span class="tag">Hybrid</span>
                    <span class="tag">Contract</span>
                </div>
            </div>

            <div class="card-footer">
                <button class="read-more-btn">
                    Read More <span class="arrow">→</span>
                </button>
            </div>
        </div>

    </div>
</div>
<!-- Job Details Modal -->
<div class="job-modal-overlay" id="jobModal">
    <div class="job-modal">
        <button class="modal-close">&times;</button>

        <div class="modal-header">
            <img id="modalCompanyLogo" src="" alt="Company Logo">
            <div>
                <h2 id="modalJobTitle"></h2>
                <p id="modalCompany"></p>
            </div>
        </div>

        <div class="modal-body">
            <p><strong>Recruiter:</strong> <span id="modalRecruiter"></span></p>
            <p><strong>Salary:</strong> <span id="modalSalary"></span></p>

            <p class="job-description" id="modalDescription">
                This role is recommended for you based on your profile, skills, and recent activity.
                You will work with a dynamic team on real-world projects and modern technologies.
            </p>

            <div class="modal-tags" id="modalTags"></div>
        </div>

        <div class="modal-footer">
            <button class="apply-btn">Apply for job</button>
        </div>
    </div>
</div>

<script src="../../public_assets/js/recommendedJobs.js"></script>
</body>
</html>
