<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Welcome</title>
</head>
<body>
    <div class="container">
    <header>
        <h2>Dashboard</h2>
    </header>

    <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                require 'connection.php';
                $sql = "SELECT * FROM tbl_users";
                $result = mysqli_query($conn, $sql);
                
                while ($row = mysqli_fetch_array($result)){
                ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["password"]; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row["id"];?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?php echo $row["id"];?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

    <br>
    <a href="logout.php">Logout</a>

    </div>
</body>
</html>