<?php
include '../config.php';
session_start();

// Initialize variables
$Name = $Email = $message = "";

if (isset($_POST['contact_submit'])) {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $message = $_POST['message'];

    // Validate email format
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format');</script>";
    } elseif ($Name == "" || $Email == "" || $message == "") {
        echo "<script>alert('Please fill all the fields');</script>";
    } else {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO contact (Name, Email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $Name, $Email, $message);
        if ($stmt->execute()) {
            // Reset form fields after successful submission
            $Name = "";
            $Email = "";
            $message = "";
            header("Location: contact.php"); // Redirect to contact.php
            exit();
        } else {
            echo "<script>alert('Error occurred. Please try again.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Contact Form</title>
    <link rel="stylesheet" href="contacts.css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<nav>
    <div class="logo">
        <img src="Logo.png" alt="Logo"/>
    </div>
    <div class="nav-items">
        <a href="./home.html">Home</a>
        <a href="./projects.html">Projects</a>
        <a href="./skill.html">Skill</a>
        <a href="./contact.html">Contact</a>
        <a href="../logout.php"><button class="btn btn-danger">Logout</button></a>
    </div>
</nav>
<section class="bg">
    <div class="bg-container">
        <div class="column-left">
            <div class="form-container">
                <!-- Form -->
                <form action="#" method="post">
                    <label for="Name">Name:</label>
                    <input type="text" id="Name" name="Name" value="<?php echo $Name; ?>" required>

                    <label for="Email">Email:</label>
                    <input type="email" id="Email" name="Email" value="<?php echo $Email; ?>" required>

                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" required><?php echo $message; ?></textarea>

                    <button type="submit" name="contact_submit" class="auth_btn">Submit</button>
                </form>
            </div>
        </div>

        <div class="column-right">
            <!-- Text in the upper middle -->
            <div class="contact-text">
                <h2>Contact Me:</h2>
            </div>
            <div class="social-icons">
                <div class="social-icon">
                    <i class='bx bxl-facebook-square'></i>
                    <span>facebook.com/TheListlessOne/</span>
                </div>
                <div class="social-icon">
                    <i class='bx bxl-linkedin-square'></i>
                    <span>linkedin.com/in/archie-verania-72a89a288</span>
                </div>
                <div class="social-icon">
                    <i class='bx bxl-twitter'></i>
                    <span>twitter.com/Chachii1130</span>
                </div>
                <div class="social-icon">
                    <i class='bx bxl-github'></i>
                    <span>github.com/Napnip</span>
                </div>
                <!-- Add more social media icons and text as needed -->
            </div>
        </div>
    </div>
</section>
</body>
</html>
