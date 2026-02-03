<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Career Link</title>
    <link rel="stylesheet" href="app/Views/public_assets/css/UserDashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Animated Background -->
        <div class="background-animation">
            <div class="blob blob-1"></div>
            <div class="blob blob-2"></div>
            <div class="blob blob-3"></div>
        </div>

        <!-- Header Section -->
        <header class="dashboard-header">
            <div class="user-info">
                <div class="user-avatar">
                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=6366f1&color=fff&size=80" alt="User Avatar">
                    <div class="status-indicator"></div>
                </div>
                <div class="user-details">
                    <h1 class="user-name">John Doe</h1>
                    <p class="user-role">Software Developer</p>
                </div>
            </div>
            <div class="header-actions">
                <button class="notification-btn">
                    <span class="icon">🔔</span>
                    <span class="badge">3</span>
                </button>
                <button class="profile-btn">Profile</button>
            </div>
        </header>

        <!-- Welcome Section -->
        <section class="welcome-section">
            <h2 class="section-title">Available Opportunities</h2>
            <p class="section-subtitle">Discover your next career move</p>
        </section>

        <!-- Job Cards Grid -->
        <div class="jobs-grid">
            <!-- Job Card 1 -->
            <div class="job-card">
                <div class="card-header">
                    <div class="company-logo">
                        <img src="https://ui-avatars.com/api/?name=Tech+Corp&background=gradient&size=60" alt="Tech Corp">
                    </div>
                    <div class="bookmark-btn">
                        <span>⭐</span>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="job-title">Senior Frontend Developer</h3>
                    <div class="job-meta">
                        <span class="recruiter">👤 Sarah Johnson</span>
                        <span class="company">🏢 Tech Corp</span>
                    </div>
                    <div class="salary-badge">
                        <span class="salary-icon">💰</span>
                        <span class="salary-amount">$120,000 - $150,000</span>
                    </div>
                    <div class="job-tags">
                        <span class="tag">Remote</span>
                        <span class="tag">Full-time</span>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="read-more-btn">
                        Read More
                        <span class="arrow">→</span>
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

            <div class="modal-tags" id="modalTags"></div>
        </div>

        <div class="modal-footer">
            <button class="apply-btn">Apply for job</button>
        </div>
    </div>
</div>

    <script src="app/Views/public_assets/js/userDashboard.js"></script>
</body>
</html>