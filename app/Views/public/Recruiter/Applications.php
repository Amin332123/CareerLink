<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Review Dashboard</title>
    <link rel="stylesheet" href="app/Views/public_assets/css/recruiterApplications.css">
</head>
<body>
    <div class="container">

        <!-- Header Section -->
        <header class="dashboard-header">
            <div class="user-info">
                <div class="user-avatar">
                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=6366f1&color=fff&size=80" alt="User Avatar">
                    <div class="status-indicator"></div>
                </div>
                <div class="user-details">
                    <h1 class="user-name">John Doe</h1>
                    <p class="user-role">Company Recruiter</p>
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

        <div class="applications-table">
            <div class="table-header">
                <span>Photo</span>
                <span>Full Name</span>
                <span>Job Position</span>
                <span>Actions</span>
            </div>

            <div class="application-row">
                <img src="https://i.pravatar.cc/150?img=1" alt="Profile" class="profile-pic">
                <span class="full-name">John Anderson</span>
                <span class="job-title">Senior Software Engineer</span>
                <div class="action-buttons">
                    <button class="btn btn-accept" onclick="acceptApplication('John Anderson')">Accept</button>
                    <button class="btn btn-refuse" onclick="openRefuseModal('John Anderson')">Refuse</button>
                </div>
            </div>

            <div class="application-row">
                <img src="https://i.pravatar.cc/150?img=5" alt="Profile" class="profile-pic">
                <span class="full-name">Sarah Martinez</span>
                <span class="job-title">Product Manager</span>
                <div class="action-buttons">
                    <button class="btn btn-accept" onclick="acceptApplication('Sarah Martinez')">Accept</button>
                    <button class="btn btn-refuse" onclick="openRefuseModal('Sarah Martinez')">Refuse</button>
                </div>
            </div>

            <div class="application-row">
                <img src="https://i.pravatar.cc/150?img=8" alt="Profile" class="profile-pic">
                <span class="full-name">Michael Chen</span>
                <span class="job-title">UX Designer</span>
                <div class="action-buttons">
                    <button class="btn btn-accept" onclick="acceptApplication('Michael Chen')">Accept</button>
                    <button class="btn btn-refuse" onclick="openRefuseModal('Michael Chen')">Refuse</button>
                </div>
            </div>

            <div class="application-row">
                <img src="https://i.pravatar.cc/150?img=9" alt="Profile" class="profile-pic">
                <span class="full-name">Emily Thompson</span>
                <span class="job-title">Data Analyst</span>
                <div class="action-buttons">
                    <button class="btn btn-accept" onclick="acceptApplication('Emily Thompson')">Accept</button>
                    <button class="btn btn-refuse" onclick="openRefuseModal('Emily Thompson')">Refuse</button>
                </div>
            </div>

            <div class="application-row">
                <img src="https://i.pravatar.cc/150?img=12" alt="Profile" class="profile-pic">
                <span class="full-name">David Wilson</span>
                <span class="job-title">Marketing Specialist</span>
                <div class="action-buttons">
                    <button class="btn btn-accept" onclick="acceptApplication('David Wilson')">Accept</button>
                    <button class="btn btn-refuse" onclick="openRefuseModal('David Wilson')">Refuse</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Refuse Modal -->
    <div id="refuseModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                Refuse Application
            </div>
            <div class="modal-body">
                <label for="refuseReason">Reason for rejection:</label>
                <textarea id="refuseReason" placeholder="Please provide a reason for refusing this application..."></textarea>
            </div>
            <div class="modal-footer">
                <button class="btn btn-cancel" onclick="closeRefuseModal()">Cancel</button>
                <button class="btn btn-submit" onclick="submitRefusal()">Submit</button>
            </div>
        </div>
    </div>

    <script src="app/Views/public_assets/js/recruiterApplications.js"></script>
</body>
</html>