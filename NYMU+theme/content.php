<div class="col-md-12  col-lg-3 card outer-card">
    <a href="<?php the_permalink();?>">
    <div class="single-team card" style="height:100%">
        
        <div class="team-photo">
            <img src="<?php the_post_thumbnail_url();?>" alt="">
        </div>
            <div class="event-title">
                <h4><?php
                $title=get_the_title();
                if (mb_strlen($title)>8){
                    echo mb_substr( $title,0,8,"utf-8")."...";
                }else{
                    echo $title;
                }
                // echo  mb_strlen($title);
                // echo $title;
                ?>
                    
                </h4>
            </div>
            <div class="event-content">
                <p>日期：<?php the_time('Y-m/j');?></p>
                <p>地點：<?php echo get_the_excerpt();?></p>
            </div>
        
    </div>

    <div class="card-footer outer-card">
    </div>
    </a>
</div>