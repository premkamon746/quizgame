
<div class="col-lg-12">

      <header class="panel-heading ">
          <h3>สร้างคำถาม/ตอบ</h3>
      </header>
      <div class="panel-body">


            <div class="text-left">
                  <nav class="navbar navbar-default ">
                        <div class="container-fluid">
                              <div class="navbar-header">
                                <a class="navbar-brand" href="#">ข้อ</a>
                              </div>
                              <? foreach ($all_question->result() as $aq) : ?>
                                    <a href="<?=site_url("gamequestion/index/$game_id/$aq->id")?>">
                                          <button type="button" class="btn <?=$question_no==$aq->no?"btn-primary":"btn-success" ?> btn-circle btn-lg"><?=$aq->no?></button>
                                    </a>
                              <? endforeach?>
                                    <a href="<?=site_url("gamequestion/index/$game_id")?>">
                                          <button type="button" class="btn btn-circle btn-lg"><span class="glyphicon glyphicon-plus"></span></button>
                                    </a>


                        </div>
                  </nav>
            </div>
          <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" >

                   <?php require_once("qst_tpl.php");?>
                   <?php require("ans_tpl.php");?>
                   <div id="myDiv"></div>
                  <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <a href="<?=site_url("gamequestion/index/$game_id/$question_id?r=$r")?>" class="btn btn-primary add_button">
                                      <i class="icon-plus-sign"></i> เพิ่มคำตอบ
                                </a>
                            </div>
                  </div>
                  <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="<?=site_url("creategame/index/$game_id")?>"><button type="button" class="btn btn-danger"> หน้าสร้างเกมส์</button></a>
                            <button type="submit" name="next" class="btn btn-danger">บันทึก</button>
                            <a href="<?=site_url("creategame/result/$game_id")?>"  class="btn btn-success">สร้างผลการเล่นเกม</a>
                        </div>
                  </div>
          </form>
      </div>
</div>



<script>


function removeImage(obj){
  $(obj).closest(".upload_photo").find("img").prop("src","<?=base_url()?>/assets/img/no_preview.jpg");
  $(obj).closest(".upload_photo").find("input[type='file']").val("");
  $(obj).closest(".upload_photo").find(".removeContain").remove();
}

  $(document).ready(function(){

        <?php //when add more choice?>
        <?php if(isset($r)) : ?>
              $('html, body').animate({
                    scrollTop: $("#myDiv").offset().top
              }, 100);
        <?php endif;?>

        $(".selectImage").on("click",function() {
            $(this).closest('.upload_photo').find("input[type='file']").click();
        });

        <?php if(isset($message)&&$message!="") : ?>
          $('#alertModal').modal('show');
        <?php endif ?>

    $('.add_button').click(function(){

        //var count_choice = $('.choice_no').length


          var add_tag = $("#hiddenAnsForm").html();;

          $("#contain_choice").append(add_tag);


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
