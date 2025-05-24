<?php
header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Only POST requests are allowed.']);
    exit;
}

// Get the data from the POST request
$subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
$question = isset($_POST['question']) ? trim($_POST['question']) : '';
$explainLike5 = isset($_POST['explain_like_5']) ? filter_var($_POST['explain_like_5'], FILTER_VALIDATE_BOOLEAN) : false;
$apiKey = isset($_POST['apiKey']) ? trim($_POST['apiKey']) : '';

if (empty($question)) {
    echo json_encode(['error' => 'Please provide a question.']);
    exit;
}
if (empty($apiKey)) {
    echo json_encode(['error' => 'API key is missing on the server.']);
    exit;
}
//Gemini endpoint URL
$geminiApiUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key='.$apiKey;

if ($explainLike5) {
    $promptText = "Explain the following JAMB question about " . $subject . " like I'm a five-year-old:\n" . $question;
    $promptText.="\nIf the user select, for example, mathematics as the subject, but then asked the question different from the subject mathematics, for example 'What is compter?', notify the user of his mistake. Tell him the potential subject but do not answer the question. But this time around do it in this format: Sorry Dear! You selected [subject] as the category, but asked question related to [potential subject]. Replace the text in the square bracket with the actual subject & potential subject respectively.";
} else {
    $promptText = "You are a friendly and knowledgeable tutor helping a student prepare for the JAMB exam in Nigeria. Use simple and clear English that a secondary school student can easily understand. Please explain the following question as if you're teaching it to someone who is smart but new to the topic. Make it short & in simple language. Structure it with clear headings and paragraphs. No asterisks, no bullet poits, resplace your markdown and emphasis with it html equivalent tag — use real tags (avoid the HTML structure as I have it already in the page. I'm dispaying the AI's response to the user) or plain text instead. If the user select, for example, mathematics as the subject but then ask the question different from the subject mathematics, for example 'What is compter?', notify the user of his mistake. Tell him the potential subject but do not answer the question.
        Subject: " . $subject . "
        Question: " . $question;

}

$postData = json_encode([
    'contents' => [
        [
            'parts' => [
                ['text' => $promptText]
            ]
        ]
    ]
]);

// Initialize cURL session
$ch = curl_init($geminiApiUrl);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

// To stop SSL verification because it keeps failing
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

// Execute the cURL request
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    $error = curl_error($ch);
    curl_close($ch);
    echo json_encode(['error' => 'Failed to connect to Gemini API: ' . $error]);
    exit;
}

// Close cURL session
curl_close($ch);

$responseData = json_decode($response, true);

if ($responseData && isset($responseData['candidates'][0]['content']['parts'][0]['text'])) {
    echo json_encode(['response' => trim($responseData['candidates'][0]['content']['parts'][0]['text'])]);
} elseif ($responseData && isset($responseData['error'])) {
    echo json_encode(['error' => 'Gemini API Error: ' . $responseData['error']['message']]);
} else {
    echo json_encode(['error' => 'Unexpected response from Gemini API: ' . json_encode($responseData)]); 
}

?>