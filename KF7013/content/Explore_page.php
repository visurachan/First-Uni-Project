<!DOCTYPE html>
<html lang="en-GB">
    <?php
    include 'Head.php';
    ?>
        <body>
          <!--Navigation Bar-->
          <?php
            include 'Navbar.php';

          ?>
          

        <main>
        <section id="explore-section" aria-labelledby="Explore-our-experience-categories" class="explore-section">
                  <h2 id="Explore-our-experience-categories">Explore our learning experiences</h2>
                  <p>Want to learn Sri Lankan experiences? We got you covered. Explore each category to find out more.</p>
                
                  <ul class="explore-grid">
                    <li class="explore-image-tile">
                      <a href="Explore.php?Explore=Flavours of Sri Lanka" aria-label="Explore Flavors of Sri Lanka">
                        <img src="../assets/images/HomePage/flavours.png" alt="Sri Lankan cuisine">
                        <div class="overlay-explore">
                          <h3>Flavours of Sri Lanka</h3>
                          <p>Authentic local cuisine</p>
                        </div>
                      </a>
                    </li>
                    <li class="explore-image-tile">
                      <a href="Explore.php?Explore=Agriculture and Rural Life" aria-label="Explore Agriculture and Rural life">
                        <img src="../assets/images/HomePage/halpetea-factory-tour-3.jpg" alt="Couple picking tea leaves">
                        <!--Image Source: halpetea.com-->
                        <!--https://www.halpetea.com/our-businesseshalpeteatour.html-->
                        
                        <div class="overlay-explore">
                          <h3>Agriculture and Rural Life</h3>
                          <p>Roots of tradition</p>
                        </div>
                      </a>
                    </li>
                    <li class="explore-image-tile">
                      <a href="Explore.php?Explore=Adventures" aria-label="Explore adventures">
                        <img src="../assets/images/HomePage/parachute.jpg" alt="Parachuting over the beach ">
                        <!--Image Source: Hobi Photography on Pexels-->
                        <!--https://www.pexels.com/photo/aerial-view-of-silhouetted-shore-and-a-person-flying-with-a-parachute-over-the-sea-at-sunset-16460415-->
                        
                        <div class="overlay-explore">
                          <h3>Adventures</h3>
                          <p>Thrill awaits</p>
                        </div>
                      </a>
                    </li>
                    <li class="explore-image-tile">
                      <a href="Explore.php?Explore=Art and Crafts" aria-label="Explore arts and crafts">
                        <img src="../assets/images/HomePage/pottery.jpg" alt="crafting pottery">
                        <!--Image Source: Thinking Hand School of Pottery on Facebook-->
                        <!--https://www.facebook.com/LearnPotteryYP/photos/pb.100064671852809.-2207520000/2843064365959819/?type=3&locale=en_GB-->
                        
                        <div class="overlay-explore">
                          <h3>Arts and Crafts</h3>
                          <p>Craft your story</p>
                        </div>
                      </a>
                    </li>

                    <li class="explore-image-tile">
                      <a href="Explore.php?Explore=Journey through Time" aria-label="Explore transport modes">
                        <img src="../assets/images/HomePage/cart.jpeg" alt="People on an Oxen cart">
                        <!--Image Source: Ceylon Travellers Club on Facebook-->
                        <!--https://www.facebook.com/photo/?fbid=1169682431395828&set=a.619113783119365&locale=en_GB-->
                        
                        <div class="overlay-explore">
                          <h3>Journey through time</h3>
                          <p>Cultural rides</p>
                        </div>
                      </a>
                    </li>
                    
                    <li class="explore-image-tile">
                      <a href="Explore.php?Explore=Culture" aria-label="Explore culture">
                        <img src="../assets/images/HomePage/dancerkan.png" alt="Traditional Sri Lankan dancer">
                        <!--Image Source: Tien Nun Ching Photography on Facebook-->
                        <!--https://www.facebook.com/profile.php?id=100095269252746&locale=en_GB-->
                                                <div class="overlay-explore">
                          <h3>Culture</h3>
                          <p>Immerse in culture</p>
                        </div>
                      </a>
                    </li>
                   
                    
                  </ul>
                  
                </section>

        </main>
        <?php
                include 'NewsletterSub.php';
                ?>
                </main>

                  
                
                
                <?php
                include 'footer.php';
                ?>
                
        </body>
    

</html>
        
