<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.png">

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
    <nav class="navbar navbar-default ">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav ">
          <li >
            <a href="<?=site_url("mygame"); ?>">
              <div class="btn-sm">
                 My Games
              </div>
            </a>
          </li>
          <!-- <li class="active"><a href="#">Page 1</a></li>
          <li><a href="#">Page 2</a></li>
          <li><a href="#">Page 3</a></li>-->
        </ul>

       <!--  <form class="navbar-form navbar-left">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
        </form> -->

        <ul class="nav navbar-nav navbar-right ">
            <?php
                $current_class = $this->router->fetch_class();
                $current_metd = $this->router->fetch_method();
              ?>
            <?php if($this->session->userdata("login")!="login")  :?>
                <!-- <li><a href="<?=$this->loginUrl?>"></span> <img src="<?=base_url()?>assets/img/facebook.png" border="1"/></a></li> -->
            <?php else :?>
                <li >
                    <a href="<?=site_url("$current_class/logout/$current_class/$current_metd")?>" >
                      <div class="btn-sm">
                        <span class="glyphicon glyphicon-log-out"></span> Log out
                      </div>
                    </a>

                </li>
            <?php endif?>
        </ul>
      </div>
    </nav>

        <section id="container" >
            <section class="wrapper"  style="max-width:800px; margin:0 auto; text-align: center;">

                <?php if(!$this->login && $this->session->userdata("login")!="login" ) : ?>

                      <br/><br/><br/>
                      <a href="<?=$this->loginUrl?>"></span> <img src="<?=base_url()?>assets/img/facebook.png" border="1"/></a>
                      ล็อกอินก่อนจ้า

                <?php else :?>
                  <?=$content?>
                <?php endif; ?>
            </section>
        </section>
  </body>
</html>
