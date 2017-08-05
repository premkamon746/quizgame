
<div class="col-lg-12">
  <section class="panel">
      <header class="panel-heading ">
          <h3>สร้างเกม</h3>
      </header>
      <div class="panel-body">



            <? foreach ($all_question->result() as $aq) : ?>
                  <a href="#"><button type="button" class="btn btn-success btn-circle btn-lg"><?=$aq->no?></button></a>
            <? endforeach?>
                  <button type="button" class="btn btn-warning btn-circle btn-lg"><?=$all_question->num_rows()+1?></button>

          <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">


              <div class="form-group">
                 <header class="panel-heading text-left ">
                      คำถามข้อที่  <?=$question_no?>
                  </header>
                  <div class="row" >
                    <div class="col-lg-5">
                        <div>ภาพ</div>
                        <div class="upload_photo" style="background-color: #ffcbcb;">
                          <img src="<?=base_url()?>/assets/img/no_preview.jpg" width="276"/>
                          <input type="file" class="form-control" id="userfile" name="userfile[]" placeholder="ชื่อเกม"  >
                        </div>
                        <p class="help-block">หากมีภาพคำถาม เป็น file jpg,png,gif</p>
                    </div>
                    <div class="col-lg-7">
                        <div>คำถาม</div>
                        <textarea class="form-control" id="question" name="choice[]" rows="5" placeholder="คำถาม" ></textarea>
                        <input type="hidden" class="form-control"  name="point[]"  />
                        <!-- <p class="help-block">อัพโหลดรูปภาพปก เป็น file jpg,png,gif</p> -->
                    </div>
                  </div>
              </div>
              <hr/>

              <div class="form-group contain_choice" >


                <? for ($i=0; $i < 3 ; $i++) : ?>
                  <div class="choice_no" style="margin-left:120px;">

                        <div class="row" >
                          <div class="col-lg-5">
                              <div>ภาพข้อ <?=$i+1?>.</div>
                              <div  class="upload_photo" style="background-color: #ffcbcb;">
                                <img src="<?=base_url()?>/assets/img/no_preview.jpg"  width="276"/>
                                <input type="file" class="form-control choice"  name="userfile[]"  data-no="<?=$i+1?>" />
                              </div>
                              <p class="help-block">หากมีภาพคำถาม เป็น file jpg,png,gif</p>
                          </div>
                          <div class="col-lg-7">
                              <div>คำตอบข้อ <?=$i+1?>. </div>
                              <textarea class="form-control" id="choice" name="choice[]" rows="5" ></textarea>
                              <div class="col-md-3 text-right">
                                    คะแนน :
                              </div>
                              <div class="col-md-7 text-left">
                                     <input type="input" class="form-control"  name="point[]"  />
                                     <p class="help-block">คะแนนที่ผู้เล่นจะได้รับหากเลือกคำตอบนี้ เช่น ถ้าเป็นข้อที่ถูกได้ 1 คะแนน</p>
                              </div>

                              <!-- <p class="help-block">อัพโหลดรูปภาพปก เป็น file jpg,png,gif</p> -->
                          </div>
                        </div>

                    </div>
                <? endfor ?>
              </div>

              <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                          <button type="button" class="btn btn-primary add_button"><i class="icon-plus-sign"></i> เพิ่มคำตอบ</button>
                      </div>
                  </div>


              <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                      <a href="<?=site_url("creategame/index/$game_id")?>"><button type="button" class="btn btn-danger">&lt;&lt; ย้อนกลับ</button></a>
                      <button type="submit" name="next" class="btn btn-danger">ต่อไป &gt;&gt;</button>
                      <button type="submit" name="finish" class="btn btn-success">เสร็จสิ้น &gt;&gt;</button>
                  </div>
              </div>
          </form>
      </div>
  </section>
</div>


<!-- Modal -->
<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="memberModalLabel"> <?=isset($message)&&$message!=""?$message:""?></h4>
      </div>
    </div>
  </div>
</div>


<script>


function removeImage(obj){
  $(obj).closest(".upload_photo").find("img").prop("src","<?=base_url()?>/assets/img/no_preview.jpg");
  $(obj).closest(".upload_photo").find("input[type='file']").val("");
  $(obj).closest(".upload_photo").find(".removeContain").remove();
}

  $(document).ready(function(){

        <?php if(isset($message)&&$message!="") : ?>
          $('#alertModal').modal('show');
        <?php endif ?>

    $('.add_button').click(function(){

        var count_choice = $('.choice_no').length

        if(count_choice <20){
          var add_tag = $('.choice_no').html();
          add_tag ='<div class="choice_no" style="margin-left:120px;">'+add_tag+'</div>';
          $(".contain_choice").append(add_tag);
        }

    });


    $(document).on('change','input[type=file]',function() {


        console.log($(this));
        $obj = $(this);
        //var fd = new FormData($(this)[0]);
        var fd = new FormData();
        fd.append('image', $(this)[0].files[0]);

        var choice = "";
        if($(this).prop("class")=="form-control choice"){
          choice = $(this).data("no");
        }




        $.ajax({
            url:'<?=site_url("upload/picture/$game_id/$question_no")?>/'+choice+"?t="+(new Date().getTime()), //YOUR DESTINATION PAGE
            type: "POST",
            data: fd,
            enctype: 'multipart/form-data',
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function (data)
            {
         //some code if you want
              $obj.closest(".upload_photo").find("img").prop("src",data);
              $obj.closest(".upload_photo").prepend('\
                <div class="removeContain" style="position:relative;top:0;">\
                <i class="icon-remove icon-2x icon-delete" onclick="removeImage(this);"></i>\
                </div>\
              ');
            }
        });



    });
  })

</script>
