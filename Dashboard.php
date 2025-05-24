<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'jamb_prep';

// Establish database connection
$conn = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch a random question from the database
$sql = "SELECT * FROM questions ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

$dailyQuestion = "";
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    //var_dump($row);
    $dailyQuestion = $row["question_text"];
    $subject = $row["subject"];
    $options = $row["options"];
} else {
    $dailyQuestion = "No questions available in the database.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AI-Powered JAMB Exam Assistant</title>
    <link rel="stylesheet" href="css/dashboard.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body> 
    <div class="dashboard-container">
        <nav class="top-nav full-width">
            <ul>
                <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="AskAI.php"><i class="fa fa-question-circle"></i> Ask AI</a></li>
                <li><a href="feedback.php"><i class="fa fa-pen-to-square"></i> Get Feedback</a></li>
                <li><a href="about.php"><i class="fa fa-info-circle"></i> About</a></li>
                <li><a href="contact.php"><i class="fa fa-envelope"></i> Contact</a></li>
            </ul>
        </nav>

        <div class="dashboard-content">
            <section id="question-of-the-day">
                <h2>Question of the Day</h2>
                <p id="subject" style="display: none;"> <?php echo $subject; ?> </p>
                <div class="question-card">
                    <p id="daily-question"> <?php echo $dailyQuestion; ?> </p>
                    <p id="options"><?php echo $options; ?></p>
                </div>
            </section>

            <section id="feedback-section">
                <h2>Provide Your Answer</h2>
                <textarea id="answer" rows="5" placeholder="Enter your answer here..."></textarea>
                <button id="review-button">Review</button>
                <div id="loading-indicator" class="loading-spinner"></div>
                <div id="feedback-display" style="display: display;">
                    <h3>AI Feedback:</h3>
                    <div id="feedback-text">AI feedback will appear here!</div>
                </div>
            </section>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script src="scripts/dashboard.js"></script>
</body>
</html>