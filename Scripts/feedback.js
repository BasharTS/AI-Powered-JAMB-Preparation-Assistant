document.addEventListener('DOMContentLoaded', function() {
    const reviewButton = document.getElementById('review-button');
    const answerTextarea = document.getElementById('answer');
    const responseDisplay = document.getElementById('response');
    const loadingIndicator = document.getElementById('loading-indicator');
    const questionElement = document.getElementById('question');
    const subjectElement = document.getElementById('subject');
    const optionsElement = document.getElementById('options');

    reviewButton.addEventListener('click', async function() {
        const userAnswer = answerTextarea.value.trim();
        const question = questionElement.textContent.trim(); 
        const subject = subjectElement.textContent.trim(); 
        const options = optionsElement.textContent.trim(); 

        if (!userAnswer) {
            alert('Please provide your answer before reviewing.');
            return;
        }

        reviewButton.disabled = true;
        loadingIndicator.style.display = 'block';
        responseDisplay.textContent = 'Loading feedback...';

        try {
            const formData = new FormData();
            formData.append('question', question);
            formData.append('answer', userAnswer);
            formData.append('subject', subject);
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
                responseDisplay.textContent = `AI Feedback Error: ${data.error}`;
            } else if (data.feedback) {
                // Convert markdown to HTML
                const html = marked.parse(data.feedback.trim());
                responseDisplay.innerHTML = html;
            } else {
                responseDisplay.textContent = 'No feedback received from the AI.';
            }
        } catch (error) {
            console.error('Error sending feedback for review:', error);
            responseDisplay.textContent = 'Error: ${error.message}';
        } finally {
            reviewButton.disabled = false;
            loadingIndicator.style.display = 'none';
            reviewButton.textContent = 'Review';
        }
    });
});