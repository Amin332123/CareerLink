<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Career Link</title>
    <link rel="stylesheet" href="../../public_assets/css/signup.css">
</head>

<body>
    <div class="signup-container">
        <div class="background-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>

        <div class="signup-card">
            <div class="card-header">
                <h1>Join <span>Career Link</span></h1>
                <p>Start your journey with us today</p>
            </div>

            <!-- User Type Selection -->
            <div class="user-type-selector">
                <button class="type-btn active" id="candidateBtn">
                    <span class="icon">👤</span>
                    I'm a Candidate
                </button>
                <button class="type-btn" id="recruiterBtn">
                    <span class="icon">💼</span>
                    I'm a Recruiter
                </button>
            </div>

            <!-- Candidate Form -->
            <form class="signup-form active" id="candidateForm" action="addCandidate" method="POST"
                enctype="multipart/form-data">
                <div class="form-group">
                    <label for="candidateName">Full Name</label>
                    <input type="text" id="candidateName" name="name" placeholder="Enter your full name" required>
                    <input id="role" name="role" value="candidate" type="hidden">
                </div>
                <label for="jobRole"><strong>Select your current role</strong></label>
<select id="jobRole" name="jobRole" required>
    <option value="" disabled selected>-- Choose a role --</option>
    <option value="student">Student</option>
    <option value="web_developer">Web Developer</option>
    <option value="ui_ux_designer">UI / UX Designer</option>
    <option value="mobile_developer">Mobile App Developer</option>
    <option value="backend_developer">Backend Developer</option>
    <option value="fullstack_developer">Full Stack Developer</option>
    <option value="data_scientist">Data Scientist</option>
    <option value="devops_engineer">DevOps Engineer</option>
    <option value="cybersecurity_analyst">Cybersecurity Analyst</option>
    <option value="software_engineer">Software Engineer</option>
</select>


                <div class="form-group">
                    <label for="candidateEmail">Email Address</label>
                    <input type="email" id="candidateEmail" name="email" placeholder="your.email@example.com" required>
                </div>

                <div class="form-group">
                    <label for="candidatePassword">Password</label>
                    <input type="password" id="candidatePassword" name="password" placeholder="Create a strong password"
                        required>
                </div>

                <div class="form-group">
                    <label for="candidateImage">Profile Picture</label>
                    <div class="file-upload">
                        <input type="file" id="candidateImage" name="image" accept="image/*" required>
                        <div class="file-upload-label">
                            <span class="upload-icon">📸</span>
                            <span class="upload-text">Choose an image</span>
                        </div>
                        <div class="file-name"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="skillInput">Skills</label>
                    <div class="skill-input-container">
                        <input type="text" id="skillInput" placeholder="Enter a skill (e.g., JavaScript)">
                        <button type="button" class="add-skill-btn" id="addSkillBtn">Add</button>
                    </div>
                    <div class="skills-container" id="skillsContainer"></div>
                    <!-- Hidden input to store skills array as JSON -->
                    <input type="hidden" id="skillsData" name="skills">
                </div>

                <button type="submit" class="submit-btn">Create Account</button>
            </form>

            <!-- Recruiter Form -->
            <form class="signup-form" id="recruiterForm" action="addRecruiter" method="POST"
                enctype="multipart/form-data">
                <div class="form-group">
                    <label for="recruiterName">Full Name</label>
                    <input type="text" id="recruiterName" name="name" placeholder="Enter your full name" required>
                    <input id="role" name="role" value="recruiter" type="hidden">
                </div>

                <div class="form-group">
                    <label for="recruiterEmail">Email Address</label>
                    <input type="email" id="recruiterEmail" name="email" placeholder="your.email@example.com" required>
                </div>

                <div class="form-group">
                    <label for="recruiterPassword">Password</label>
                    <input type="password" id="recruiterPassword" name="password" placeholder="Create a strong password"
                        required>
                </div>

                <div class="form-group">
                    <label for="companyName">Company Name</label>
                    <input type="text" id="companyName" name="companyName" placeholder="Enter your company name"
                        required>
                </div>

                <div class="form-group">
                    <label for="companyImage">Company Logo</label>
                    <div class="file-upload">
                        <input type="file" id="companyImage" name="companyImage" accept="image/*" required>
                        <div class="file-upload-label">
                            <span class="upload-icon">🏢</span>
                            <span class="upload-text">Choose company logo</span>
                        </div>
                        <div class="file-name"></div>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Create Account</button>
            </form>

            <div class="footer-text">
                Already have an account? <a href="login">Sign In</a>
            </div>
        </div>
    </div>

    <script src="../../public_assets/js/signup.js"></script>
</body>

</html>