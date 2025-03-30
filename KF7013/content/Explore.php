<?php
include 'Head.php';
//include 'dbconn_local.php';
include 'dbconn.php';
if (isset($_GET['Explore'])) {
    $exploreName = $_GET['Explore'];
    $sql = "SELECT * FROM training_sessions WHERE Category = ?";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"s",$exploreName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    
  
} else {
    die("Invalid experience ID.");
}
?>


<!DOCTYPE html>
<html lang="en-GB">
    
    <body>
          <!--Navigation Bar-->
        <?php
            include 'Navbar.php';

        ?>
          

        <main>
        <div class = "Available-experiences-h1">
        <h1><?php echo $exploreName ?></h1>
        </div>
        <div class="experiences-grid">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <!--Retriev one by one for tile display-->
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="experiences-tile">
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
                <p>No experiencess available at the moment.</p>
            <?php endif; ?>
        </div>
            </div>


            <?php
                include 'NewsletterSub.php';
            ?>
        </main>
        <?php
            include 'footer.php';
        ?>
    </body>

