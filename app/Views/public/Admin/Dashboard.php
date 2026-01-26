<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - CareerLink</title>
    <link rel="stylesheet" href="../../public_assets/css/AdminDashboard.css">
</head>
<body>
    <!-- Header -->
    <header class="admin-header">
        <div class="logo">
            <span class="logo-icon">🔗</span>
            <h1>Career<span>Link</span></h1>
        </div>
        <button class="logout-btn">
            <span class="logout-icon">🚪</span>
            Log Out
        </button>
    </header>

    <!-- Main Container -->
    <div class="admin-container">
        <!-- Action Buttons Section -->
        <div class="action-section">
            <div class="left-actions">
                <button class="action-btn show-btn" id="showTagsBtn">
                    <span class="btn-icon">👁️</span>
                    Show Tags
                </button>
                <button class="action-btn show-btn" id="showCategoriesBtn">
                    <span class="btn-icon">👁️</span>
                    Show Categories
                </button>
            </div>
            <div class="right-actions">
                <button class="action-btn create-btn" id="createTagBtn">
                    <span class="btn-icon">➕</span>
                    Create Tag
                </button>
                <button class="action-btn create-btn" id="createCategoryBtn">
                    <span class="btn-icon">➕</span>
                    Create Category
                </button>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="statistics-section">
            <div class="stat-left">
                <div class="users-circles">
                    <div class="user-circle recruiters-circle">
                        <div class="circle-content">
                            <span class="circle-icon">💼</span>
                            <h3 class="circle-number"><?php echo $data['recruiters_count']; ?></h3>
                            <p class="circle-label">Recruiters</p>
                        </div>
                    </div>
                    <div class="user-circle candidates-circle">
                        <div class="circle-content">
                            <span class="circle-icon">👥</span>
                            <h3 class="circle-number">1,890</h3>
                            <p class="circle-label">Candidates</p>
                        </div>
                    </div>
                </div>
                <div class="total-users">
                    <h2 class="total-number">2,135</h2>
                    <p class="total-label">Total Users</p>
                </div>
            </div>

            <div class="stat-right">
                <div class="stat-card">
                    <div class="categories-circle">
                        <div class="circle-content">
                            <span class="circle-icon">🏷️</span>
                            <h3 class="circle-number">12</h3>
                            <p class="circle-label">Categories</p>
                        </div>
                    </div>
                    <div class="stat-total">
                        <h2 class="stat-number">487</h2>
                        <p class="stat-label">Total Job Offers</p>
                    </div>
                </div>

                <div class="stat-card applications-card">
                    <div class="applications-circle">
                        <div class="circle-content">
                            <span class="circle-icon">📋</span>
                            <h3 class="circle-number">3,245</h3>
                            <p class="circle-label">Applications</p>
                        </div>
                    </div>
                    <p class="applications-subtitle">Total applications received</p>
                </div>
            </div>
        </div>

        <!-- Job Offers Section -->
        <div class="jobs-section">
            <h2 class="section-title">All Job Offers</h2>
            <div class="jobs-grid">
                <!-- Job Card 1 -->
                <div class="job-card">
                    <h3 class="job-title">Senior Frontend Developer</h3>
                    <div class="job-info">
                        <div class="info-item">
                            <span class="info-icon">👤</span>
                            <span>Sarah Johnson</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">🏢</span>
                            <span>Tech Corp</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">💰</span>
                            <span>$150,000</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">📍</span>
                            <span>San Francisco, CA</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">🏷️</span>
                            <span>Technology</span>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="tag">Remote</span>
                        <span class="tag">Full-time</span>
                        <span class="tag">React</span>
                    </div>
                    <button class="read-more-btn" onclick="openJobDetails(0)">
                        Read More
                        <span class="arrow">→</span>
                    </button>
                </div>

                <!-- Job Card 2 -->
                <div class="job-card">
                    <h3 class="job-title">Head Chef</h3>
                    <div class="job-info">
                        <div class="info-item">
                            <span class="info-icon">👤</span>
                            <span>Michael Chen</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">🏢</span>
                            <span>Fine Dining Co</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">💰</span>
                            <span>$85,000</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">📍</span>
                            <span>New York, NY</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">🏷️</span>
                            <span>Food & Beverage</span>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="tag">On-site</span>
                        <span class="tag">Full-time</span>
                        <span class="tag">Experience Required</span>
                    </div>
                    <button class="read-more-btn" onclick="openJobDetails(1)">
                        Read More
                        <span class="arrow">→</span>
                    </button>
                </div>

                <!-- Job Card 3 -->
                <div class="job-card">
                    <h3 class="job-title">Data Scientist</h3>
                    <div class="job-info">
                        <div class="info-item">
                            <span class="info-icon">👤</span>
                            <span>Emily Rodriguez</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">🏢</span>
                            <span>Data Labs Inc</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">💰</span>
                            <span>$140,000</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">📍</span>
                            <span>Boston, MA</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">🏷️</span>
                            <span>Technology</span>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="tag">Remote</span>
                        <span class="tag">Full-time</span>
                        <span class="tag">Python</span>
                        <span class="tag">ML</span>
                    </div>
                    <button class="read-more-btn" onclick="openJobDetails(2)">
                        Read More
                        <span class="arrow">→</span>
                    </button>
                </div>

                <!-- Job Card 4 -->
                <div class="job-card">
                    <h3 class="job-title">Marketing Manager</h3>
                    <div class="job-info">
                        <div class="info-item">
                            <span class="info-icon">👤</span>
                            <span>David Kim</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">🏢</span>
                            <span>Marketing Pro</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">💰</span>
                            <span>$105,000</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">📍</span>
                            <span>Austin, TX</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">🏷️</span>
                            <span>Marketing</span>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="tag">Hybrid</span>
                        <span class="tag">Full-time</span>
                        <span class="tag">SEO</span>
                    </div>
                    <button class="read-more-btn" onclick="openJobDetails(3)">
                        Read More
                        <span class="arrow">→</span>
                    </button>
                </div>

                <!-- Job Card 5 -->
                <div class="job-card">
                    <h3 class="job-title">Registered Nurse</h3>
                    <div class="job-info">
                        <div class="info-item">
                            <span class="info-icon">👤</span>
                            <span>Lisa Anderson</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">🏢</span>
                            <span>City Hospital</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">💰</span>
                            <span>$95,000</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">📍</span>
                            <span>Chicago, IL</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">🏷️</span>
                            <span>Healthcare</span>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="tag">On-site</span>
                        <span class="tag">Full-time</span>
                        <span class="tag">Benefits</span>
                    </div>
                    <button class="read-more-btn" onclick="openJobDetails(4)">
                        Read More
                        <span class="arrow">→</span>
                    </button>
                </div>

                <!-- Job Card 6 -->
                <div class="job-card">
                    <h3 class="job-title">Financial Analyst</h3>
                    <div class="job-info">
                        <div class="info-item">
                            <span class="info-icon">👤</span>
                            <span>James Wilson</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">🏢</span>
                            <span>Finance Group</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">💰</span>
                            <span>$110,000</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">📍</span>
                            <span>Seattle, WA</span>
                        </div>
                        <div class="info-item">
                            <span class="info-icon">🏷️</span>
                            <span>Finance</span>
                        </div>
                    </div>
                    <div class="job-tags">
                        <span class="tag">Hybrid</span>
                        <span class="tag">Full-time</span>
                        <span class="tag">Excel</span>
                    </div>
                    <button class="read-more-btn" onclick="openJobDetails(5)">
                        Read More
                        <span class="arrow">→</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Tag Modal -->
    <div class="modal-overlay" id="createTagModal">
        <div class="modal-box">
            <div class="modal-header">
                <h2>Create New Tag</h2>
                <button class="close-modal-btn" onclick="closeModal('createTagModal')">×</button>
            </div>
            <form class="modal-form" id="tagForm">
                <input type="text" name="tagName" id="tagName" placeholder="Enter tag name..." required>
                <button type="submit" class="submit-modal-btn">Create Tag</button>
            </form>
        </div>
    </div>

    <!-- Create Category Modal -->
    <div class="modal-overlay" id="createCategoryModal">
        <div class="modal-box">
            <div class="modal-header">
                <h2>Create New Category</h2>
                <button class="close-modal-btn" onclick="closeModal('createCategoryModal')">×</button>
            </div>
            <form class="modal-form" id="createCategory">
                <input type="text" name="CategoryName" id="CategoryName" placeholder="Enter category name..." required>
                <input type="submit" class="submit-modal-btn" value="Create Category">
            </form>
        </div>
    </div>

    <!-- Show Tags Modal -->
    <div class="modal-overlay" id="showTagsModal">
        <div class="modal-box wide-modal">
            <div class="modal-header">
                <h2>All Tags</h2>
                <button class="close-modal-btn" onclick="closeModal('showTagsModal')">×</button>
            </div>
            <div class="tags-display" id="tagsDisplay">
                
                
            </div>
        </div>
    </div>

    <!-- Show Categories Modal -->
    <div class="modal-overlay" id="showCategoriesModal">
        <div class="modal-box wide-modal">
            <div class="modal-header">
                <h2>All Categories</h2>
                <button class="close-modal-btn" onclick="closeModal('showCategoriesModal')">×</button>
            </div>
            <div class="tags-display" id="categoriesDisplay">
                
               
            </div>
        </div>
    </div>

    <!-- Job Details Modal -->
    <div class="modal-overlay" id="jobDetailsModal">
        <div class="modal-box large-modal">
            <div class="modal-header">
                <h2 id="jobDetailTitle">Job Details</h2>
                <button class="close-modal-btn" onclick="closeModal('jobDetailsModal')">×</button>
            </div>
            <div class="job-details-content" id="jobDetailsContent">
                <!-- Will be populated by JavaScript -->
            </div>
        </div>
    </div>

    <script src="../../public_assets/js/AdminDashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>