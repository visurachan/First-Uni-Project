<!DOCTYPE html>
<html lang="en-GB">
    <?php
        include 'Head.php'

    ?>
    
    <body class = "Login-Register">
        <div class="page-container">
                <div class="form-container">
                
                <!--redirect to index.php after closing-->
                <a href="index.php" class="close-btn">&#x2716; Close</a>


                
                <!--Success message if redirected from regitration page -->
                <?php
                        if (isset($_GET['message'])) {
                            echo '<div class="register-success-message">' . htmlspecialchars($_GET['message']) . '</div>';
                        }
                        
                ?>
                    <h1>Login</h1>
                    <!--Invalid username or password -->
                    <?php
                        if (isset($_GET['invalid_message'])) {
                            echo '<div class="invalid_user_message">' . htmlspecialchars($_GET['invalid_message']) . '</div>';
                        }
                        
                    ?>
                
                    
                    <form action="process_login.php" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn">Login</button>
                    </form>
                    <div class="register-link">
                        <p>New to Ceylon Learn?</p>
                        <a href="Register.php" class="btn-secondary">Register</a>
                    </div>
                </div>
            </div>

    </body>
</html>
