<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="">
    <!-- <link rel="shortcut icon" href="img/favicon.png"> -->


    <?php
           $class = $this->router->fetch_class();
           $med = $this->router->fetch_method();
    ?>

    <?php if ($class = "GameResult" && $med = "score" && isset($gameinfo)) : ?>


          <?php $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

          <?php foreach ($gameinfo->result() as $r) {?>
                <meta property="og:title" content="<?=$r->title?>" />
                <meta property="og:type" content="article" />
                <meta property="og:image" content="" />
                <meta property="og:url" content="<?=$actual_link?>" />
                <meta property="og:description" content="<?=$total_point?>/<?=$game_point?> คะแนน  <?=isset($game_res)?$game_res: ''?>" />
         <?php } ?>
    <?php endif; ?>


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
                    <!-- <a href="<?=$this->loginUrl?>"></span> <img src="<?=base_url()?>assets/img/facebook.png" border="1"/></a> -->

                    <div class="fb-login-button"  data-scope="email,public_profile" data-max-rows="1" data-size="large" data-button-type="login_with"
                    data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false" onlogin="checkLoginState();"></div>
                    <!-- <div class="fb-login-button"  data-scope="email,public_profile,user_photos,publish_actions" data-max-rows="1" data-size="large" data-button-type="login_with"
                    data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false" onlogin="checkLoginState();"></div> -->
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
        <script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
          //console.log('statusChangeCallback');
          console.log(response);
          if (response.status === 'connected') {
            // Logged into your app and Facebook.
            //testAPI();
             var atk = response.authResponse.accessToken;
             window.location.href = "<?=$this->cbUrl?>&atk="+atk;

          } else {

                FB.login(function(response) {
                      statusChangeCallback(response);
                  }, {
                      scope: 'email,public_profile',
                      //scope: 'email,public_profile,user_photos,publish_actions',
                      return_scopes: true
                  });

            // The person is not logged into your app or we are unable to tell.

            // document.getElementById('status').innerHTML = 'Please log ' +
            //   'into this app.';
            //console.log(response);
          }
        }

        // This function is called when someone finishes with the Login
        // Button.  See the onlogin handler attached to it in the sample
        // code below.
        function checkLoginState() {

             FB.getLoginStatus(function(response) {
               statusChangeCallback(response);
             });

        }

        window.fbAsyncInit = function() {
        FB.init({
          appId      : '211474989230282',
          cookie     : true,  // enable cookies to allow the server to access
            status: true,                  // the session
          xfbml      : true,  // parse social plugins on this page
          version    : 'v2.8' ,// use graph api version 2.8
          oauth         : true
        });

        // Now that we've initialized the JavaScript SDK, we call
        // FB.getLoginStatus().  This function gets the state of the
        // person visiting this page and can return one of three states to
        // the callback you provide.  They can be:
        //
        // 1. Logged into your app ('connected')
        // 2. Logged into Facebook, but not your app ('not_authorized')
        // 3. Not logged into Facebook and can't tell if they are logged into
        //    your app or not.
        //
        // These three cases are handled in the callback function.



        };

        // Load the SDK asynchronously
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        // Here we run a very simple test of the Graph API after login is
        // successful.  See statusChangeCallback() for when this call is made.
        function testAPI() {
          console.log('Welcome!  Fetching your information.... ');
          FB.api('/me', function(response) {
                console.log(response);
          });
        }
      </script>
      <br/><br/><br/>

      <footer class="footer">
        <div class="container">
            <div class="row">


                 <div class="col-lg-3 col-sm-3">
                    <address>
                        <p><a href="<?=site_url("/")?>">Home</a></p>
                        <p><a href="<?=site_url("/content/policy")?>">Privacy Policy</a></p>

                    </address>
                </div>
                <div class="col-lg-5 col-sm-5">
                   <!-- <h1>latest tweet</h1>
                    <div class="tweet-box">
                        <i class="icon-twitter"></i>
                        <em>Please follow <a href="javascript:;">@nettus</a> for all future updates of us! <a href="javascript:;">twitter.com/vectorlab</a></em>
                    </div>-->
                </div>
                <div class="col-lg-3 col-sm-3 col-lg-offset-1">
                    <!--<h1>stay connected</h1>
                    <ul class="social-link-footer list-unstyled">
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-google-plus"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-skype"></i></a></li>
                        <li><a href="#"><i class="icon-github"></i></a></li>
                        <li><a href="#"><i class="icon-youtube"></i></a></li>
                    </ul>-->
                </div>
            </div>
        </div>
    </footer>
  </body>
</html>
