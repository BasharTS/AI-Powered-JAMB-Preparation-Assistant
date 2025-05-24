<?php
// Database connection details
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

$sql = "SELECT * FROM questions ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

$dailyQuestion = "";
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $question = $row["question_text"];
    $subject = $row["subject"];
    $options = $row["options"];
} else {
    $question = "No questions available in the database.";
}

//var_dump($row);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI-Powered JAMB Exam Assistant - Get Feedback</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link type="text/css" rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="dashboard-container">
        <nav class="top-nav full-width">
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="AskAI.php"><i class="fas fa-question-circle"></i> Ask AI</a></li>
                <li><a href="feedback.php" class="active"><i class="fas fa-pen-to-square"></i> Get Feedback</a></li>
                <li><a href="about.php"><i class="fas fa-info-circle"></i> About</a></li>
                <li><a href="contact.php"><i class="fas fa-envelope"></i> Contact</a></li>
            </ul>
        </nav>

        <div class="dashboard-content">
            <section id="question-of-the-day">
                <h2>Question for Feedback</h2>
                <p id="subject">Subject: <?php echo $subject; ?> </p>
                <div class="question-card">
                    <p id="question"><?php echo $question; ?></p>
                    <p id="options"><?php echo $options; ?></p>
                </div>
            </section>

            <section id="feedback-section">
                <h2>Provide Your Answer</h2>
                <textarea id="answer" rows="5" placeholder="Enter your answer here..."></textarea>
                <button id="review-button">Review</button>
                <div id="loading-indicator" class="loading-spinner"></div>
                <div id="response-box">
                    <strong>AI Feedback:</strong>
                    <div id="response">  </div>
                </div>
            </section>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script src="scripts/feedback.js"></script>

</body>
</html>