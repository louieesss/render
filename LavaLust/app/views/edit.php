<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #c3cfe2 0%, #c3e2dd 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-top: 3rem;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            border-radius: 10px;
            padding: 0.75rem;
        }

        .btn-primary {
            background: linear-gradient(to right, #4b6cb7, #182848);
            border: none;
        }

        .btn-outline-secondary,
        .btn-danger {
            border-radius: 10px;
        }

        .header-icon {
            font-size: 2rem;
            color: #4b6cb7;
        }

        .form-title {
            font-weight: bold;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #182848;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <div class="glass-card">

                    <div class="text-center mb-4">
                        <i class="bi bi-pencil-square header-icon"></i>
                        <div class="form-title">Edit Student</div>
                    </div>

                    <?php flash_alert(); ?>

                  
                    <form action="<?= site_url('students/edit/' . $user['id']); ?>" method="POST">

                        <div class="mb-3">
                            <label for="lName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lName" name="lName"
                                value="<?= htmlspecialchars($user['last_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="fName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fName" name="fName"
                                value="<?= htmlspecialchars($user['first_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?= htmlspecialchars($user['email_'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <div class="d-flex flex-wrap justify-content-between gap-2 mt-4">
                           
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-save2 me-1"></i> Save Changes
                            </button>

                          
                           
                            <a href="<?= site_url('students/create'); ?>" class="btn btn-outline-secondary px-4">
                                <i class="bi bi-plus-circle me-1"></i> Create New
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
