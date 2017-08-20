<div class="row">
      <div style="margin:0 auto;width:500px;">

            <div class="col-md-12">
                  <H4><?=$res->title?></H4>
                  <div><?=$res->detail?></div>
                  <div><a href="<?=site_url("post/game/$res->id")?>"><img src="<?=base_url();?>uploads/<?=$res->id?>/<?=$res->picture?>" width="350"/></a></div>
                  <H4>
                        <?php
                              if($res->timelimit_type == "questlimit"){
                                    echo "กำหนดเวลาข้อละ $res->time_limit วินาที";
                              }elseif($res->timelimit_type == "gamelimit"){
                                    echo "กำหนดเวลาสำหรับ quiz $res->time_limit/60 นาที";
                              }

                        ?>
                  </H4>
            </div>

      </div>
</div>
