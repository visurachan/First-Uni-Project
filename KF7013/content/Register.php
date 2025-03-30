<!DOCTYPE html>
<html lang="en-GB">
    <?php
        include 'Head.php'

    ?>
    
    <body class = "Login-Register">
        <div class="page-container">
                <div class="form-container">
                    <!-- Close link -->
                    <a href="index.php" class="close-btn">&#x2716; Close</a>
                    <a href="login.php" class="back-btn">&lt; Back</a>




                    <h1>Register</h1>
                    <form action="process_register.php" method="POST">
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input type="text" id="first_name" name="first_name" placeholder="Required" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last name</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Required" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Required" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Required" required>
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth">Date of birth</label>
                            <input type="date" id="date_of_birth" name="date_of_birth" placeholder="Required" required>
                        </div>
                        <button type="submit" class="btn">Register</button>
                        <div class="register-link">
                        <p>Already a member? Login instead</p>
                        <a href="Login.php" class="btn-secondary">Login</a>
                    </div>
                    </form>
                    
                </div>
            </div>

    </body>
</html>
