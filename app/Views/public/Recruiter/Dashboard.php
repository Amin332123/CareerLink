<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruiter Dashboard - Career Link</title>
    <link rel="stylesheet" href="../../public_assets/css/RecruiterDashboard.css">
    <style>
        /* Delete Button Styles - Added to fit the theme */
        .job-offer-card {
            position: relative;
        }

        .delete-job-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: none;
            background: rgba(255, 77, 77, 0.1);
            color: #ff4d4d;
            font-size: 22px;
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            z-index: 10;
        }

        .delete-job-btn:hover {
            background: #ff4d4d;
            color: white;
            transform: scale(1.15) rotate(90deg);
            box-shadow: 0 4px 15px rgba(255, 77, 77, 0.3);
        }

        /* Ensure card ribbons don't overlap the button */
        .card-ribbon {
            right: 50px !important; /* Move ribbon left if it was on the right */
            z-index: 5;
        }
    </style>
</head>
<body>
    <div class="background-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>

    <div class="dashboard-container">
        <header class="dashboard-header">
            <div class="welcome-section">
                <h1 class="welcome-text">
                    <span class="welcome-label">Welcome Back,</span>
                    <span class="recruiter-name">Sarah Johnson</span>
                </h1>
            </div>
            <button class="add-job-btn" id="openModalBtn">
                <span class="btn-icon">➕</span>
                Add Job Offer
            </button>
        </header>

        <div class="jobs-section">
            <h2 class="section-title">Your Job Offers</h2>
            <div class="jobs-grid">
                
                <div class="job-offer-card">
                    <button class="delete-job-btn" title="Delete Offer">&times;</button>
                    <div class="card-ribbon">Featured</div>
                    <h3 class="job-title">Senior Frontend Developer</h3>
                    <div class="job-details">
                        <div class="detail-item">
                            <span class="detail-icon">📍</span>
                            <span class="detail-text">San Francisco, CA</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-icon">💰</span>
                            <span class="detail-text">$150,000</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-icon">🏷️</span>
                            <span class="detail-text">Technology</span>
                        </div>
                    </div>
                    <div class="tags-container">
                        <span class="job-tag">Remote</span>
                        <span class="job-tag">Full-time</span>
                        <span class="job-tag">React</span>
                        <span class="job-tag">TypeScript</span>
                    </div>
                </div>

                <div class="job-offer-card">
                    <button class="delete-job-btn" title="Delete Offer">&times;</button>
                    <div class="card-ribbon">New</div>
                    <h3 class="job-title">Head Chef</h3>
                    <div class="job-details">
                        <div class="detail-item">
                            <span class="detail-icon">📍</span>
                            <span class="detail-text">New York, NY</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-icon">💰</span>
                            <span class="detail-text">$85,000</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-icon">🏷️</span>
                            <span class="detail-text">Food & Beverage</span>
                        </div>
                    </div>
                    <div class="tags-container">
                        <span class="job-tag">On-site</span>
                        <span class="job-tag">Full-time</span>
                        <span class="job-tag">5+ Years</span>
                        <span class="job-tag">Fine Dining</span>
                    </div>
                </div>

                <div class="job-offer-card">
                    <button class="delete-job-btn" title="Delete Offer">&times;</button>
                    <h3 class="job-title">Registered Nurse</h3>
                    <div class="job-details">
                        <div class="detail-item">
                            <span class="detail-icon">📍</span>
                            <span class="detail-text">Boston, MA</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-icon">💰</span>
                            <span class="detail-text">$95,000</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-icon">🏷️</span>
                            <span class="detail-text">Healthcare</span>
                        </div>
                    </div>
                    <div class="tags-container">
                        <span class="job-tag">Hospital</span>
                        <span class="job-tag">Night Shift</span>
                        <span class="job-tag">Benefits</span>
                        <span class="job-tag">BSN Required</span>
                    </div>
                </div>

                <div class="job-offer-card">
                    <button class="delete-job-btn" title="Delete Offer">&times;</button>
                    <h3 class="job-title">Financial Analyst</h3>
                    <div class="job-details">
                        <div class="detail-item">
                            <span class="detail-icon">📍</span>
                            <span class="detail-text">Chicago, IL</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-icon">💰</span>
                            <span class="detail-text">$110,000</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-icon">🏷️</span>
                            <span class="detail-text">Finance</span>
                        </div>
                    </div>
                    <div class="tags-container">
                        <span class="job-tag">Hybrid</span>
                        <span class="job-tag">Full-time</span>
                        <span class="job-tag">Excel</span>
                        <span class="job-tag">CPA Preferred</span>
                    </div>
                </div>

                <div class="job-offer-card">
                    <button class="delete-job-btn" title="Delete Offer">&times;</button>
                    <div class="card-ribbon">Urgent</div>
                    <h3 class="job-title">Marketing Manager</h3>
                    <div class="job-details">
                        <div class="detail-item">
                            <span class="detail-icon">📍</span>
                            <span class="detail-text">Austin, TX</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-icon">💰</span>
                            <span class="detail-text">$105,000</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-icon">🏷️</span>
                            <span class="detail-text">Marketing</span>
                        </div>
                    </div>
                    <div class="tags-container">
                        <span class="job-tag">Remote</span>
                        <span class="job-tag">Full-time</span>
                        <span class="job-tag">SEO</span>
                        <span class="job-tag">Content Strategy</span>
                    </div>
                </div>

                <div class="job-offer-card">
                    <button class="delete-job-btn" title="Delete Offer">&times;</button>
                    <h3 class="job-title">Software Engineer</h3>
                    <div class="job-details">
                        <div class="detail-item">
                            <span class="detail-icon">📍</span>
                            <span class="detail-text">Seattle, WA</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-icon">💰</span>
                            <span class="detail-text">$140,000</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-icon">🏷️</span>
                            <span class="detail-text">Technology</span>
                        </div>
                    </div>
                    <div class="tags-container">
                        <span class="job-tag">Remote</span>
                        <span class="job-tag">Full-time</span>
                        <span class="job-tag">Python</span>
                        <span class="job-tag">AWS</span>
                        <span class="job-tag">Docker</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="modalOverlay">
        <div class="modal-container">
            <div class="modal-header">
                <h2 class="modal-title">
                    <span class="title-icon">✨</span>
                    Create New Job Offer
                </h2>
                <button class="close-btn" id="closeModalBtn">&times;</button>
            </div>

            <form class="job-form" id="jobForm" action="add_job_offer.php" method="POST">
                <div class="form-group">
                    <label for="jobTitle">
                        <span class="label-icon">💼</span>
                        Job Title
                    </label>
                    <input 
                        type="text" 
                        id="jobTitle" 
                        name="title" 
                        placeholder="e.g., Senior Frontend Developer" 
                        required
                    >
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="location">
                            <span class="label-icon">📍</span>
                            Location
                        </label>
                        <input 
                            type="text" 
                            id="location" 
                            name="location" 
                            placeholder="e.g., New York, Remote" 
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="category">
                            <span class="label-icon">🏷️</span>
                            Category
                        </label>
                        <select id="category" name="category" required>
                            <option value="" disabled selected>Select category</option>
                            <option value="Technology">Technology</option>
                            <option value="Food & Beverage">Food & Beverage</option>
                            <option value="Healthcare">Healthcare</option>
                            <option value="Finance">Finance</option>
                            <option value="Education">Education</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="salary">
                        <span class="label-icon">💰</span>
                        Annual Salary
                    </label>
                    <input 
                        type="number" 
                        id="salary" 
                        name="salary" 
                        placeholder="e.g., 120000" 
                        min="0"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="tagSelect">
                        <span class="label-icon">🏷️</span>
                        Select Tags
                    </label>
                    <select id="tagSelect" class="tag-select">
                        <option value="" disabled selected>Choose a tag...</option>
                        <option value="Remote">Remote</option>
                        <option value="On-site">On-site</option>
                        <option value="Hybrid">Hybrid</option>
                        <option value="Full-time">Full-time</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Contract">Contract</option>
                        <option value="Internship">Internship</option>
                        <option value="Benefits">Benefits</option>
                        <option value="Health Insurance">Health Insurance</option>
                        <option value="401k">401k</option>
                        <option value="Flexible Hours">Flexible Hours</option>
                        <option value="Paid Time Off">Paid Time Off</option>
                        <option value="Professional Development">Professional Development</option>
                        <option value="Stock Options">Stock Options</option>
                        <option value="Bonus">Bonus</option>
                        <option value="Entry Level">Entry Level</option>
                        <option value="Mid Level">Mid Level</option>
                        <option value="Senior Level">Senior Level</option>
                        <option value="Leadership">Leadership</option>
                        <option value="Team Lead">Team Lead</option>
                        <option value="Html">Html</option>
                    </select>
                    <div class="modal-tags-container" id="modalTagsContainer"></div>
                    <input type="hidden" id="tagsData" name="tags">
                </div>

                <div class="form-actions">
                    <button type="button" class="cancel-btn" id="cancelBtn">Cancel</button>
                    <button type="submit" class="submit-btn">
                        <span class="submit-icon">🚀</span>
                        Create Job Offer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="../../public_assets/js/RecruiterDashboard.js"></script>
</body>
</html>