
<form class="form-horizontal" role="form" id="questionForm" method="post" action="<?=site_url("post/comment/$game_id/$no_next")?>"  >
<input type="hidden" name="javascriptSubmit" value="2" />
<div class="activity">

                  <div class="panel panel-primary">
                  		<div class="panel-heading">
                                  <?=$game_title->row()->title;?>
                              </div>
                        <div class="panel-body">

                        	<div class="row">
	                      		<div class="col-lg-12 text-left">
                                          <?=$no.". " ?>
                                          <?php
                                                if($qest->picture!=""){
                                                      echo "<img src='".base_url()."uploads/$game_id/".$qest->picture."' width='200' />";
                                                }
                                          ?>
                                          <?=nl2br($qest->question) ?>
                                          <br/>
                                      <?php if($timetype == "questlimit") : ?>
                                            <div class="progress">
                                              <div class=" progress-bar-striped bg-info progress-bar" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                      <?php endif; ?>
                                      <br/>
	                             	<ul class="list-group">
	                             			<?php foreach($ans->result() as $a) : ?>
	                                      		<li class="list-group-item">
	                                      			<input type="radio" name="choice" value="<?=$a->id?>" />
	                                      			<?=$a->no?>.
	                                      			<?=$a->answer?>
	                                      			<div style="margin-left:20px;">
		                                      			<?php
		                                      				if($a->picture!=""){
		                                      					echo "<img src='".base_url()."uploads/$game_id/".$a->picture."' width='200' />";
		                                      				}
		                                      			?>
		                                      		</div>
	                                      		</li>
	                                  		<?php endforeach?>
	                                </ul>
	                            </div>
	                        </div>
                		</div>
                  </div>

      </div>
  </form>

  <script>
  	$(document).ready(function(){
  		$("input[type='radio']").click(function(){
  			$("#questionForm").submit();
  		});
  	});

      <?php if($timetype == "questlimit") : ?>
      var n = <?=$time?>;
      var tm = setInterval(countDown,1000);
      function countDown(){
         n--;
         if(n == 0){
            clearInterval(tm);
            $("#questionForm").submit();
         }

         var progress = n/<?=$time?>*100;
         $('.progress-bar').css("width",progress+"%");
         //$("#timedown").html(n);
      }

      <?php endif; ?>
  </script>
