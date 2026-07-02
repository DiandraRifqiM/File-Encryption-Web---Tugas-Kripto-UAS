<?php

function encryptFileData($data, $password)
{
    $cipher = 'AES-256-CBC';

    // Generate key 32 byte
    $key = hash('sha256', $password, true);

    // Generate IV sesuai kebutuhan AES-256-CBC
    $ivLength = openssl_cipher_iv_length($cipher);
    $iv = random_bytes($ivLength);

    // Encrypt
    $encrypted = openssl_encrypt(
        $data,
        $cipher,
        $key,
        OPENSSL_RAW_DATA,
        $iv
    );

    if ($encrypted === false) {
        return false;
    }

    // Gabungkan IV + Ciphertext
    $combined = $iv . $encrypted;

    // Encode supaya aman disimpan sebagai file
    return base64_encode($combined);
}

function decryptFileData($data, $password)
{
    $cipher = 'AES-256-CBC';

    $key = hash('sha256', $password, true);

    // Decode base64 dulu
    $decoded = base64_decode($data, true);

    if ($decoded === false) {
        return false;
    }

    $ivLength = openssl_cipher_iv_length($cipher);

    $iv = substr($decoded, 0, $ivLength);
    $ciphertext = substr($decoded, $ivLength);

    return openssl_decrypt(
        $ciphertext,
        $cipher,
        $key,
        OPENSSL_RAW_DATA,
        $iv
    );
}