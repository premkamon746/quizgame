<? $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

<?php foreach ($gameinfo->result() as $r) {?>
<meta property="og:title" content="<?=$r->title?>" />
<meta property="og:type" content="article" />
<meta property="og:image" content="" />
<meta property="og:url" content="<?=$actual_link?>" />
<meta property="og:description" content="<?=$total_point?>/<?=$game_point?> คะแนน " <?=isset($game_res)?$game_res: ''?> />

<div class="row">

      <div style="margin:0 auto;width:500px;">




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

      document.getElementById('shareBtn').onclick = function() {
            FB.ui({
             method: 'feed',
             link: 'https://google.com',
             caption: 'An example caption',
           }, function(response){});
      }

</script>
