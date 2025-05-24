document.addEventListener('DOMContentLoaded', function() {
    /*function fetchDailyQuestion() {
        
        //Will later be fetch from the database
        const questions = [
            "What are the key differences between RAM and ROM in a computer system?",
            "Explain the concept of inheritance in object-oriented programming.",
            "Describe the function of a router in a network.",
            "What are the main principles of data processing?",
            "Explain the importance of user interface design in ICT.",
            "How is data different from information.",
            "What is a network"
        ];
        const randomIndex = Math.floor(Math.random() * questions.length);
        document.getElementById('daily-question').textContent = questions[randomIndex];
    }

    fetchDailyQuestion();*/

    const reviewButton = document.getElementById('review-button');
    const answerTextarea = document.getElementById('answer');
    const feedbackDisplay = document.getElementById('feedback-display');
    const feedbackTextElement = document.getElementById('feedback-text');
    const loadingIndicator = document.getElementById('loading-indicator');
    const subjectElement = document.getElementById('subject');
    const optionsElement = document.getElementById('options');

    reviewButton.addEventListener('click', async function() {
        const userAnswer = answerTextarea.value.trim();
        const dailyQuestion = document.getElementById('daily-question').textContent.trim();
        const optionsValue = subjectElement.textContent.trim();
        const subjectValue = optionsElement.textContent.trim();

        if (!userAnswer) {
            alert('Please provide your answer before reviewing.');
            return;
        }

        // Show loading state
        reviewButton.disabled = true;
        loadingIndicator.style.display = 'block'; 
        feedbackTextElement.textContent = 'Loading feedback...'; 
        feedbackDisplay.style.display = 'block';

        try {
            const formData = new FormData();
            formData.append('question', dailyQuestion);
            formData.append('answer', userAnswer);
            formData.append('subject', subjectValue);
            formData.append('options', options);

            const response = await fetch('process_feedback.php', {
                method: 'POST',
                body: formData,
            });

            if (!response.ok) {
                const errorData = await response.text();
                throw new Error(`Backend error: ${response.status} - ${errorData}`);
            }

            const data = await response.json();

            if (data.error) {
                feedbackTextElement.textContent = `AI Feedback Error: ${data.error}`;
            } else if (data.feedback) {
                // Convert markdown to HTML
                const html = marked.parse(data.feedback.trim());
                feedbackTextElement.innerHTML = html;
            } else {
                feedbackTextElement.textContent = 'No feedback received from the AI.';
            }
        } catch (error) {
            console.error('Error sending feedback for review:', error);
            feedbackTextElement.textContent = 'Error: ${error.message}';
        } finally {
            reviewButton.disabled = false;
            loadingIndicator.style.display = 'none';
            reviewButton.textContent = 'Review';
        }

    });
});