<?php $i=1;?>
<?php foreach ($answer as $ans) : ?>
<div class="choice_no" >

      <div class="activity all">
          <span>
             <button type="button" class="btn btn-info btn-circle btn-lg"><?=$i ?>.</button>
          </span>
          <div class="activity-desk">
             <div class="panel">
                  <div class="panel-body">
                        <div class="row" >
                              <div class="col-lg-8 col-md-8 col-xs-8">

                                        <textarea class="form-control" id="question" name="choice[]" rows="5" placeholder="คำตอบ" ><?=isset($ans->answer)?$ans->answer:""?></textarea>
                                         <input type="text" class="form-control"  name="point[]" value="<?=isset($ans->point)?$ans->point:""?>"  />
                                        <!-- <p class="help-block">อัพโหลดรูปภาพปก เป็น file jpg,png,gif</p> -->

                              </div>
                              <div class="col-lg-4 col-md-4 col-xs-4">

                                          <div class="upload_photo" >

                                                <?php if(isset($ans->picture) && $ans->picture != ""){ ?>
                                                      <img src="<?=base_url()?>/uploads/<?=$game_id?>/<?=$ans->picture ?>" width="120" class="selectImage" />
                                                <?php }else{ ?>
                                                      <img src="<?=base_url()?>/assets/img/no_preview.jpg" width="120" class="selectImage" />
                                                <?php }//endif?>
                                            <input type="file" class="form-control choice"  name="userfile[]"  data-no="<?=$i ?>" style="display: none;"/>
                                          </div>
                                </div>
                                </div>
                          </div>
                  </div>
             </div>
          </div>
  </div>
<?php $i++; endforeach ?>
