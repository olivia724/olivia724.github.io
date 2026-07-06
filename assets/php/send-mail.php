<?php
declare(strict_types=1);

// Fehlerausgaben duerfen die JSON-Antwort nie kontaminieren (z.B. bei fehlender
// Mailserver-Konfiguration) - Fehler stattdessen ins PHP-Errorlog schreiben.
ini_set('display_errors', '0');
ini_set('log_errors', '1');

header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../partials/config.php';

const MAX_MESSAGE_LENGTH = 5000;

function respond(int $status, array $payload): void
{
	http_response_code($status);
	echo json_encode($payload);
	exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	respond(405, ['success' => false, 'message' => 'Methode nicht erlaubt.']);
}

// Honeypot: Bots füllen versteckte Felder aus - stiller Erfolg ohne Mailversand.
if (!empty($_POST['website'])) {
	respond(200, ['success' => true]);
}

$name = trim((string)($_POST['name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));

if ($name === '' || $email === '' || $message === '') {
	respond(422, ['success' => false, 'message' => 'Bitte alle Felder ausfüllen.']);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	respond(422, ['success' => false, 'message' => 'Bitte eine gültige E-Mail-Adresse angeben.']);
}

// Schutz gegen Header-Injection über Name/E-Mail.
if (preg_match('/[\r\n]/', $name) || preg_match('/[\r\n]/', $email)) {
	respond(422, ['success' => false, 'message' => 'Ungültige Eingabe.']);
}

if (mb_strlen($message) > MAX_MESSAGE_LENGTH) {
	respond(422, ['success' => false, 'message' => 'Nachricht ist zu lang.']);
}

$subject = 'Neue Nachricht über die Portfolio-Seite';
$body = "Name: {$name}\nE-Mail: {$email}\n\n{$message}";
$headers = "From: " . SITE_EMAIL . "\r\nReply-To: {$email}\r\nContent-Type: text/plain; charset=UTF-8";

$sent = mail(SITE_EMAIL, $subject, $body, $headers);

if (!$sent) {
	respond(500, ['success' => false, 'message' => 'Senden ist fehlgeschlagen. Bitte später erneut versuchen.']);
}

respond(200, ['success' => true]);
