<?php
// send_email.php
// Email handler for PT INFOBIT CIPTA MANDIRI contact form

// Set headers for JSON response
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Configuration
$to_email = 'info@infobit.co.id';
$company_name = 'PT INFOBIT CIPTA MANDIRI';
$recaptcha_secret = '6LcC4wYsAAAAAPsCSoU3eZ11mohtltBvFkJo6qK5';

// Function to send JSON response
function sendResponse($success, $message) {
    echo json_encode([
        'success' => $success,
        'message' => $message
    ]);
    exit;
}

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendResponse(false, 'Invalid request method');
}

// Get JSON input
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Validate input
if (!$data) {
    sendResponse(false, 'Invalid input data');
}

// Sanitize input
$name = isset($data['name']) ? htmlspecialchars(strip_tags(trim($data['name']))) : '';
$email = isset($data['email']) ? filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL) : '';
$phone = isset($data['phone']) ? htmlspecialchars(strip_tags(trim($data['phone']))) : '';
$message = isset($data['message']) ? htmlspecialchars(strip_tags(trim($data['message']))) : '';
$recaptcha_response = isset($data['recaptcha']) ? $data['recaptcha'] : '';

// Validate required fields
if (empty($name) || empty($email) || empty($phone) || empty($message)) {
    sendResponse(false, 'Mohon lengkapi semua field yang diperlukan');
}

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    sendResponse(false, 'Format email tidak valid');
}

// Validate phone (basic)
if (!preg_match('/^[0-9\s\-\+\(\)]{10,20}$/', $phone)) {
    sendResponse(false, 'Format nomor HP tidak valid');
}

// Verify reCAPTCHA
if (!empty($recaptcha_secret)) {
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_data = [
        'secret' => $recaptcha_secret,
        'response' => $recaptcha_response,
        'remoteip' => $_SERVER['REMOTE_ADDR']
    ];

    $recaptcha_options = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => http_build_query($recaptcha_data)
        ]
    ];

    $recaptcha_context = stream_context_create($recaptcha_options);
    $recaptcha_result = file_get_contents($recaptcha_url, false, $recaptcha_context);
    $recaptcha_json = json_decode($recaptcha_result);

    if (!$recaptcha_json->success) {
        sendResponse(false, 'Verifikasi reCAPTCHA gagal. Mohon coba lagi.');
    }
}

// Prepare email
$subject = "Pesan Baru dari Website $company_name - $name";

// Email body (HTML)
$email_body = "
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9fafb;
        }
        .header {
            background: linear-gradient(135deg, #7C3AED 0%, #A855F7 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background: white;
            padding: 30px;
            border-radius: 0 0 8px 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .field {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e5e7eb;
        }
        .field:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: bold;
            color: #7C3AED;
            display: block;
            margin-bottom: 5px;
        }
        .value {
            color: #374151;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            color: #6b7280;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1>$company_name</h1>
            <p>Pesan Baru dari Website</p>
        </div>
        <div class='content'>
            <div class='field'>
                <span class='label'>Nama:</span>
                <span class='value'>$name</span>
            </div>
            <div class='field'>
                <span class='label'>Email:</span>
                <span class='value'>$email</span>
            </div>
            <div class='field'>
                <span class='label'>Nomor HP:</span>
                <span class='value'>$phone</span>
            </div>
            <div class='field'>
                <span class='label'>Pesan:</span>
                <div class='value'>$message</div>
            </div>
            <div class='field'>
                <span class='label'>Waktu:</span>
                <span class='value'>" . date('d F Y, H:i:s') . " WIB</span>
            </div>
            <div class='field'>
                <span class='label'>IP Address:</span>
                <span class='value'>" . $_SERVER['REMOTE_ADDR'] . "</span>
            </div>
        </div>
        <div class='footer'>
            <p>Email ini dikirim otomatis dari website PT INFOBIT CIPTA MANDIRI</p>
            <p>&copy; 2024 PT INFOBIT CIPTA MANDIRI. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>
";

// Email headers
$headers = [
    'MIME-Version: 1.0',
    'Content-Type: text/html; charset=UTF-8',
    'From: Website PT INFOBIT <noreply@infobit.co.id>',
    'Reply-To: ' . $email,
    'X-Mailer: PHP/' . phpversion()
];

// Send email
$mail_sent = mail($to_email, $subject, $email_body, implode("\r\n", $headers));

if ($mail_sent) {
    // Log success (optional - uncomment if needed)
    // $log_entry = date('Y-m-d H:i:s') . " - Email sent from: $name ($email)\n";
    // file_put_contents('contact_log.txt', $log_entry, FILE_APPEND);
    
    sendResponse(true, 'Pesan berhasil dikirim!');
} else {
    // Log error (optional - uncomment if needed)
    // $log_entry = date('Y-m-d H:i:s') . " - Email FAILED from: $name ($email)\n";
    // file_put_contents('contact_log.txt', $log_entry, FILE_APPEND);
    
    sendResponse(false, 'Gagal mengirim email. Mohon coba lagi atau hubungi kami langsung.');
}
?>
