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
                <!--Webpage top image with Overlay Search Bar-->
                  <section id="webpage-top"> 
                    <div id="home-image-container">
                        <img src="../assets/images/HomePage/top-home.jpg" alt="Kayaking in a Yala Lake">
                        <!--Image source: andbeyond.com,-->
                        <!--Image source: https://www.andbeyond.com/wp-content/uploads/sites/5/yala-national-park-sri-lanka-kayak.jpg" target="_blank">andbeyond.com-->
                        
                        <div id="overlay-text"> 
                            <h1>Learn Authentic Sri Lankan Experiences</h1>
                            <form action="/search" method="get" id="search-form"> 
                                <input type="search" placeholder="What you want to learn?" id="search-input"> 
                                <button type="button" id="search-button">Search</button> 
                            </form>
                        </div>
                        <ul id="home-top-list">
                            <li>30+ Experiences</li>
                            <li>5000+ Learners</li>
                            <li>100+ Guides</li>
                        </ul>
                    </div>
                  </section>


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

                <!--Why us section-->                

                <section>
                  <div class="why-us">
                  <div class="why-us-content">
                  <h2>Why Ceylon Learn</h2>
                  <div class="why-us-para">
                  <p>We are the leading tourist experience provider in Sri Lanka
                    with over 10 years of expertise. Our diverse offerings include 30+unique experiences designed for tourists to learn and immerse themselves in 
                    local culture.
                  </p>
                </div>
                <aside>
                  <a href="AboutUs.php">Learn more</a>
                  
                </aside>

                  <ul class="why-us-grid">
                    <li class="why-us-tile">
                      <img src="../assets/images/HomePage/safety.png" alt="safety vest icon">
                      <h4>Safety</h4>
                      <p>Health and Safety are our top priorities. Our equipment and environment meet stringent ISO standards, ensuring the highest levels of safety.</p>

                    </li>
                    <li class="why-us-tile">
                      <img src="../assets/images/HomePage/communitycare.png" alt="icon for community care">
                      <h4>Community support</h4>
                      <p>Our activities thrive in a rural village setting, and we proudly support local communities, partnering with area stakeholders.</p>

                    </li>
                    <li class ="why-us-tile">
                      <img src="../assets/images/HomePage/tutors.png" alt="icon for a tutor">
                      <h4>Local tutors</h4>
                      <p>Our guides are local experts who share their daily practices, offering you an authentic and immersive experience in every lesson.</p>

                    </li>
                    <li class ="why-us-tile">
                      <img src="../assets/images/HomePage/freedom.png" alt="happy face emoji with star rating">
                      <h4>Flexibility</h4>
                      <p>You have the freedom and flexibility to tailor your experiences to perfectly match your needs, ensuring a personalized and memorable journey.</p>

                    </li>
                  </ul>
                  </div>
                  </div>
                </section>

                <!--<section id="best-sellers" aria-labelledby="best-sellers-heading">
                  <h2 id="best-sellers-heading">Best Sellers</h2>
                </section>-->

                <?php
                include 'NewsletterSub.php';
                ?>
                </main>

                  
                
                
                <?php
                include 'footer.php';
                ?>
                
        </body>
    

</html>