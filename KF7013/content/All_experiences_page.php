<!DOCTYPE html>
<html lang="en-GB">
    <?php
    include 'Head.php';
    //include 'dbconn_local.php'; //local
    include 'dbconn.php';
    //SQL query to get training session details
    $sql = "SELECT trainingID, title, Duration, price_per_person, session_imagepath FROM training_sessions";
    $result = mysqli_query($conn, $sql);

    ?>

    <body>
        <?php
            include 'Navbar.php';
        ?>
        <main>
        <div class = "Available-experiences-h1">
        <h1>Experiences to Learn</h1>
        </div>
        <div class="experiences-grid">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <!--process session by session-->
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="experiences-tile">
                        <!--Tile for each experience-->
                        <a href="experience_details.php?trainingID=<?php echo $row['trainingID']; ?>">
                            <img src="<?php echo $row['session_imagepath']; ?>" alt="<?php echo $row['title']; ?>">
                        </a>
                        <div class="experiences-title"><?php echo $row['title']; ?></div>
                        <div class="experiences-description"><?php echo substr($row['Duration'], 0, 100); ?> hours</div>
                        <div class="experiences-price">$<?php echo $row['price_per_person']; ?></div>
                        <a href="experience_details.php?trainingID=<?php echo $row['trainingID']; ?>" class="experiences-link">Learn More</a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <!--If cant retrieve sessions from db-->
                <p>No experiencess available at the moment.</p>
            <?php endif; ?>
        </div>
            </div>

             
        <?php
            include 'NewsletterSub.php';
        ?>
        </main>
        
        <?php
        //footer
        include 'footer.php';
        ?>
    </body>
</html>




    

<?php
// Close the database connection
mysqli_close($conn);
?>
