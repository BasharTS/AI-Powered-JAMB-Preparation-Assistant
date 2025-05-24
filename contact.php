<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - AI-Powered JAMB Exam Assistant</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/contact.css">
    
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
                <li><a href="contact.php" class="active"><i class="fa fa-envelope"></i> Contact</a></li>
            </ul>
        </nav>

        <div class="dashboard-content">
            <section class="contact-section">
                <div class="contact-content">
                    <h2>Contact Us</h2>
                    <p>We'd love to hear from you! If you have any questions, feedback, or suggestions regarding the JAMB Exam Assistant, please don't hesitate to reach out.</p>

                    <h3>Contact Information</h3>
                    <ul>
                        <li><i class="fas fa-envelope"></i> Email: <a href="mailto:bashartukurshehu@gmail.com">bashartukurshehu@gmail.com</a></li>
                        <li><i class="fas fa-phone"></i> Phone: <a href="tel:+2348068775432">+2348068775432</a></li>
                        <li><i class="fas fa-map-marker-alt"></i> Address: Birnin Kebbi, Kebbi State, Nigeria</li>
                    </ul>

                    <h3>Send Us a Message</h3>
                    <div class="contact-form">
                        <h3>Contact Form</h3>
                        <form action="#" method="post">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required>

                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>

                            <label for="subject">Subject:</label>
                            <input type="text" id="subject" name="subject">

                            <label for="message">Message:</label>
                            <textarea id="message" name="message" rows="5" required></textarea>

                            <button type="submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>