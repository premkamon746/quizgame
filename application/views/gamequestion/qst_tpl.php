<div class="activity terques">

    <div class="">
      <div class="panel">
            <div class="panel-body">
                  <div class="row" >
                        <div class="col-lg-8 col-md-8 col-xs-8">

                                  <textarea class="form-control" id="question" name="choice[]" rows="5" placeholder="คำถาม" ><?=isset($question->question)?$question->question:"" ?></textarea>
                                  <input type="hidden" class="form-control"  name="point[]"  />
                                  <!-- <p class="help-block">อัพโหลดรูปภาพปก เป็น file jpg,png,gif</p> -->

                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-4">

                                    <div class="upload_photo" >

                                          <?php if(isset($question) && $question->picture != ""){ ?>
                                                <img src="<?=base_url()?>uploads/<?=$game_id?>/<?=$question->picture ?>" width="200" class="selectImage" />
                                          <?php }else{ ?>
                                                <img src="<?=base_url()?>assets/img/no_preview.jpg" width="200" class="selectImage" />
                                          <?php }//endif?>
                                      <input type="file" class="form-control"  name="userfile[]"   >
                                    </div>
                          </div>
                          </div>
                    </div>
            </div>
      </div>
    </div>
