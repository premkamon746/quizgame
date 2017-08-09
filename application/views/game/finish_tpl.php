<div class="row">
      <div style="margin:0 auto;width:500px;">
            <?php foreach ($result->result() as $r) {?>
            <div class="col-md-12">
                  <div><a href="<?=site_url("post/game/$r->id")?>"><img src="<?=base_url();?>uploads/<?=$r->id?>/<?=$r->picture?>" width="100%"/></a></div>
                  <div><?=$r->title?></div>
                  <div><?=$r->detail?></div>
            </div>
            <?php }//end foreach ?>
      </div>
</div>
