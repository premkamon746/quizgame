

<div class="row">
      <div style="margin:0 auto;width:500px;">



            <?php foreach ($gameinfo->result() as $r) {?>
                  <div><?=$r->title?></div>
                  <div><?=$r->detail?></div>
            <div class="col-md-12">
                  <div>
                  	<a href="<?=site_url("post/game/$r->id")?>">
	                  	<img src="<?=base_url();?>uploads/<?=$r->id?>/<?=$r->picture?>" width="350"/>
	                  </a>
	              </div>
                    <H2> <?=$total_point?>/<?=$game_point?> คะแนน</H2>
                    <H4><?=isset($game_res)?$game_res: ''?></H4>
            </div>
            <?php }//end foreach ?>
      </div>
</div>

<div class="row">
      <div class="text-center">
            <a href="<?=site_url("post/comment/$game_id") ?>" class="btn btn-lg active" role="button" aria-pressed="true" style="background-color:#3c579e;">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  แชร์ไป facebook
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </a>
            <a href="<?=site_url("post/comment/$game_id") ?>" class="btn btn-success btn-lg active" role="button" aria-pressed="true">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  ลองเล่นใหม่อีกครั้ง
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </a>
      </div>
</div>
