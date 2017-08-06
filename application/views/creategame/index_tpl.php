
<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">


      <div class="activity terques">

            <div class="">
                  <div class="panel">
                        <div class="panel-body">
                              <div class="row" >
                                    <div class="col-lg-6 col-md-6 col-xs-6">

                                          <input type="text" class="form-control" id="title" name="title" placeholder="กรอกชื่อเกม เช่น รูปภาพดาราตอนเด็ก คุณรู้หรือไม่" maxlength="2000"
                                          value="<?=(isset($game)&&$game->num_rows() > 0)?$game->row()->title:''?>" required>
                                          <p class="help-block">กรอกชื่อเกม เช่น รูปภาพดาราตอนเด็ก คุณรู้หรือไม</p>

                                          <input type="file" class="form-control" id="title" name="userfile" placeholder="ชื่อเกม"
                                          maxlength="2000"  <?=(isset($game)&&$game->num_rows() > 0)?'':'required'?> >
                                          <p class="help-block">อัพโหลดรูปภาพปก เป็น file jpg,png,gif</p>

                                          <div class="row">
                                                <div class="col-lg-8">
                                                <ul class="list-group">
                                                      <li class="list-group-item"><input type="radio" name="timelimit_type" value="nolimit" checked >ไม่จำกัดเวลา</td></li>
                                                      <li class="list-group-item"><input type="radio" name="timelimit_type" value="gamelimit">เวลารวมทุกข้อภายใน</li>
                                                      <li class="list-group-item"><input type="radio" name="timelimit_type" value="questlimit">เวลาแต่ละข้อภายใน</li>
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
                <button type="submit" class="btn btn-danger">ต่อไป &gt;&gt;</button>
            </div>
      </div>
</form>

<script>
      $(document).ready(function(){
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
