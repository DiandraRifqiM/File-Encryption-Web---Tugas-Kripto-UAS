<?php

require_once 'includes/aes_helper.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if (!isset($_FILES['file']))
    {
        die("No file uploaded");
    }

    $password = $_POST['key'] ?? '';

    if (empty($password))
    {
        die("Key cannot be empty");
    }

    $tmpFile = $_FILES['file']['tmp_name'];
    $originalName = $_FILES['file']['name'];

    $data = file_get_contents($tmpFile);

    if ($data === false)
    {
        die("Failed to read file");
    }

    $encryptedData = encryptFileData($data, $password);

    if ($encryptedData === false)
    {
        die("Encryption failed");
    }

    if (!is_dir('encrypted'))
    {
        mkdir('encrypted');
    }

    $outputFile = 'encrypted/' . $originalName . '.enc';

    file_put_contents($outputFile, $encryptedData);

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($outputFile) . '"');
    header('Content-Length: ' . filesize($outputFile));

    readfile($outputFile);
    exit;
}