<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>CRUD Application</title>

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <?php
    $insert = false;
    $update = false;
    $delete = false;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "diya";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Sorry, we failed to connect: " . mysqli_connect_error());
    }

    // Insert operation
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'])) {
        $title = $_POST["title"];
        $description = $_POST["description"];

        $sql = "INSERT INTO `notes`(`title`, `description`) VALUES ('$title','$description')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $insert = true;
        } else {
            echo "Failed to insert: " . mysqli_error($conn);
        }
    }

    // Update operation
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['srEdit'])) {
        $srEdit = $_POST['srEdit'];
        $titleEdit = $_POST['titleEdit'];
        $descriptionEdit = $_POST['descriptionEdit'];

        $sql = "UPDATE `notes` SET `title`='$titleEdit', `description`='$descriptionEdit' WHERE `sr`='$srEdit'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $update = true;
        } else {
            echo "Failed to update: " . mysqli_error($conn);
        }
    }

    // Delete operation
    if (isset($_GET['delete'])) {
        $srDelete = $_GET['delete'];

        $sql = "DELETE FROM `notes` WHERE `sr`='$srDelete'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $delete = true;
        } else {
            echo "Failed to delete: " . mysqli_error($conn);
        }
    }
    ?>

    <?php if ($insert) { ?>
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> Your note has been inserted successfully.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    <?php } ?>

    <?php if ($update) { ?>
        <div class='alert alert-info alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> Your note has been updated successfully.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    <?php } ?>

    <?php if ($delete) { ?>
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> Your note has been deleted successfully.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    <?php } ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">CRUD Application</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container my-4">
        <h2>Add a Note</h2>
        <form action="crud1.php" method="post">
            <div class="form-group">
                <label for="title">Note Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="desc">Note Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Note</button>
        </form>
    </div>

    <div class="container my-4">
        <h2>Notes</h2>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.NO</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `notes`";
                $result = mysqli_query($conn, $sql);
                $sr = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sr++;
                    echo "<tr>
                            <th scope='row'>" . $sr . "</th>
                            <td>" . $row['title'] . "</td>
                            <td>" . $row['description'] . "</td>
                            <td>
                                <button class='edit btn btn-sm btn-primary' data-id='" . $row['sr'] . "'>Edit</button>
                                <a href='?delete=" . $row['sr'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="crud1.php" method="post">
                        <input type="hidden" name="srEdit" id="srEdit">
                        <div class="form-group">
                            <label for="titleEdit">Note Title</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit">
                        </div>
                        <div class="form-group">
                            <label for="descriptionEdit">Note Description</label>
                            <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Note</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
              </body>
              </html>