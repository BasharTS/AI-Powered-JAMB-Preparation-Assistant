const apiKey = 'AIzaSyDWLxfF05osjLGC-FD9F971bl-8Y6UQl28';
const backendUrl = 'process_question.php';

async function askAI() {
  const subject = document.getElementById('subject').value;
  const question = document.getElementById('question').value;
  const loader = document.getElementById('loader');
  const responseBox = document.getElementById('response-box');
  const responseElement = document.getElementById('response');
  const explainLike5 = document.getElementById('explain-like-5').checked;


  if (!question.trim()) {
    alert('Please enter your question.');
    return; 
  }

  loader.style.display = 'block';
  responseBox.style.display = 'none';
  responseElement.textContent = '';

  try {
    const formData = new FormData();
    formData.append('subject', subject);
    formData.append('question', question);
    formData.append('explain_like_5', explainLike5); 
    formData.append('apiKey', apiKey);

    const response = await fetch(backendUrl, {
      method: 'POST',
      body: formData,
    });

    if (!response.ok) {
      const errorText = await response.text();
      throw new Error(`Backend request failed: ${response.status} - ${errorText}`);
    }

    const data = await response.json();

    if (data.error) {
      responseElement.textContent = `Error from AI: ${data.error}`;
    } else if (data.response) {
      // Convert markdown to HTML to format AI's response
      const html = marked.parse(data.response.trim());
      
      responseElement.innerHTML = html;
    
    } else {
      responseElement.textContent = 'No response received from the AI.';
    }

    responseBox.style.display = 'block';

  } catch (error) {
    console.error('Error communicating with backend:', error);
    responseElement.textContent = `Error: ${error.message}`;
    responseBox.style.display = 'block';
  } finally {
    loader.style.display = 'none';
  }
}