<?php
include 'config.php';
session_start();

if (isset($_POST['user_signup_submit'])) {
    $fName = $_POST['lName'];
    $lName = $_POST['fName'];
    $country_id = $_POST['country_id'];
    $region_id = $_POST['region_id'];
    $city_id = $_POST['city_id'];
    $barangay = $_POST['barangay'];
    $lot= $_POST['lot'];
    $street= $_POST['street'];
    $phone = $_POST['phone'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $CPassword = $_POST['CPassword'];

    if ($lName == "" || $fName == "" || $Email == ""  || $Password == "") {
        echo "<script>alert('Fill the proper details');</script>";
    } else {
        if ($Password == $CPassword) {
            $sql = "SELECT * FROM user_login WHERE Email = '$Email'";
            $result = mysqli_query($conn, $sql);

            if ($result->num_rows > 0) {
                echo "<script>alert('Email already exist');</script>";
            } else {
                $sql = "INSERT INTO user_login (fName, lName, Email, country_id, region_id, city_id, barangay, lot, street, phone, Password) VALUES ('$fName', '$lName', '$Email', '$country_id', '$region_id', '$city_id', '$barangay', '$lot', '$street', '$phone', '$Password')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $_SESSION['userEmail'] = $Email;
                    $fName = "";
                    $lName = "";
                    $Email = "";
                    $country_id = "";
                    $region_id = "";
                    $city_id = "";
                    $barangay = "";
                    $lot = "";
                    $street = "";
                    $phone = "";
                    $blk = "";
                    $Password = "";
                    $CPassword = "";
                    header("Location: index2.php");
                } else {
                    echo "<script>alert('User does not exist');</script>";
                }
            }
        } else {
            echo "<script>alert('Password does not matched');</script>";
        }
    }
}

if (isset($_POST['user_login_submit'])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    $sql = "SELECT * FROM user_login WHERE Email = '$Email' AND Password = BINARY'$Password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $_SESSION['userEmail'] = $Email;
        $Email = "";
        $Password = "";
        header("Location: ./pwr/home.html");
    } else {
        echo "<script>alert('User Does not Exist');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="logins.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- main section -->
    <section id="auth_section">

        <div class="auth_container">
            <!--============ login =============-->

            <div id="Log_in">
                <h2>Log In</h2>

                <!-- // ==userlogin== -->
                <form class="user_login authsection active" id="userlogin" action="" method="POST">
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="Email">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="Password">
                    </div>
                    <button type="submit" name="user_login_submit" class="btn btn-primary">Log in</button>
                    <div class="footer_line">
                        <h6>Don't have an account? <span class="page_move_btn" onclick="signuppage()">Sign up</span></h6>
                    </div>
                </form>

            </div>

            <!--============ signup =============-->

            <div id="sign_up">
                <h2>Sign Up</h2>

                <form class="user_signup" id="usersignup" action="" method="POST">
                    <div class="mb-3">
                        <label for="inputFName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="inputFName" name="fName">
                    </div>
                    <div class="mb-3">
                        <label for="inputLName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="inputLName" name="lName">
                    </div>
                    <div class="mb-3">
                        <label for="inputEmailSignUp" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmailSignUp" name="Email">
                    </div>
                    <div class="mb-3">
                        <label for="inputPhone" class="form-label">Phone</label>
                        <input type="phone" class="form-control" id="inputPhone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="inputCountry" class="form-label">Country</label>
                        <select name="country_id" id="inputCountry" class="form-select">
                            <option value="">Country</option>
                            <?php
                            // Retrieve the countries from the database
                            $sql = "SELECT * FROM country";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $country_id = $row['country_id'];
                                $country = $row['country'];
                                echo "<option value='$country_id'>$country</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputRegion" class="form-label">Region</label>
                        <select name="region_id" id="inputRegion" class="form-select">
                            <option value="">Region</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputCity" class="form-label">City</label>
                        <select name="city_id" id="inputCity" class="form-select">
                            <option value="">City</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputBarangay" class="form-label">Barangay</label>
                        <input type="text" class="form-control" id="inputBarangay" name="barangay">
                    </div>
                    <div class="mb-3">
                        <label for="inputStreet" class="form-label">Street</label>
                        <input type="text" class="form-control" id="inputStreet" name="street">
                    </div>
                    <div class="mb-3">
                        <label for="inputLot" class="form-label">Block/Lot</label>
                        <input type="text" class="form-control" id="inputLot" name="lot">
                    </div>
                    <div class="mb-3">
                        <label for="inputPasswordSignUp" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPasswordSignUp" name="Password">
                    </div>
                    <div class="mb-3">
                        <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="inputConfirmPassword" name="CPassword">
                    </div>
                    <button type="submit" name="user_signup_submit" class="btn btn-primary">Sign up</button>

                    <div class="footer_line">
                        <h6>Already have an account? <span class="page_move_btn" onclick="loginpage()">Log in</span></h6>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="./javascript/index.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>