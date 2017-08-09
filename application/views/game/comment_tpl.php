<form class="form-horizontal" role="form" id="questionForm" method="post" action="<?=site_url("post/comment/$game_id/$no_next")?>"  >

<div class="activity">

                  <div class="panel">
                  		<div class="panel-heading"><?=$qest->question ?></div>
                        <div class="panel-body">
                        	<div class="row">
	                      		<div class="col-lg-8">
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
	                            <div class="col-lg-4">
	                             	
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
  </script>