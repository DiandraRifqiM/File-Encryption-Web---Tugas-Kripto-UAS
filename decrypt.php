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
        die("Failed to read encrypted file");
    }

    $decryptedData = decryptFileData($data, $password);

    if ($decryptedData === false)
    {
        die("Wrong key or corrupted file");
    }

    if (!is_dir('decrypted'))
    {
        mkdir('decrypted');
    }

    $newName = preg_replace('/\.enc$/', '', $originalName);

    $outputFile = 'decrypted/' . $newName;

    file_put_contents($outputFile, $decryptedData);

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($outputFile) . '"');
    header('Content-Length: ' . filesize($outputFile));

    readfile($outputFile);
    exit;
}