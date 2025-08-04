<?php
// Process form submission before any HTML output
$message = '';
$errors = []; // Array to store validation errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $fullname = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Full Name Validation
    if (empty($fullname)) {
        $errors['fullname'] = "Full Name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
        $errors['fullname'] = "Only letters and white space allowed in Full Name.";
    }

    // Email Validation
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    // Password Validation
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Password must be at least 8 characters long.";
    } elseif (!preg_match("/[A-Z]/", $password)) {
        $errors['password'] = "Password must contain at least one uppercase letter.";
    } elseif (!preg_match("/[a-z]/", $password)) {
        $errors['password'] = "Password must contain at least one lowercase letter.";
    } elseif (!preg_match("/[0-9]/", $password)) {
        $errors['password'] = "Password must contain at least one number.";
    } elseif (!preg_match("/[^a-zA-Z0-9]/", $password)) {
        $errors['password'] = "Password must contain at least one special character.";
    }

    // If no validation errors, proceed with database operations
    if (empty($errors)) {
        // Connect to the database
        $con = mysqli_connect("localhost", "root", "", "project");

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Sanitize inputs for database
        $fnm = mysqli_real_escape_string($con, $fullname);
        $email_db = mysqli_real_escape_string($con, $email);
        $pwd_hashed = password_hash($password, PASSWORD_DEFAULT);

        // Prepare statement
        $stmt = $con->prepare("INSERT INTO usersignup (fullname, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $fnm, $email_db, $pwd_hashed);

        if ($stmt->execute()) {
            // Redirect to login page after successful registration
            header("Location: login.php");
            exit(); // Ensure no further code is executed
        } else {
            $message = "<p class='text-red-600 font-semibold mb-4'>Error: " . htmlspecialchars($stmt->error) . "</p>";
        }

        $stmt->close();
        mysqli_close($con);
    } else {
        // Construct error message from validation errors
        $message = "<ul class='text-red-600 font-semibold mb-4 list-disc list-inside'>";
        foreach ($errors as $error) {
            $message .= "<li>" . htmlspecialchars($error) . "</li>";
        }
        $message .= "</ul>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Signup - The Jewellery Matchmaker</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .error-message {
            color: #ef4444; /* Tailwind red-500 */
            font-size: 0.875rem; /* text-sm */
            margin-top: 0.25rem; /* mt-1 */
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header Section -->
    <header class="bg-gradient-to-r from-amber-100 to-rose-100 py-6">
        <div class="container mx-auto px-4 md:px-6">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-serif font-bold text-gray-800">The Jewellery Matchmaker</h1>
                <nav class="hidden md:flex space-x-8">
                    <a href="index.php" class="text-gray-700 hover:text-amber-600">Home</a>
                    <a href="#" class="text-gray-700 hover:text-amber-600">Shop</a>
                    <div class="relative category-item">
                        <a href="category.php" class="text-gray-700 hover:text-amber-600">Category <i class="ion-chevron-down"></i></a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- Signup Section -->
    <section class="py-20 md:py-32">
        <div class="container mx-auto px-4 md:px-6">
            <div class="form-container p-8 max-w-md mx-auto">
                <h2 class="text-2xl font-serif font-bold text-gray-800 mb-6">Sign Up</h2>
                <!-- Show message if any -->
                <?= $message ?>

                <form id="signupForm" method="post" class="space-y-6" novalidate>
                    <div>
                        <label for="fullname" class="block text-gray-700 mb-2">Full Name</label>
                        <input type="text" id="fullname" name="fullname" value="<?= htmlspecialchars($fullname ?? '') ?>" required class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-300" placeholder="Enter your full name" />
                        <?php if (isset($errors['fullname'])): ?>
                            <p class="error-message"><?= htmlspecialchars($errors['fullname']) ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" required class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-300" placeholder="Enter your email" />
                        <?php if (isset($errors['email'])): ?>
                            <p class="error-message"><?= htmlspecialchars($errors['email']) ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label for="password" class="block text-gray-700 mb-2">Password</label>
                        <input type="password" id="password" name="password" required class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-300" placeholder="Create a password" />
                        <?php if (isset($errors['password'])): ?>
                            <p class="error-message"><?= htmlspecialchars($errors['password']) ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-amber-600 hover:bg-amber-700 text-white py-3 px-6 rounded transition duration-300">
                            Sign Up
                        </button>
                    </div>
                </form>
                <p class="mt-4 text-gray-600 text-center">Already have an account? <a href="login.php" class="text-amber-600 hover:underline">Login</a></p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4 md:px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-serif font-bold mb-4">The Jewellery Matchmaker</h3>
                    <p class="text-gray-400">
                        Helping you find jewellery that perfectly complements your style.
                    </p>
                </div>
                <div>
                    <h4 class="font-medium mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="index.php" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Shop</a></li>
                        <li><a href="about.php" class="text-gray-400 hover:text-white">About</a></li>
                        <li><a href="contact.php" class="text-gray-400 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-medium mb-4">Customer Service</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">FAQs</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Shipping</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Returns</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Size Guide</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-medium mb-4">Contact Us</h4>
                    <address class="not-italic text-gray-400 space-y-2">
                        <p>The Jewellery Matchmaker</p>
                        <p>Rajkot, Gujarat</p>
                        <p>thejewellerymatchmaker@gmail.com</p>
                        <p>8888888855</p>
                    </address>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>© 2024 The Jewellery Matchmaker. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const signupForm = document.getElementById('signupForm');
            const fullnameInput = document.getElementById('fullname');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');

            function showValidationError(inputElement, message) {
                let errorElement = inputElement.nextElementSibling;
                if (!errorElement || !errorElement.classList.contains('error-message')) {
                    errorElement = document.createElement('p');
                    errorElement.classList.add('error-message');
                    inputElement.parentNode.insertBefore(errorElement, inputElement.nextSibling);
                }
                errorElement.textContent = message;
            }

            function hideValidationError(inputElement) {
                const errorElement = inputElement.nextElementSibling;
                if (errorElement && errorElement.classList.contains('error-message')) {
                    errorElement.textContent = '';
                }
            }

            function validateFullname() {
                const fullname = fullnameInput.value.trim();
                if (fullname === '') {
                    showValidationError(fullnameInput, 'Full Name is required.');
                    return false;
                } else if (!/^[a-zA-Z ]*$/.test(fullname)) {
                    showValidationError(fullnameInput, 'Only letters and white space allowed.');
                    return false;
                } else {
                    hideValidationError(fullnameInput);
                    return true;
                }
            }

            function validateEmail() {
                const email = emailInput.value.trim();
                if (email === '') {
                    showValidationError(emailInput, 'Email is required.');
                    return false;
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    showValidationError(emailInput, 'Invalid email format.');
                    return false;
                } else {
                    hideValidationError(emailInput);
                    return true;
                }
            }

            function validatePassword() {
                const password = passwordInput.value;
                let isValid = true;
                let errorMessage = '';

                if (password === '') {
                    errorMessage = 'Password is required.';
                    isValid = false;
                } else if (password.length < 8) {
                    errorMessage = 'Password must be at least 8 characters long.';
                    isValid = false;
                } else if (!/[A-Z]/.test(password)) {
                    errorMessage = 'Password must contain at least one uppercase letter.';
                    isValid = false;
                } else if (!/[a-z]/.test(password)) {
                    errorMessage = 'Password must contain at least one lowercase letter.';
                    isValid = false;
                } else if (!/[0-9]/.test(password)) {
                    errorMessage = 'Password must contain at least one number.';
                    isValid = false;
                } else if (!/[^a-zA-Z0-9]/.test(password)) {
                    errorMessage = 'Password must contain at least one special character.';
                    isValid = false;
                }

                if (!isValid) {
                    showValidationError(passwordInput, errorMessage);
                } else {
                    hideValidationError(passwordInput);
                }
                return isValid;
            }

            fullnameInput.addEventListener('input', validateFullname);
            emailInput.addEventListener('input', validateEmail);
            passwordInput.addEventListener('input', validatePassword);

            signupForm.addEventListener('submit', function(event) {
                const isFullnameValid = validateFullname();
                const isEmailValid = validateEmail();
                const isPasswordValid = validatePassword();

                if (!isFullnameValid || !isEmailValid || !isPasswordValid) {
                    event.preventDefault(); // Prevent form submission if validation fails
                }
            });
        });
    </script>
</body>
</html>