<?php
get_header();
    ?>
<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php ;?>/assets/img/parallax-1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php ;?>/assets/img/parallax-2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php ;?>/assets/img/parallax-3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->

<div class="container">
    
    <nav class="navbar navbar-light event-nav">
        <form class="form-inline">
            <button class="btn btn-outline-success" type="button">我的活動</button>
            <button class="btn btn-outline-primary" type="button">新增活動</button>
        </form>
    </nav>
    <div class="container event-section">
        <div class="row section-header">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                    <h2>本週活動</h2>
            </div>
        </div>

        <?php
        if(have_posts()):
            $counter=0;
            while(have_posts()){
                the_post();
                if ($counter%4==0){
                    echo '<div class="row card-group">';
                }

                get_template_part('content',get_post_format());

                if ($counter%4==3){
                    echo "</div>";
                }
            $counter+=1;
            }
            if ($counter%4!=0){
                echo "</div>";
            }
        ?>
        <?php
        else:
            echo'<p>No content found</p>';
        endif;?>
    </div>

    <div class="container event-section">
        <div class="row section-header">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                    <h2>已結束活動</h2>
            </div>
        </div>

        <?php
        if(have_posts()):
            $counter=0;
            while(have_posts()){
                the_post();
                if ($counter%4==0){
                    echo '<div class="row card-group">';
                }

                get_template_part('content',get_post_format());

                if ($counter%4==3){
                    echo "</div>";
                }
            $counter+=1;
            }
            if ($counter%4!=0){
                echo "</div>";
            }
        ?>
        <?php
        else:
            echo'<p>No content found</p>';
        endif;?>
    </div>

    
</div> <!-- container -->
<?php get_footer();
?>