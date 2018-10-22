<div class="secondary col-md-4 add_bottom_30 go-left">
 <div class="clearfix"></div>
  <div class="panel panel-default">
    <div class="panel-heading go-text-right"><?php echo trans('0284');?></div>
    <div class="panel-body">
      <form action="<?php echo base_url().'blog/search'; ?>" method="GET">
        <div class="input-group RTL">
          <input type="text" name="s" required placeholder="<?php echo trans('0283');?>" class="form-control sub_email">
          <span class="input-group-btn">
          <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> <?php echo trans('012');?></button>
          </span>
        </div>
      </form>
    </div>
  </div>
  <?php if(!empty($categories)){ ?>
  <div class="list-group">
    <div class="panel panel-default">
      <div class="panel-heading go-text-right"><?php echo trans('0288');?></div>
      <?php  foreach($categories as $cat):
        $count = pt_posts_count($cat->id);
        if($count > 0){
        ?>
      <a href="<?php echo base_url().'blog/category?cat='.$cat->slug; ?>" class="list-group-item">
        <strong class="go-right"><?php echo $cat->name;?></strong> <span class="go-left badge badge-default"><?php echo $count;?></span>
        <div class="clearfix"></div>
      </a>
      <?php  } endforeach; ?>
    </div>
  </div>
  <?php  } ?>
  <?php if(!empty($popular_posts)){ ?>
  <div class="panel panel-default">
    <div class="panel-heading go-text-right"><?php echo trans('0287');?></div>
    <div class="panel-body">
      <div class="content">
        <?php
          foreach($popular_posts as $post):
          $bloglib->set_id($post->post_id);
          $bloglib->post_short_details(); ?>
        <div class="row">
          <a href="<?php echo base_url().'blog/'.$post->post_slug;?>" class="col-md-4 col-sm-4 col-xs-12 go-right" >
          <img class="img-responsive post-img img-fade" src="<?php echo pt_post_thumbnail($post->post_id); ?>" alt="<?php echo $bloglib->title;?>" />
          </a>
          <div class="desc col-md-8 col-sm-8 col-xs-12 go-left row">
            <h5 style="margin-top: 0px;" class="go-text-right"><a href="<?php echo base_url().'blog/'.$post->post_slug;?>" ><?php echo character_limiter(strip_tags($bloglib->title), 20);?></a> <span class="text-warning weak"><br><?php echo $bloglib->date;?></span></h5>
          </div>
          <!--//desc-->
        </div>
        <!--//item-->
        <hr style="margin-top:10px;margin-bottom:10px">
        <?php endforeach; ?>
      </div>
      <!--//content-->
    </div>
  </div>
  <?php  } ?>
</div>
<!--//secondary-->