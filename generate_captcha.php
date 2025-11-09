<?php
// generate_captcha.php
// Generate random math question for form validation
session_start();

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

// Generate random math question
$operations = [
    ['op' => '+', 'symbol' => '+'],
    ['op' => '-', 'symbol' => '-'],
    ['op' => '*', 'symbol' => 'x']
];

$operation = $operations[array_rand($operations)];

// Generate numbers based on operation
switch ($operation['op']) {
    case '+':
        $num1 = rand(10, 50);
        $num2 = rand(10, 50);
        $answer = $num1 + $num2;
        break;
    case '-':
        // Ensure positive result
        $num1 = rand(20, 99);
        $num2 = rand(10, $num1 - 1);
        $answer = $num1 - $num2;
        break;
    case '*':
        $num1 = rand(5, 15);
        $num2 = rand(5, 15);
        $answer = $num1 * $num2;
        break;
}

// Store answer in session (server-side, cannot be inspected by user)
$_SESSION['captcha_answer'] = $answer;
$_SESSION['captcha_time'] = time();

// Return only the question (NOT the answer)
echo json_encode([
    'success' => true,
    'question' => "{$num1} {$operation['symbol']} {$num2} = ?"
]);
?>
