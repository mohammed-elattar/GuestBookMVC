 <!-- Main Content -->
 <br><br>
        <div class="col-sm-9 col-xs-12" id="main-content">
          <div class="row">
            <?php foreach ($posts AS $post) { ?>
                <?php echo $post_box($post);?>
             <?php } ?>
          </div>
        </div>
        <!--/ Main Content -->
