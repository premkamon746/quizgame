<div class="col-lg-12">
  <section class="panel">
      <header class="panel-heading ">
          <h3>สร้างเกม</h3>
      </header>
      <div class="panel-body">
          <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">


              <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">รูปภาพปก</label>
                  <div class="col-lg-10 " >
                  
                    <?php if(isset($game)&&$game->num_rows() > 0) : ?>
                        <img src="<?=base_url()?>uploads/<?=$game_id?>/<?=$game->row()->picture;?>" width="300" />
                    <?php else: ?>
                        <div style="background: #eaeaea;"><img src="<?=base_url()?>assets/img/img_preview.png" width="300" /></div>
                    <?php endif; ?>
                      
                    

                      <input type="file" class="form-control" id="title" name="userfile" placeholder="ชื่อเกม" 
                        maxlength="2000"  <?=(isset($game)&&$game->num_rows() > 0)?'':'required'?> >
                      <p class="help-block">อัพโหลดรูปภาพปก เป็น file jpg,png,gif</p>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">ชื่อเกม</label>
                  <div class="col-lg-10">
                      <input type="text" class="form-control" id="title" name="title" placeholder="กรอกชื่อเกม เช่น รูปภาพดาราตอนเด็ก คุณรู้หรือไม่" maxlength="2000"
                       value="<?=(isset($game)&&$game->num_rows() > 0)?$game->row()->title:''?>" required>

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
      </div>
  </section>
</div>
