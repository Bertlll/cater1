<?php
include '../config/database.php';
include '../controllers/action.php';
?>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <span class="d-block d-lg-none  mx-0 px-0"><img src="img/logo-white.png" alt="" class="img-fluid"></span>
    <span class="d-none d-lg-block">
      <?php
      $sql = mysqli_query($conn, "SELECT * FROM `cater_profile` WHERE id_number = $id_number");
      $row1 = mysqli_fetch_array($sql);

      if (empty($row1['profile_pic'])) {
        echo "<img class='img-fluid img-profile rounded-circle mx-auto mb-2' src='../system_img/profile_edit.png' alt=''>";
      }
      if (!empty($row1['profile_pic'])) {
        echo "<img class='img-fluid img-profile rounded-circle mx-auto mb-2' src='" . $row1['url_pic'] . "'>";
      }
      ?>

    </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#page-top" id="">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#experience">Portfolio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#bundles">Bundles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid p-0">

    <!--====================================================
                        ABOUT
    ======================================================-->
    <?php
    $getBanner = mysqli_query($conn, "SELECT * FROM `cater_profile` WHERE id_number = $id_number");
    $rowBanner = mysqli_fetch_array($getBanner);
    $banner = $rowBanner['url_banner'];
    ?>
    <section class="resume-section d-column" id="about" style="background-image: url(<?php echo $banner; ?>);">
      <div class="my-auto">
        <img src="img/logo-s.png" class="img-fluid mb-3" alt="">
        <div style="text-align: center;">
          <h1 class="mb-0"><?php echo $comp_name ?></h1>
          <?php
          $getAbouts = mysqli_query($conn, "SELECT * FROM `cater_profile` WHERE id_number = $id_number");
          $rowAbouts = mysqli_fetch_array($getAbouts);
          $about = $rowAbouts['about'];
          $tagline = $rowAbouts['tagline'];
          ?>
          <div class="subheading mb-5"><?php echo $tagline; ?></div>
          <p style="padding-left: 10rem;padding-right: 10rem"><?php echo $about; ?></p>
          <ul class="list-inline list-social-icons mb-0">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </section>

    <!--====================================================
                        PORTFOLIO
    ======================================================-->
    <section class="resume-section p-3 p-lg-5 " id="experience">
      <div class="row my-auto">
        <div class="col-12 text-center">
          <h2 class="text-center">Portfolio</h2>
        </div>

        <?php
        $sql2 = mysqli_query($conn, "SELECT * FROM `cater_folder` WHERE id_number = $id_number");
        while ($row = mysqli_fetch_array($sql2)) {
          $title = $row['title'];
          $description = $row['description'];
          $folder_num = $row['folder_num'];
          $id_number = $row['id_number'];

          echo "<div class='resume-item col-md-4 col-sm-4'>
                <div class='card mx-0 p-4 mb-5' style='border-color: #17a2b8; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.21);'>";
          echo "<a href='#view" . $folder_num . "' data-toggle='modal' style='text-decoration:none'>";
          echo "<div class='resume-content mr-auto'>";
          echo "<h4 class='mb-3'>" . $title . "</h4>";

          $result_p = mysqli_query($conn, "SELECT * FROM image_folder WHERE folder_num = '$folder_num'");
          $row_p = mysqli_fetch_array($result_p);

          echo "<img src='" . $row_p['url'] . "' width='280' height='200'>";

          echo "</div>";
          echo "</a>";
          echo "</div>";
          ?>
          <!-- MODAL TO VIEW SELECTED PORTFOLIO-->
          <div class="modal fade" role="dialog" id="view<?php echo $folder_num ?>" tabindex="-1">
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header" style="border: 0">
                  <h4 class="col-12 modal-title text-center"><?php echo $title; ?></h4>
                </div>
                <div class="modal-header">
                  <p class="col-12 text-center"><?php echo $description ?></p>
                </div>

                <div class="modal-body">
                  <?php
                    $result = mysqli_query($conn, "SELECT * FROM image_folder WHERE folder_num = '$folder_num'");
                    echo "<div class='row my-auto'>";
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<div class='col-sm-6 text-center form-group'><a href='" . $row['url'] . "'><img src='" . $row['url'] . "' width='566px' height='424px' /></a></div>";
                    }
                    echo "</div><br>";
                    ?>
                </div>

                <div class="modal-footer">
                  <input type="submit" name="upload" class="btn btn-dark" style="color: orange;" value="Upload" onClick="clearform();">
                  <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </section>

    <!--====================================================
                        PORTFOLIO
    ======================================================-->
    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="bundles">
      <div class="row my-auto">
        <div class="col-12">
          <h2 class="  text-center">Bundles</h2>
          <div class="mb-5 heading-border"></div>
        </div>
        <div class="col-md-12">
          <div class="port-head-cont">
            <button class="btn btn-general btn-green filter-b" data-filter="all">All</button>
            <button class="btn btn-general btn-green filter-b" data-filter="consulting">Web Design</button>
            <button class="btn btn-general btn-green filter-b" data-filter="finance">Mobile Apps</button>
            <button class="btn btn-general btn-green filter-b" data-filter="marketing">Graphics Design</button>
          </div>
        </div>
      </div>
      <div class="row my-auto">
        <div class="col-sm-4 portfolio-item filter finance">
          <a class="portfolio-link" href="#portfolioModal4" data-toggle="modal">
            <div class="caption-port">
              <div class="caption-port-content">
                <i class="fa fa-search-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/p-4.jpg" alt="">
          </a>
        </div>
        <div class="col-sm-4 portfolio-item filter marketing">
          <a class="portfolio-link" href="#portfolioModal5" data-toggle="modal">
            <div class="caption-port">
              <div class="caption-port-content">
                <i class="fa fa-search-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/p-5.jpg" alt="">
          </a>
        </div>
        <div class="col-sm-4 portfolio-item filter consulting">
          <a class="portfolio-link" href="#portfolioModal6" data-toggle="modal">
            <div class="caption-port">
              <div class="caption-port-content">
                <i class="fa fa-search-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/p-6.jpg" alt="">
          </a>
        </div>
        <div class="col-sm-4 portfolio-item filter consulting">
          <a class="portfolio-link" href="#portfolioModal7" data-toggle="modal">
            <div class="caption-port">
              <div class="caption-port-content">
                <i class="fa fa-search-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/p-7.jpg" alt="">
          </a>
        </div>
        <div class="col-sm-4 portfolio-item filter consulting">
          <a class="portfolio-link" href="#portfolioModal8" data-toggle="modal">
            <div class="caption-port">
              <div class="caption-port-content">
                <i class="fa fa-search-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/p-8.jpg" alt="">
          </a>
        </div>
        <div class="col-sm-4 portfolio-item filter finance">
          <a class="portfolio-link" href="#portfolioModal9" data-toggle="modal">
            <div class="caption-port">
              <div class="caption-port-content">
                <i class="fa fa-search-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/p-9.jpg" alt="">
          </a>
        </div>
        <div class="col-sm-4 portfolio-item filter marketing">
          <a class="portfolio-link" href="#portfolioModal1" data-toggle="modal">
            <div class="caption-port">
              <div class="caption-port-content">
                <i class="fa fa-search-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/p-1.jpg" alt="">
          </a>
        </div>
        <div class="col-sm-4 portfolio-item filter marketing">
          <a class="portfolio-link" href="#portfolioModal2" data-toggle="modal">
            <div class="caption-port">
              <div class="caption-port-content">
                <i class="fa fa-search-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/p-2.jpg" alt="">
          </a>
        </div>
        <div class="col-sm-4 portfolio-item filter finance">
          <a class="portfolio-link" href="#portfolioModal3" data-toggle="modal">
            <div class="caption-port">
              <div class="caption-port-content">
                <i class="fa fa-search-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/p-3.jpg" alt="">
          </a>
        </div>
      </div>
    </section>

    <!--====================================================
                          CONTACT
    ======================================================-->
    <section class="resume-section p-3 p-lg-5 d-flex flex-column">
      <div class="row my-auto" id="contact">
        <div class="col-md-8">
          <div class="contact-cont">
            <h3>CONTACT Us</h3>
            <div class="heading-border-light"></div>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here.</p>
          </div>
          <div class="row con-form">
            <div class="col-md-12">
              <input type="text" name="full-name" placeholder="Full Name" class="form-control">
            </div>
            <div class="col-md-12">
              <input type="text" name="email" placeholder="Email Id" class="form-control">
            </div>
            <div class="col-md-12">
              <input type="text" name="subject" placeholder="Subject" class="form-control">
            </div>
            <div class="col-md-12"><textarea name="" id=""></textarea></div>
            <div class="col-md-12 sub-but"><button class="btn btn-general btn-white" role="button">Send</button></div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12 mt-5">
          <div class="contact-cont2">
            <div class="contact-add contact-box-desc">
              <h3><i class="fa fa-map-marker cl-atlantis fa-2x"></i> Address</h3>
              <p>25, Dist town Street, Logn <br>
                California, US <br></p>
            </div>
            <div class="contact-phone contact-side-desc contact-box-desc">
              <h3><i class="fa fa-phone cl-atlantis fa-2x"></i> Phone</h3>
              <p>800 123 3456 <br>900 123 3457</p>
            </div>
            <div class="contact-mail contact-side-desc contact-box-desc">
              <h3><i class="fa fa-envelope-o cl-atlantis fa-2x"></i> Email</h3>
              <address class="address-details-f">
                Fax: 800 123 3456 <br>
                Email: <a href="mailto:info@themsbit.com" class="">info@themsbit.com</a>
              </address>
              <ul class="list-inline social-icon-f top-data">
                <li><a href="#" target="_empty"><i class="fa top-social fa-facebook" style="color: #4267b2; border-color:#4267b2;"></i></a></li>
                <li><a href="#" target="_empty"><i class="fa top-social fa-twitter" style="color: #4AB3F4; border-color:#4AB3F4;"></i></a></li>
                <li><a href="#" target="_empty"><i class="fa top-social fa-google-plus" style="color: #e24343; border-color:#e24343;"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class=" d-flex flex-column" id="maps">
      <div id="map">
        <div class="map-responsive">
          <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6030.418742494061!2d-111.34563870463673!3d26.01036670629853!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1471908546569" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </section>


  </div>


  <!-- Global javascript -->
  <!--JS NASA ASSETS>JS-->
  <script src="../assets/js/jquery/jquery.min.js"></script>
  <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/jquery-easing/jquery.easing.min.js"></script>
  <script src="../assets/js/counter/jquery.waypoints.min.js"></script>
  <script src="../assets/js/counter/jquery.counterup.min.js"></script>
  <script src="../assets/js/custom.js"></script>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {

      $(".filter-b").click(function() {
        var value = $(this).attr('data-filter');
        if (value == "all") {
          $('.filter').show('1000');
        } else {
          $(".filter").not('.' + value).hide('3000');
          $('.filter').filter('.' + value).show('3000');
        }
      });

      if ($(".filter-b").removeClass("active")) {
        $(this).removeClass("active");
      }
      $(this).addClass("active");
    });

    // SKILLS
    $(function() {
      $('.counter').counterUp({
        delay: 10,
        time: 2000
      });

    });
  </script>