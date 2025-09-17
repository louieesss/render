<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students View</title>

    <!-- ✅ Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        h1, h2 {
            text-align: center;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="mb-4">Welcome to View</h1>
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Students List</h2>
                <a href="<?= site_url('students/create'); ?>" class="btn btn-light">Add New Student</a>
            </div>

            <div class="card-body">
                <?php if (!empty($users)): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user['id']); ?></td>
                                        <td><?= htmlspecialchars($user['first_name']); ?></td>
                                        <td><?= htmlspecialchars($user['last_name']); ?></td>
                                        <td><?= htmlspecialchars($user['email_']); ?></td>
                                        <td>
                                            <a href="<?= site_url('students/edit/' . $user['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="<?= site_url('students/delete/' . $user['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info text-center" role="alert">
                        No students found.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- ✅ Bootstrap JS Bundle (Optional for functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
