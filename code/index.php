<?php
require_once '../vendor/autoload.php';

if (array_key_exists('string', $_POST)) {
  try {
    $res = OTUS_backend_lesson_2::analyzeStr($_POST['string']);
  } catch (Throwable $e) {
    $err = $e->getMessage();
  }
  if (isset($err)) {
    http_response_code(400);
    echo $err;
  } else {
    http_response_code($res ? 200 : 400);
    echo 'String is ' . ($res ? 'correct' : 'incorrect');
  }
} else {
  http_response_code(400);
  echo 'Request must have parameter string';
}