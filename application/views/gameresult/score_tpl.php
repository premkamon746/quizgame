<?php $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

<?php foreach ($gameinfo->result() as $r) {?>

<div class="row">

      <div style="margin:0 auto;width:500px;">




                  <div><?=$r->title?></div>
                  <div><?=$r->detail?></div>
            <div class="col-md-12">
                  <div>
                  	<a href="<?=site_url("post/game/$r->id")?>">

                              <?php if(isset($picture) && $picture != "") :?>
      	                  	<img src="<?=base_url();?>uploads/<?=$r->id?>/<?=$picture?>" width="350"/>
                              <?php else :?>
                                    <img src="<?=base_url();?>uploads/<?=$r->id?>/<?=$r->picture?>" width="350"/>
                              <?php endif?>
	                  </a>
	              </div>
                        <H2><?php if(($r->show_score==1)) :?>
                               <?=$total_point?>
                                    <?php if(($r->show_total==1)) :?>
                                          /<?=$game_point?>
                                    <?php endif  ?>
                                    คะแนน
                              
                        <?php endif  ?></H2>
                        <?=isset($title)?$title: ''?>
                    <div><?=isset($game_res)?$game_res: ''?></div>
            </div>

      </div>
</div>

<div class="row">
      <div class="text-center">
            <button id="shareBtn" type="button" class="btn btn-lg active" role="button" aria-pressed="true" style="background-color:#3c579e;">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  แชร์ไป facebook
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </button>
            <a href="<?=site_url("post/comment/$game_id") ?>" class="btn btn-success btn-lg active" role="button" aria-pressed="true">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  ลองเล่นใหม่อีกครั้ง
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </a>
      </div>
</div>
<?php }//end foreach ?>


<script>

      <?php if(isset($_GET['tg'])) :?>
            window.location="<?='http://' . $_SERVER['HTTP_HOST'] . "/post/game/$game_id" ?>";
      <?php endif ?>
      window.fbAsyncInit = function() {
      FB.init({
            appId            : '211474989230282',
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v2.10'
      });
      FB.AppEvents.logPageView();
      };

      (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));

      <?php $share = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
      document.getElementById('shareBtn').onclick = function() {
            FB.ui({
             method: 'feed',
             link: '<?=$share?>?tg=<?=time()?>',
             caption: 'An example caption',
           }, function(response){});
      }

</script>
