<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareCrafter Web</title>
    <link rel="stylesheet" href="css/user.css">
</head>
<body>
    <div class="dashboard">
        <nav class="nav-links">
            <ul>
                <li><a href="#home" >Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#account">Account</a></li>
                <li><a href="#feedbacks">Feedbacks</a></li>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-link">Logout</button>
                </form>
                </li>
            </ul>
        </nav>
    </div>
    
    <div id="home" class="section">
       <h1 class="home-title">Welcome to CareCrafter</h1>
       <p class="home-subtitle">your personal health companion.</p>
    </div>

    <div id="features" class="section">
        <h1>Features</h1>
        <div class="cards-container">
            <div class="card" id="step-tracker-card">
                <img src="whiterun.png" alt="Step Tracker">
                <h3>Step Tracker</h3>
            </div>
            <div class="card" id="sleep-tracker-card">
                <img src="whitesleep.png" alt="Sleep Tracker">
                <h3>Sleep Tracker</h3>
            </div>
            <div class="card" id="water-intake-card">
                <img src="whitedrink.png" alt="Water Intake">
                <h3>Water Intake Reminder</h3>
            </div>
            <div class="card" id="health-journal-card">
                <img src="whiteeat.png" alt="Health Journal">
                <h3>Health Journal</h3>
            </div>
        </div>
    </div>
    
    <div id="step-tracker" class="section">
        <div class="tracker-container">
            <div class="tracker-box">
                <h2>Daily step count</h2>
                <p>Description Description</p>
                <div class="button-container">
                    <button class="create-btn">Add</button>
                    <button class="edit-btn">Edit</button>
                    <button class="delete-btn">Delete</button>
                </div>
            </div>
            <div class="tracker-box">
                <h2>History</h2>
                <p>Description Description</p>
                <div class="button-container">
                    <button class="create-btn">Add</button>
                    <button class="edit-btn">Edit</button>
                    <button class="delete-btn">Delete</button>
                </div>
            </div>
            <div class="tracker-box">
                <h2>Goal Progress</h2>
                <p>Description Description</p>
                <div class="button-container">
                    <button class="create-btn">Add</button>
                    <button class="edit-btn">Edit</button>
                    <button class="delete-btn">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div id="sleep-tracker" class="section">
        <div class="container">
            <div class="box">
                <h2>Log Your Sleep</h2>
                <div class="sleep-log-form">
                    <form id="sleep-form">
                        <label for="sleep-date">Date</label>
                        <input type="date" id="sleep-date" name="sleep-date">
                        <label for="sleep-duration">Duration</label>
                        <input type="number" id="sleep-duration" name="sleep-duration" placeholder="Hours">
                        <label for="sleep-quality">Quality</label>
                        <select id="sleep-quality" name="sleep-quality">
                            <option value="poor">Poor</option>
                            <option value="fair">Fair</option>
                            <option value="good">Good</option>
                            <option value="excellent">Excellent</option>
                        </select>
                        <button type="submit" class="submit-btn">Log Sleep</button>
                    </form>
                </div>
            </div>
            <div class="box">
                <h2>Sleep History</h2>
                <div class="sleep-history">
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Duration</th>
                                <th>Quality</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sleep entries will be populated here dynamically -->

                        </tbody>
                    </table>
                            <!-- dito malalagay yung mga data na iinput -->
                            <!-- pwede mo tanggalin tong box kasi sample lang to -->
                    <div class="tab-body">
                                <!-- tsangaalin to -->
                    </div>

                </div>
            </div>
            <div class="box">
                <h2>Sleep Trends</h2>
                <div class="sleep-trends">
                    <!-- Charts or graphs for sleep trends will be displayed here -->
                    <div class="tab-body">
                        <!-- tsangaalin to -->
                    </div>
                </div>
                <div class="sleep-actions">
                    <button id="edit-sleep-btn">Edit Entry</button>
                    <button id="delete-sleep-btn">Delete Entry</button>
                </div>
            </div>
        </div>
    
    </div>
    
    
    <div id="water-intake" class="section">
        <div class="reminder-box">
            <h1>Water Intake Reminder</h1>
            <div id="reminder-form">
                <h2>Create Reminder</h2>
                <form id="reminder-form">
                    <label for="target-intake">Daily goal (ounces/liters):</label>
                    <input type="number" id="target-intake" name="target-intake" required>
    
                    <label for="reminder-frequency">Frequency:</label>
                    <select id="reminder-frequency" name="reminder-frequency" required>
                        <option value="hourly">Every Hour</option>
                        <option value="two-hourly">Every Two Hours</option>
                    </select>
    
                    <label for="reminder-time-start">Start time:</label>
                    <input type="time" id="reminder-time-start" name="reminder-time-start" required>
    
                    <label for="reminder-time-end">End time:</label>
                    <input type="time" id="reminder-time-end" name="reminder-time-end" required>
    
                    <button type="submit" class="submit-btn">Save</button>
                </form>
            </div>
        </div>
    
        <div class="reminder-box">
            <div id="reminder-display">
                <h2>Read Reminder</h2>
                <p>Water intake progress:</p>
                <!-- Progress bars, graphs, etc. -->
    
                <p>Reminders:</p>
                <ul id="reminder-list">
                    <!-- Dynamic reminders here -->
                </ul>
            </div>
    
            <div id="update-reminder">
                <h2>Update Reminder</h2>
                <!-- Update form -->
            </div>
    
            <div id="delete-reminder">
                <h2>Delete Reminder</h2>
                <!-- Delete form -->
            </div>
        </div>
    </div>
    

    <div id="health-journal" class="section">
        <h1>Health Journal</h1>
    </div>

    <div id="account" class="section">Account</div>
    <div id="feedbacks" class="section">Feedbacks</div>
        <div class="container">
            <form id="feedback-form" action="#" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="feedback">Feedback:</label>
                    <textarea id="feedback" name="feedback" rows="5" required></textarea>
                </div>
                <button type="submit">Submit Feedback</button>
            </form>
        </div>
    </div>

    <script src = "/js/user.js"></script>
</body>
</html>