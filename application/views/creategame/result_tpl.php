<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" >

<div class="activity">

                  <div class="panel">
                  		<div class="panel-heading">ผลเกม</div>
                              <p class="help-block">เช่น ช่วงคะแนน 0-3 ยังอ่อน, 4-5, เริ่มแก่ (หากไม่กรอกจะแสดงเฉพาะคะแนน)</p>
                        <div class="panel-body">
                              <div class="row" >
                                    <div style="max-width:800px;margin:0 auto;">
                                          <p class="help-block">คะแนนเต็ม : <?=$point?></p>
                                          <table id="resultTable" class="table">

                                                <?php if($result->num_rows() > 0){ ?>
                                                      <?php foreach ($result->result() as $r) :?>
                                                            <tr class="tt">
                                                                  <td width="10%">คะแนน<input type="hidden" name="res_id[]" value="<?=$r->id?>"/> </td>
                                                                  <td  width="15%"><input type="number" class="form-control" name="start_score[]" min="0" step="1" value="<?=$r->start_score?>" /></td>
                                                                  <td  width="5%">ถึง</td>
                                                                  <td  width="15%"><input type="number" class="form-control" name="end_score[]" min="0" step="1"  value="<?=$r->end_score?>" /></td>
                                                                  <td  width="5%">ผล</td>
                                                                  <td>
                                                                  	<input type="text" class="form-control" name="title[]" 
                                                                    value="<?=$r->title?>" /><br/>
                                                                        <textarea  class="form-control" name="result[]" rows="5" ><?=$r->result?></textarea><br/>
                                                                        <input type="file" class="form-control" name="userfile[]" />
                                                                        <img src="<?=base_url()?>uploads/<?=$game_id?>/<?=$r->picture?>" width="387" />
                                                                  </td>
                                                                  <td  width="5%"><i class="icon-remove-sign " style="color:red;cursor:pointer;" onclick="deleteResFn(<?=$r->id?>);"></i> </td>
                                                            </tr>
                                                      <?php endforeach ?>

                                                <?php }else{ ?>
                                                      <!-- <?php for ($i = 0; $i < 5; $i++) :?>
                                                            <tr class="tt">
                                                                  <td width="10%">คะแนน<input type="hidden" name="res_id[]" /> </td>
                                                                  <td  width="15%"><input type="number" class="form-control" name="start_score[]" min="0" step="1" /></td>
                                                                  <td  width="5%">ถึง</td>
                                                                  <td  width="15%"><input type="number" class="form-control" name="end_score[]" min="0" step="1" /></td>
                                                                  <td  width="5%">ผล</td>
                                                                  <td>
                                                                        <textarea  class="form-control" name="result[]" rows="5" ></textarea><br/>
                                                                        <input type="file" class="form-control" name="userfile[]" />
                                                                  </td>

                                                            </tr>
                                                      <?php endfor ?> -->

                                                <?php }//endif ?>
                                                <tr class="tt">
                                                      <td width="10%">คะแนน<input type="hidden" name="res_id[]" /> </td>
                                                      <td  width="15%"><input type="number" class="form-control" name="start_score[]" min="0" step="1" /></td>
                                                      <td  width="5%">ถึง</td>
                                                      <td  width="15%"><input type="number" class="form-control" name="end_score[]" min="0" step="1" /></td>
                                                      <td  width="5%">ผล</td>
                                                      <td><input type="text" class="form-control" name="title[]"  /><br/>
                                                            <textarea  class="form-control" name="result[]" rows="5" ></textarea><br/>
                                                            <input type="file" class="form-control" name="userfile[]" />
                                                      </td>
                                                      <td  width="5%"></td>

                                                </tr>
                                          </table>
                                          <button type="button" name="back" class="btn btn-info" id="addResult"><span class="glyphicon glyphicon-plus"> </button>

                                    </div>
                              </div><br/><br/>

                              <div class="row" >
                                    <div class="form-group">
							            <div class="col-lg-12"><!-- col-lg-offset-2  -->
							                <button type="submit"  name="back" class="btn btn-danger">บันทึก </button>
                                                          <a href="<?=site_url("creategame/finish/$game_id")?>"  class="btn btn-success">เสร็จสิ้น</a>
							            </div>
							      </div>

                              </div>
                        </div>
                  </div>

      </div>
  </form>

  <script>
      $(document).ready(function(){
            $("#addResult").click(function(){
                  var html = $(".tt:last").html();
                  $("#resultTable").append("<tr>"+html+"</td>");
            })

      });


      function deleteResFn(id){
            if(confirm("Delete!!!!!?")){
                  window.location = "<?=site_url("creategame/delete_res/$game_id")?>/"+id;
            }
      }



  </script>
