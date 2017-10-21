<div class="row">
      <?php foreach ($result->result() as $r) {?>
      <div class="col-md-4 col-lg-4 col-sm-4 col-sx-4">
            <div><a href="<?=site_url("post/game/$r->id")?>"><img src="<?=base_url();?>uploads/<?=$r->id?>/<?=$r->picture?>" width="100%"/></a></div>
            <div><a href="<?=site_url("post/game/$r->id")?>"><?=$r->title?></a></div>
            <!-- <div><?=$r->detail?></div> -->
      </div>
      <?php }//end foreach ?>
</div>
