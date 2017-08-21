<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="">
    <!-- <link rel="shortcut icon" href="img/favicon.png"> -->

    <title></title>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">

<link href="<?=base_url()?>assets/bootstrap/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!-- Optional theme -->
<link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap-theme.min.css" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="<?=base_url()?>assets/js/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
 <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css" crossorigin="anonymous">

  </head>

  <body>


<div class="navbar navbar-default ">
      <div class="container">
            <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                  </button>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                  <a class="navbar-brand" href="#">Brand</a>
            </div>
            <div class="collapse navbar-collapse nav">
                  <ul class="nav navbar-nav">
                        <li ><a href="<?=site_url("home"); ?>"><div class="btn-sm">หน้าแรก</div></a> </li>
                        <li ><a href="<?=site_url("mygame"); ?>"><div class="btn-sm">เกมของฉัน</div></a></li>
                        <li ><a href="<?=site_url("creategame"); ?>"><div class="btn-sm">สร้างเกม</div></a></li>
                        <?php
                            $current_class = $this->router->fetch_class();
                            $current_metd = $this->router->fetch_method();
                          ?>
                        <?php if($this->session->userdata("login")!="login")  :?>
                            <!-- <li><a href="<?=$this->loginUrl?>"></span> <img src="<?=base_url()?>assets/img/facebook.png" border="1"/></a></li> -->
                        <?php else :?>
                            <li ><a href="<?=site_url("$current_class/logout/$current_class/$current_metd")?>" >
                                  <div class="btn-sm"><span class="glyphicon glyphicon-log-out"></span> Log out</div>
                                </a></li>
                        <?php endif?>

                  </ul>
                  <!-- <ul class="nav navbar-nav ">
                  <ul class="nav navbar-nav navbar-right "> -->
            </div>
            <ul class="nav navbar-nav navbar-right ">

            </ul>
      </div>
</div>




        <section id="container" >
            <section class="wrapper"  style="max-width:800px; margin:0 auto; text-align: center;" >

                  <?php if(isset($bef_login)) { ?>
                          <?=$bef_login ?>
                  <?php } ?>
              <?php if(isset($this->login) && !$this->login && $this->session->userdata("login")!="login" ) : ?>

                    <br/><br/><br/>
                    <a href="<?=$this->loginUrl?>"></span> <img src="<?=base_url()?>assets/img/facebook.png" border="1"/></a>
                    ล็อกอินก่อนจ้า

              <?php else :?>
                <?=$content?>
              <?php endif; ?>




            </section>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mesageModal"> <?=isset($message)&&$message!=""?$message:""?></h4>
              </div>
            </div>
          </div>
        </div>

  </body>
</html>
