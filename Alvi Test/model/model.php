<?php
function insertUser($name, $email, $username, $password, $user_type, $gender, $dob) {
    // Include your database connection details from db.php
    include_once('db.php');

    $conn = getConnection();

    // Check if the database connection is established
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }
     

    // Perform database insert
    $sql = "INSERT INTO users (name, email, username, password, user_type, gender, dob)
            VALUES ('$name', '$email', '$username', '$password', '$user_type', '$gender', '$dob')";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        return true;
    } else {
        mysqli_close($conn);
        die("Error: " . mysqli_error($conn));
    }
}

function validateUser($username, $password) {
    $conn = getConnection();

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $query);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Fetch the result
    $result = mysqli_stmt_get_result($stmt);

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // Check if a user with the given username and password exists
    return mysqli_num_rows($result) > 0;
}

?>
