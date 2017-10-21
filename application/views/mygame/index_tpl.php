<div class="row">
      <div class="col-lg-12">
          <section class="panel">
              <header class="panel-heading">
                  เกมของฉัน
              </header>
              <div class="panel-body">
                  <section id="unseen">
                    <table class="table table-bordered table-striped table-condensed">
                      <thead>
                      <tr>
                      		<th>ชื่อชีวิต</th>
                          	<th>สถานะ</th>
                          	<th>วันที่สร้าง</th>
                              <th>ลบ</th>
                      </tr>
                      	</thead>


                      	<tbody>
                      		<?php foreach ($mygame->result() as $r):?>
			                      <tr>
			                      		<td><a href="<?=site_url("creategame/index/$r->id")?>"><?=$r->title?></a></td>
			                          	<td><?=$r->status?></td>
			                          	<td><?=$r->create_date?></td>
                                                <td><a href="javascript:void(0);" onclick="deleteQuiz('<?=$r->title?>',<?=$r->id?>);">ลบ</a></td>
			                      </tr>
		                     <?php endforeach;?>
	                	</tbody>

                  </table>
                  </section>
              </div>
          </section>
      </div>
  </div>
<script>
      function deleteQuiz(title, id){
            var alert_msg = "ต้องการลบ '" + title+ "' หมือไร่?";
            if(confirm(alert_msg))
            {
                  window.location = "<?=site_url("mygame/delete")?>/"+id;
            }
      }
</script>
