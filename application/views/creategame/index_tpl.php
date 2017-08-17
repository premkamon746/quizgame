
<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" onsubmit="return validateInput();">


      <div class="activity terques">

            <div class="">
                    <div class="panel panel-primary">
                    		<div class="panel-heading"><h4>สร้างเกม</h4></div>
                        <div class="panel-body">
                              <div class="row" >
                                    <div class="col-lg-6 col-md-6 col-xs-6">

                                          <input type="text" class="form-control" id="title" name="title" placeholder="กรอกชื่อเกม เช่น รูปภาพดาราตอนเด็ก คุณรู้หรือไม่" maxlength="2000"
                                          value="<?=(isset($game)&&$game->num_rows() > 0)?$game->row()->title:''?>" required>
                                          <p class="help-block">กรอกชื่อเกม เช่น รูปภาพดาราตอนเด็ก คุณรู้หรือไม่</p>


                                          <textarea class="form-control" id="question" name="detail" rows="5" placeholder="คำอธิบายเกมส์หรือคำเชิญชวนให้มาเล่นเกม" ><?=(isset($game)&&$game->num_rows() > 0)?$game->row()->detail:''?></textarea>
                                          <p class="help-block">คำอธิบายเกมส์หรือคำเชิญชวนให้มาเล่นเกม </p>

                                          <input type="file" class="form-control" id="title" name="userfile" placeholder="ชื่อเกม"
                                          maxlength="2000"  <?=(isset($game)&&$game->num_rows() > 0)?'':'required'?> >
                                          <p class="help-block">อัพโหลดรูปภาพปก เป็น file jpg,png,gif ขนาดภาพ กว้าง ยาว ไม่เกิน 1024 px</p>

                                          <div class="row">
                                                <div class="col-lg-8">
                                                  <ul class="list-group">
                                                        <li class="list-group-item"><input type="radio" name="timelimit_type" value="nolimit" checked >ไม่จำกัดเวลา</td></li>
                                                        <li class="list-group-item"><input type="radio" name="timelimit_type" value="questlimit">เวลาแต่ละข้อภายใน(วินาที)</li>
                                                        <!-- <li class="list-group-item"><input type="radio" name="timelimit_type" value="gamelimit">เวลารวมทุกข้อภายใน</li> -->
                                                  </ul>
                                                </div>
                                                <div class="col-lg-4 ">
                                                      <input type="text" class="form-control" id="time_limit" name="time_limit"
                                                      value="<?=(isset($game)&&$game->num_rows() > 0)?$game->row()->time_limit:''?>"
                                                      placeholder="วินาที" style="display:none;"/>

                                                </div>
                                                <div class="col-lg-12">จำกัดเวลาในการตอบคำถาม</div>
                                          </div>


                                    </div>
                                    <div class="col-lg-6 col-md-6 col-xs-6">
                                          <?php if(isset($game)&&$game->num_rows() > 0) : ?>
                                          <img src="<?=base_url()?>uploads/<?=$game_id?>/<?=$game->row()->picture;?>" width="300" />
                                          <?php else: ?>
                                          <div style="background: #eaeaea;"><img src="<?=base_url()?>assets/img/img_preview.png" width="300" /></div>
                                          <?php endif; ?>

                                    </div>

                              </div>
                        </div>
                  </div>
            </div>
      </div>


  <!-- <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">รายละเอียดเกม</label>
      <div class="col-lg-10">
          <textarea class="form-control" id="detail" name="detail" placeholder="กรอกชื่อเกม เช่น รูปภาพดาราตอนเด็ก คุณรู้หรือไม่" required rows="6"></textarea>

      </div>
  </div> -->


      <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
                <button type="submit" class="btn btn-danger">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  บันทึก
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <?php if($game_id): ?>
                  <a href="<?=site_url("gamequestion/index/$game_id");?>" class="btn btn-info">สร้างคำถาม</a>
                <?php endif ?>
            </div>
      </div>
</form>

<script>

      function validateInput(){
            ckbs = $('input[name="timelimit_type"]:checked').val();


            if(ckbs=="gamelimit" || ckbs =="questlimit"){
                  var sec = $("#time_limit").val();
                  if(sec <= 0){
                        $("#mesageModal").html("กรุณากรอกเวลาที่ต้องการจำกัด");
                        $("#alertModal").modal("show");
                        $('#alertModal').on('hidden.bs.modal', function () {
                            $("#time_limit").focus();
                        })

                        return false;
                  }
            }
            return true;
      }

      $(document).ready(function(){

            <?php if(isset($message)&&$message!="") : ?>
              $('#alertModal').modal('show');
            <?php endif ?>

            <?php if(isset($game)&&$game->num_rows() > 0) {
                  $tl = $game->row()->timelimit_type;
                  echo "$('input[value=\"$tl\"]').prop('checked','checked');";
                  if($tl!="nolimit"){
                        echo "$('#time_limit').show();";
                  }

            ?>

            <?php }?>
            $('input[name="timelimit_type"]').click(function(){
                  if($(this).val()=="nolimit"){
                        $("#time_limit").hide();
                        $("#time_limit").val("");
                  }else{
                        $("#time_limit").show();
                  }
            })
      })
</script>
