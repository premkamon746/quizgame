<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" >

<div class="activity">

                  <div class="panel">
                  		<div class="panel-heading"><?=$game->title?></div>
                        <div class="panel-body">
                              <div class="row" >
                              		
	                                 	<ul class="list-group" style="max-width:500px;margin:0 auto;">
	                                          <li class="list-group-item">จำนวนข้อ</li>
	                                          <li class="list-group-item">คะแนนสูงสุด/ต่ำสุด</li>
	                                          <li class="list-group-item">สถานะ : 
	                                          	<?php switch($game->status){
	                                          		case "create" : echo "สร้าง"; break;
	                                          		case "public" : echo "เผยแพร่"; break;
	                                          		case "unpublic" : echo "ไม่เผยแพร่"; break;
	                                          	}

	                                          
	                                          	?>
	                                          </li>
	                                    </ul>  
	                               
							                                  
                              </div><br/><br/>
                              <div class="row" >
                                    <div class="form-group">
							            <div class="col-lg-12"><!-- col-lg-offset-2  -->
							                <button type="submit" name="back" class="btn btn-danger">&lt;&lt;กลับไปแก้ไข </button>
							                <button type="submit" name="test" class="btn btn-warning">ทดลองเล่นเกม </button>
							                <button type="submit" name="public" class="btn btn-success">เผยแพร่ </button>
							                <button type="submit" name="unpublic" class="btn btn-danger">ยกเลิกเผยแพร่ </button>
							            </div>
							      </div>
							                                  
                              </div>
                        </div>
                  </div>
          
      </div>
  </form>