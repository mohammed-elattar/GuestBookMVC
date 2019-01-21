<!-- Post Box -->
<!--<div class="box post-box wow fadeIn" data-wow-duration="3s">-->
<!--    <div class="post-content">-->
<!--        <div class="date-container">-->
<!--            <span class="fa fa-calendar"></span>-->
<!--            <span class="date">--><?php //echo date('d/m/Y h:i A');?><!--</span>-->
<!--        </div>-->
<!--        <div class="clearfix"></div>-->
<!--        <p class="details">-->
<!--            --><?php //echo html_entity_decode(read_more($post->details, 20)) ;?><!--...-->
<!--        </p>-->
<!--    </div>-->
<!---->
<!--    <div class="post-box-footer">-->
<!--        <a href="#" class="user">-->
<!--            By:-->
<!--            <span class="main">--><?php //echo $post->first_name . ' ' . $post->last_name; ?><!--</span>-->
<!--        </a>-->
<!--    </div>-->
<!--</div>-->
<!--/ Post Box -->
<div class="col-sm-4 col-xs-12" id="main-content">
<div class="box post-box wow fadeIn" data-wow-duration="3s">
    <div class="post-content">
<div class="card mb-3">
    <img class="card-img-top img-responsive" src="<?php echo assets('images/' . $post->image); ?>" alt="Card image cap" >
    <div class="card-body">
        <h4 class="card-text"><?php echo html_entity_decode($post->details) ;?></h4>
        <p class="card-text"><small class="text-muted">Created  By</small>
            <b><?php echo $post->first_name . ' ' . $post->last_name; ?></b>
        </p>
    </div>
</div>
    </div>
</div>
</div>
