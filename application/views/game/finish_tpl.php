<div class="row">
      <div style="margin:0 auto;width:500px;">
            <H4>คะแนน <?=$total_point?>/<?=$game_point?></H4>
            <H4><?=isset($game_res)?$game_res: ''?></H4>
            <?php foreach ($gameinfo->result() as $r) {?>
            <div class="col-md-12">
                  <div>
                  	<a href="<?=site_url("post/game/$r->id")?>">
	                  	<img src="<?=base_url();?>uploads/<?=$r->id?>/<?=$r->picture?>" width="100%"/>
	                  </a>
	              </div>
                  <div><?=$r->title?></div>
                  <div><?=$r->detail?></div>
            </div>
            <?php }//end foreach ?>
      </div>
</div>
