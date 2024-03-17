<?php
global$conn;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">PHP CRUD Application</h2>
    <!-- Add New User Form -->
    <div class="mb-3">
        <h4>Add New User</h4>
        <form action="controller/controller.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <button type="submit" class="btn btn-primary" name="create" value="create">Add User</button>
        </form>
    </div>

    <!-- Display Users -->
    <div class="mt-5">
        <h4>Users</h4>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include './db/dbconnection.php';
            $sql = "SELECT * FROM User";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['phone']}</td>
                                <td>
                                    <a href='controller/controller.php?action=edit&id={$row['id']}' class='btn btn-sm btn-info'>Edit</a>
                                    <a href='controller/controller.php?delete={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
                                </td>
                            </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
