<?php
header('Content-Type: application/json');

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

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Only POST requests are allowed.']);
    exit;
}

$question = isset($_POST['question']) ? trim($_POST['question']) : '';
$answer = isset($_POST['answer']) ? trim($_POST['answer']) : '';
$options = isset($_POST['options']) ? trim($_POST['options']) : '';
$subject = isset($_POST['subject']) ? trim($_POST['subject']) : 'General';

if (empty($question) || empty($answer)) {
    echo json_encode(['error' => 'Question and answer are required.']);
    exit;
}

$apiKey = 'AIzaSyDWLxfF05osjLGC-FD9F971bl-8Y6UQl28';

$geminiApiUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=' . $apiKey;

$prompt = "You are an expert JAMB (Joint Admissions and Matriculation Board) assessment tutor. Provide feedback on the user's response to the following question: \n";
$prompt .= "Subject: " . $subject . "\nQuestion: " . $question . "\nOptions: " . $options;
$prompt .= "\nUser's Selected Answer: " . $answer . "\n";
$prompt .= "Your task is to provide feedback based on the user's selected answer and the provided correct answer.\n";
$prompt .= "State clearly if the user's response is CORRECT or INCORRECT.\n";
$prompt .= "If incorrect, state the CORRECT ANSWER using its LETTER and the corresponding FULL OPTION TEXT (e.g., 'The correct answer is D. lay').\n";
$prompt .= "Explain the concept tested by the question in detail.\n";
$prompt .= "Explain why the correct answer is the best fit, and briefly explain why the user's selected option (if incorrect) and other plausible distractors are wrong.\n";
$prompt .= "Ensure your explanation directly refers to the provided options.\n";


$postData = json_encode([
    'contents' => [
        [
            'parts' => [['text' => $prompt]]
        ]
    ],
    'generationConfig' => [
        'temperature' => 0.7, 
        'maxOutputTokens' =>1000, 
    ]
]); 

$ch = curl_init($geminiApiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);
//To disable SSL verification because verification keeps failing.
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    $error = curl_error($ch);
    curl_close($ch);
    echo json_encode(['error' => 'Failed to connect to Gemini API: ' . $error]);
    exit;
}

curl_close($ch);

$responseData = json_decode($response, true);

if ($responseData && isset($responseData['candidates'][0]['content']['parts'][0]['text'])) {
    $feedback = trim($responseData['candidates'][0]['content']['parts'][0]['text']);
    echo json_encode(['feedback' => $feedback]);
} elseif ($responseData && isset($responseData['error'])) {
    echo json_encode(['error' => 'Gemini API Error: ' . $responseData['error']['message']]);
} else {
    echo json_encode(['error' => 'Unexpected response from Gemini API.']);
}

$conn->close();
?>