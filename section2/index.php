<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $hobbies = $_POST["hobies"];
        $gender = $_POST["gender"];
        $bio = $_POST["bio"];

        $errors = [];

        if (empty($name)) {
            $errors["name"] = "Tên không được để trống.";
        } elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
            $errors["name"] = "Tên chỉ được chứa chữ cái và khoảng trắng.";
        }

        if (empty($email)) {
            $errors["email"] = "Email không được để trống.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Email không hợp lệ.";
        }

        if (empty($gender)) {
            $errors["gender"] = "Bạn phải chọn giới tính.";
        }

        if (empty($hobbies)) {
            $errors["hobies"] = "Bạn phải chọn ít nhất một sở thích.";
        }
        if (empty($bio)) {
            $errors["bio"] = "Bạn phải nhập biểu mẫu.";
        }

        if (empty($errors)) {
            echo "<div class='container'>";
            echo "<h2>Thông tin đã nhập:</h2>";
            echo "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
            echo "<p><strong>Gender:</strong> " . htmlspecialchars($gender) . "</p>";
            echo "<p><strong>Hobbies:</strong> " . implode(", ", $hobbies) . "</p>";
            echo "<p><strong>Bio:</strong> " . htmlspecialchars($bio) . "</p>";
            echo "</div>";
            session_destroy();
        } else {
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['gender'] = $gender;
            $_SESSION['hobbies'] = $hobbies;
            $_SESSION['bio'] = $bio;
        }
    }
    ?>

    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;" class="container">
        <form style="width: 500px;" action="index.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input value="<?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : ''; ?>" type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" required>
                <?php if (isset($errors["name"])) { ?>
                    <div class="text-danger"><?php echo $errors["name"]; ?></div>
                <?php } ?>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
                <?php if (isset($errors["email"])) { ?>
                    <div class="text-danger"><?php echo $errors["email"]; ?></div>
                <?php } ?>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="male" name="gender" value="male" <?php if (isset($_SESSION['gender']) && $_SESSION['gender'] === 'male') echo 'checked'; ?>>
                    <label class="form-check-label" for="male">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="female" name="gender" value="female" <?php if (isset($_SESSION['gender']) && $_SESSION['gender'] === 'female') echo 'checked'; ?>>
                    <label class="form-check-label" for="female">
                        Female
                    </label>
                </div>
                <?php if (isset($errors["gender"])) { ?>
                    <div class="text-danger"><?php echo $errors["gender"]; ?></div>
                <?php } ?>
            </div>

            <div class="mb-3">
                <label for="hobbies" class="form-label">Hobbies</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="reading" name="hobies[]" value="reading" <?php if (isset($_SESSION['hobbies']) && in_array('reading', $_SESSION['hobbies'])) echo 'checked'; ?>>
                    <label class="form-check-label" for="reading">
                        Reading
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="coding" name="hobies[]" value="coding" <?php if (isset($_SESSION['hobbies']) && in_array('coding', $_SESSION['hobbies'])) echo 'checked'; ?>>
                    <label class="form-check-label" for="coding">
                        Coding
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="game" name="hobies[]" value="game" <?php if (isset($_SESSION['hobbies']) && in_array('game', $_SESSION['hobbies'])) echo 'checked'; ?>>
                    <label class="form-check-label" for="game">
                        Game
                    </label>
                </div>
                <?php if (isset($errors["hobies"])) { ?>
                    <div class="text-danger"><?php echo $errors["hobies"]; ?></div>
                <?php } ?>
            </div>
            <div class="form-floating">
                <textarea name="bio" class="form-control" placeholder="Leave a comment here" id="bio"><?php echo isset($_SESSION['bio']) ? htmlspecialchars($_SESSION['bio']) : ''; ?></textarea>
                <label for="bio">Bio</label>
            </div>


            <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>