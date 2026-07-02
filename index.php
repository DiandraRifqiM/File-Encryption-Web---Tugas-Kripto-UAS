<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Security</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<div class="container py-5">

    <!-- Header -->
    <div class="text-center mb-3">

        <span class="badge bg-dark border border-info text-info px-3 py-2">
            AES-256-CBC Encryption System
        </span>

    </div>

    <div class="text-center mb-5">

        <h1 class="fw-bold display-5">
            <i class="bi bi-shield-lock-fill"></i>
            AES File Security
        </h1>

        <p class="text-muted mt-3">
            Secure your digital files using AES-256 encryption technology
        </p>
        <p class="text-muted mt-3">
            Powered by Group 2
        </p>

    </div>

    <div class="row justify-content-center g-4">

        <!-- Encrypt Card -->
        <div class="col-lg-5">

            <div class="card custom-card shadow-lg">

                <div class="card-body">

                    <h4 class="mb-4">
                        <i class="bi bi-lock-fill"></i>
                        Encrypt File
                    </h4>

                    <form action="encrypt.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">

                            <label class="form-label">
                                Select File
                            </label>

                            <label class="custom-upload">

                                <input
                                    type="file"
                                    name="file"
                                    class="file-input"
                                    required>

                                <div class="upload-content">

                                    <i class="bi bi-folder2-open"></i>

                                    <span class="file-name">
                                        Choose File
                                    </span>

                                </div>

                            </label>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Secret Key
                            </label>

                            <div class="input-group">

                                <input
                                    type="password"
                                    name="key"
                                    id="encryptKey"
                                    class="form-control"
                                    placeholder="Enter secret key"
                                    required>

                                <button
                                    type="button"
                                    class="btn btn-outline-secondary"
                                    onclick="toggleKey('encryptKey')">

                                    <i class="bi bi-eye"></i>

                                </button>

                            </div>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-dark w-100">

                            <i class="bi bi-lock-fill"></i>
                            Encrypt File

                        </button>

                    </form>

                </div>

            </div>

        </div>      

        <!-- Decrypt Card -->
        <div class="col-lg-5">

            <div class="card custom-card shadow-lg">

                <div class="card-body">

                    <h4 class="mb-4">
                        <i class="bi bi-unlock-fill"></i>
                        Decrypt File
                    </h4>

                    <form action="decrypt.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">

                            <label class="form-label">
                                Select Encrypted File
                            </label>

                            <label class="custom-upload">

                                <input
                                    type="file"
                                    name="file"
                                    class="file-input"
                                    required>

                                <div class="upload-content">

                                    <i class="bi bi-folder2-open"></i>

                                    <span class="file-name">
                                        Choose File
                                    </span>

                                </div>

                            </label>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Secret Key
                            </label>

                            <div class="input-group">

                                <input
                                    type="password"
                                    name="key"
                                    id="decryptKey"
                                    class="form-control"
                                    placeholder="Enter secret key"
                                    required>

                                <button
                                    type="button"
                                    class="btn btn-outline-secondary"
                                    onclick="toggleKey('decryptKey')">

                                    <i class="bi bi-eye"></i>

                                </button>

                            </div>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary w-100">

                            <i class="bi bi-unlock-fill"></i>
                            Decrypt File

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <!-- Footer -->

    <div class="text-center mt-5">

        <small class="text-muted">
            Developed for Cryptography Project • AES-256-CBC
        </small>

    </div>

</div>

<script>

    function toggleKey(id)
    {
        const input = document.getElementById(id);

        if(input.type === "password")
        {
            input.type = "text";
        }
        else
        {
            input.type = "password";
        }
    }

    document.addEventListener("DOMContentLoaded", () => {

        const fileInputs = document.querySelectorAll('.file-input');

        fileInputs.forEach(input => {

            input.addEventListener('change', function(){

                const fileNameElement =
                    this.closest('.custom-upload')
                        .querySelector('.file-name');

                if(this.files.length > 0)
                {
                    fileNameElement.textContent =
                        this.files[0].name;
                }

            });

        });

    });

</script>
</body>
</html>