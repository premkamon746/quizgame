
<div class="col-lg-6">
  <section class="panel">
      <header class="panel-heading ">
          <h3>Preview</h3>
      </header>
      <div class="panel-body">
      

        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

            <?php if(isset($game)&&$game->num_rows() > 0) : ?>
               <div class="form-group">
                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">รูปภาพปก</label>
                      <div class="col-lg-10">
                        <img src="<?=base_url()?>uploads/<?=$game_id?>/<?=$game->row()->picture;?>" width="300" />

                        <input type="file" class="form-control" id="title" name="userfile" placeholder="ชื่อเกม" maxlength="2000" required>
                        <p class="help-block">อัพโหลดรูปภาพปก เป็น file jpg,png,gif</p>
               
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">ชื่อเกม</label>
                      <div class="col-lg-10">
                        <?=$game->row()->title; ?>
                         
                           <input type="text" class="form-control" id="title" name="title" placeholder="ชื่อเกม" value="<?=$game->row()->title; ?>" maxlength="2000" required>
                           <p class="help-block">กรอกชื่อเกม เช่น รูปภาพดาราตอนเด็ก คุณรู้หรือไม่</p>
                        

                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                          <button type="submit" class="btn btn-danger">ต่อไป &gt;&gt;</button>
                      </div>
                  </div>

              <?php endif; ?>
         <form>
      </div>
  </section>
</div>