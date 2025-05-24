<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Ask AI - AI-Powered JAMB Exam Assistant</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/checkbox.css" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container ask-ai-container">
        <nav class="top-nav full-width">
            <ul>
                <li><a href="index.php" ><i class="fa fa-home"></i> Home</a></li>
                <li><a href="AskAI.php" class="active"><i class="fas fa-question-circle"></i> Ask AI</a></li>
                <li><a href="feedback.php" ><i class="fa fa-pen-to-square"></i> Get Feedback</a></li>
                <li><a href="about.php"><i class="fa fa-info-circle"></i> About</a></li>
                <li><a href="contact.php"><i class="fa fa-envelope"></i> Contact</a></li>
            </ul>
        </nav>
        <div class="ask-ai-content">
            <header class="ask-ai-header">
                <h1>AI-Powered JAMB Exam Assistant</h1>
                <p class="sub-heading">Get instant answers and guidance.</p>
            </header>

            <label for="subject">Choose Subject:</label>
            <select id="subject">
                <option value="maths">Mathematics</option>
                <option value="english">English</option>
                <option value="biology">Biology</option>
                <option value="physics">Physics</option>
                <option value="ICT">ICT</option>
                <option value="Data Processing">Data Processing</option>
            </select>

            <textarea id="question" rows="5" placeholder="Enter your JAMB question here..."></textarea>

            <div class="explain-like-5-container">
                <label for="explain-like-5">Explain like I'm 5</label>
                <input type="checkbox" id="explain-like-5" name="explain-like-5" class="styled-checkbox">
            </div>

            <button onclick="askAI()" class="ask-ai-button">Ask AI</button>

            <div id="loader" style="display: none;">
                <div class="spinner"></div>
                <p>Loading AI response...</p>
            </div>

            <div id="response-box">
                <strong>AI Response:</strong>
                <div id="response"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script src="scripts/script.js"></script>
</body>
</html>