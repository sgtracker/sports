<div class="preloader">
    <div class="loading-page">
        <div class="sk-circle">
            <div class="sk-circle1 sk-child"></div>
            <div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div>
            <div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div>
            <div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div>
            <div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div>
            <div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div>
            <div class="sk-circle12 sk-child"></div>
        </div>
    </div>
</div>
<!-- Wrapper Start -->
<div id="page_wrapper" class="container-fluid">
    <div class="row">
        <header id="header" class="w-100 bg_white nav-on-top"> 
            <!-- Top Header Start -->
            <div class="top_header_1 bg_secondary">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-5">
                            <div class="top_left"> <a href="callto:+14357824312"><i class="fa fa-phone" aria-hidden="true"></i> Need Support ? +1-435-782-4312</a> </div>
                        </div>
                        <div class="col-md-6 col-sm-7 align-self-center"><?php if (empty($_SESSION['active_sm_userdata']['id'])) {
    ;
   ?>
                            <div class="top_right dropdown_1 d-flex float-right">
                                <ul class="registration">
                                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#login-modal" class="toogle_btn" >Login/Register</a></li>
                                </ul>
                            </div> 
                            <?php } ?>

                            <?php if (!empty($_SESSION['active_sm_userdata']['id'])) {
                                ;
                                ?>
                                <div class="top_right dropdown_1 d-flex float-right">
                                    <ul class="registration">
                                        <li>

    <?php if (!empty($_SESSION['active_sm_userdata']['profile_picture'])) { ?>
                                                <a href="<?= base_url(); ?>index.php/web_panel/profile/my_profile">
                                                    <div class="header_profile_container">
                                                        <div class="header_profile">
                                                            <img src="<?php echo $_SESSION['active_sm_userdata']['profile_picture'] ?>" alt="Image Not Found!">
                                                        </div>
        <?php echo ($_SESSION['active_sm_userdata']['name']); ?></div></a>
    <?php } else { ?>
                                                    <a href="<?= base_url(); ?>index.php/web_panel/profile/my_profile">
                                                        <div class="header_profile_container">
                                                            <div class="header_profile">
                                                                <img src="<?= base_url(); ?>assets/img/dp.png" alt="Image Not Found!">
                                                            </div>
                                                             <?php echo ($_SESSION['active_sm_userdata']['name']); ?>
                                       
                                                    </div> <?php } ?> </a>


                                                    </li>
                                                    <li><a href="<?= base_url(); ?>index.php/web_panel/profile/logout" title="Logout"><i class="fa fa-sign-out-alt"></i></a></li>
                                                    </ul>
                                                    </div> 
<?php } ?>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- Top Header End --> 

                                                <!-- Nav Header Start -->
                                                <div class="main_header_1">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12">
                                                                <nav class="navbar navbar-expand-lg navbar-light w-100"> <a class="navbar-brand" href="<?= base_url(); ?>index.php/web_panel/Userlogin/home">
                                                                        <img class="nav-logo" src="<?= base_url(); ?>assets/img/logos/youbox3.png" alt="logo">
                                                                    </a>
                                                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                                                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                                        <ul class="navbar-nav ml-auto">
                                                                            <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>index.php" role="button" aria-haspopup="true" aria-expanded="false">Home</a></li>
                                                                            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="index_1.html" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Projects</a>
                                                                                <ul class="dropdown-menu">

                                                                                    <?php if (!empty($_SESSION['active_sm_userdata']['name'])) { ?>
                                                                                        <li><a class="dropdown-item" href="<?= base_url(); ?>index.php/web_panel/Post_property/post_property">Post a Property</a></li>
                                                                                        <li><a class="dropdown-item" href="<?= base_url(); ?>index.php/web_panel/Post_project/post_project">Post a Project</a></li>
<?php } else { ?>

                                                                                        <li><a class="dropdown-item click" href="javascript:void(0);">Post a Property</a></li>
                                                                                        <li><a class="dropdown-item click" href="javascript:void(0);">Post a Project</a></li>
<?php } ?>
                                                                                </ul>
                                                                            </li>
                                                                            <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>index.php/web_panel/Subscription/plan_list" role="button" aria-haspopup="true" aria-expanded="false">Subscription</a></li>
                                                                            <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>index.php/web_panel/Pages/common/about" role="button" aria-haspopup="true" aria-expanded="false">About</a></li>
                                                                            <li class="nav-item mega_menu_dropdown">
                                                                                <a class="nav-link" href="<?= base_url(); ?>index.php/web_panel/Userlogin/contact" role="button" aria-haspopup="true" aria-expanded="false">Contact</a>
                                                                            </li>
                                                                            <!-- <li class="nav-item"> <a class="nav-link" href="blog-grid-classic.html" role="button" aria-haspopup="true" aria-expanded="false">CF Groups</a> -->
                                                                            </li>
                                                                            <!-- <li class="nav-item"> <a class="nav-link" href="contact.html">Home Loans</a> </li> -->
                                                                        </ul>
                                                                    </div>
                                                                </nav>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Nav Header End --> 
                                                </header>
                                                <!--login signup modal start here -->
                                                <div class="modal fade" id="login-modal">
                                                    <div class="modal-dialog">

                                                        <div class="loginmodal-container">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h1 class="logintext">Login to Your Account</h1><br>
                                                            <!-- login form start here -->
                                                            <div class="modallogin">

                                                                <form>
                                                                    <center><span id="error_message"></span></center>
                                                                    <div class="input-group mb-2 mr-sm-2">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="fa fa-user"></i>
                                                                            </div>
                                                                        </div>

                                                                        <input type="text" class="form-control mobile_or_email" maxlength="40" placeholder="Username" required>
                                                                    </div>
                                                                    <div class="input-group mb-2 mr-sm-2">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="fa fa-key"></i>
                                                                            </div>
                                                                        </div>
                                                                        <input type="password" class="form-control password_value" maxlength="20" placeholder="Password" required>
                                                                    </div>

                                                                    <button id="signin" type="button" onclick="login()" name="signin" class="login loginmodal-submit w-100">Login</button>

                                                                </form>
                                                                <div class="login-help">
                                                                    <a href="#">New at YouBox ?</a> - <a href="#" class="signupyoubox" id="showsignupmodal">Sign Up</a>
                                                                    <a href="#forgot" class="pull-right forgotbtn" id="showforgotmodal">Forgot Password</a>
                                                                </div>
                                                                <div class="social-login-box mart10">
                                                                    <p class="text-center">or</p>
                                                                    <div class="d-flex">
                                                                        <a href="https://www.facebook.com/v2.6/dialog/oauth?client_id=1044786825644896&amp;state=1829dc26b2a6b555e89bb6b7a00a7901&amp;response_type=code&amp;sdk=php-sdk-5.0.0&amp;redirect_uri=<?= site_url('web_panel/home/fb_login') ?>&amp;scope=email" class="facebook-bg marr10">
                                                                            <i class="fab fa-facebook-f"></i> Login with Facebook
                                                                        </a>

                                                                        <a href="https://accounts.google.com/o/oauth2/auth?response_type=code&amp;redirect_uri=https://youbox.in/web_panel/Home/g_signup&amp;client_id=469291756495-ueqqcsnmsd6j1veceb4d8rb34u4p4cit.apps.googleusercontent.com&amp;scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email&amp;access_type=online&amp;approval_prompt=auto" class="google-bg"><i class="fab fa-google">
                                                                            </i> Login with Google
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- login form end here -->
                                                            <!-- signup form start here -->
                                                            <div class="modalsignup" style="display:none;">
                                                                <form  name="signup_form" id="signup_form" method="post" autocomplete="off">
                                                                    <center><span id="error_message_signup"></span></center>
                                                                    <div class="input-group mb-2 mr-sm-2">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="fa fa-user"></i>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="name" type="text" maxlength="64" placeholder="Full Name" required>
                                                                    </div>
                                                                    <div class="input-group mb-2 mr-sm-2">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="fa fa-envelope"></i>
                                                                            </div>
                                                                        </div>
                                                                        <input  class="form-control" name="email" type="email" maxlength="40" placeholder="Email Id">
                                                                    </div>
                                                                    <div class="input-group mb-2 mr-sm-2">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="fa fa-mobile"></i>
                                                                            </div>
                                                                        </div>
                                                                        <input  id="mm" name="mobile" type="text" maxlength="10" class="form-control" placeholder="Mobile Number">
                                                                    </div>
                                                                    <div class="input-group mb-2 mr-sm-2">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="fa fa-key"></i>
                                                                            </div>
                                                                        </div>
                                                                        <input type="password" name='password' minlength="8" maxlength="24" class="form-control" placeholder="Password">
                                                                    </div>
                                                                    <div class="input-group mb-2 mr-sm-2">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="fa fa-map-marker"></i>
                                                                            </div>
                                                                        </div>
                                                                        <select class="custom-select" name="city_id" id="city_id">
                                                                            <option selected>Select City</option>
                                                                            <?php
//                                        $this->db->order_by('country', 'ASC');
//                                        $countries = $this->db->get('master_countries')->result_array();
//                                        if ($countries) {
//                                            foreach ($countries as $each) {
//                                                
                                                                            ?>
                                        <!--                                                <option value="//<?php //echo $each['id'];                                     ?>"><?php //echo ucfirst($each['country']);                                     ?></option>-->
                                                                            //<?php
//                                            }
//                                        }
                                                                            ?>
                                                                            <option value="1">Noida</option>
                                                                            <option value="2">Delhi</option>
                                                                            <option value="3">Greater Noida</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="input-group mb-2 mr-sm-2">
                                                                        <div class="w-100">
                                                                            <label class="youare">You Are</label>
                                                                        </div>
                                                                        <div class="custom-control custom-radio custom-control-inline">
                                                                            <input type="radio" id="customRadioInline1" name="user_type" value="1" class="custom-control-input">
                                                                            <label class="custom-control-label" for="customRadioInline1">Normaluser/Owner</label>
                                                                        </div>
                                                                        <div class="custom-control custom-radio custom-control-inline">
                                                                            <input type="radio" id="customRadioInline2" name="user_type" value="2" class="custom-control-input">
                                                                            <label class="custom-control-label" for="customRadioInline2">Builder</label>
                                                                        </div>
                                                                        <div class="custom-control custom-radio custom-control-inline">
                                                                            <input type="radio" id="customRadioInline3" name="user_type" value="3" class="custom-control-input">
                                                                            <label class="custom-control-label" for="customRadioInline3">Broker</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                        <label class="custom-control-label" for="customCheck1">I have read and agree to the <span><a href="javascript:void(0);" class="privacy">Terms of Use</a></span> and <span><a href="javascript:void(0);" class="privacy">Privacy Policy</a></span></label>
                                                                    </div>
                                                                    <button type="button" id="signup_btn" name="Sign Up" class="login loginmodal-submit my-1 w-100" >Sign Up</button>
                                                                    <div class="login-help">
                                                                        <a href="#">Already have an account ?</a> - <a href="#" id="showloginmodal" class="signupyoubox">Login</a>
                                                                    </div>
                                                                    <div class="social-login-box mart10">
                                                                        <p class="text-center">or</p>
                                                                        <div class="d-flex">
                                                                            <a href="https://www.facebook.com/v2.6/dialog/oauth?client_id=1044786825644896&amp;state=1829dc26b2a6b555e89bb6b7a00a7901&amp;response_type=code&amp;sdk=php-sdk-5.0.0&amp;redirect_uri=<?= site_url('web_panel/home/fb_login') ?>&amp;scope=email" class="facebook-bg marr10"><i class="fab fa-facebook-f"></i> Signup with Facebook
                                                                            </a>
                                        <!--                                    <a href="https://accounts.google.com/o/oauth2/auth?response_type=code&amp;redirect_uri=<?= site_url('web_panel/home/g_login') ?>&amp;client_id=731912916781-784tjvtgphhu8bme9c2pcoaes4e8155f.apps.googleusercontent.com&amp;scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email&amp;access_type=offline&amp;approval_prompt=force" class="google-bg"><i class="fab fa-google"></i> Signup with Google</a>-->
                                                                            <a href="https://accounts.google.com/o/oauth2/auth?response_type=code&amp;redirect_uri=https://youbox.in/web_panel/Home/g_signup&amp;client_id=469291756495-ueqqcsnmsd6j1veceb4d8rb34u4p4cit.apps.googleusercontent.com&amp;scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email&amp;access_type=online&amp;approval_prompt=auto" class="google-bg"><i class="fab fa-google"></i> Signup with Google</a>
                                                                        </div>

                                                                    </div>
                                                                </form>
                                                            </div>	
                                                            <!-- signup form end here -->
                                                            <!-- forgot password start here -->
                                                            <div class="modalforgotpwd" id="forgot_password_modal" style="display:none;">
                                                                <form action="">
                                                                    <p>To reset your password, enter the mobile number you use to sign in to YouBox</p>
                                                                    <span style="color:red" id="error_message_fp"></span>
                                                                    <div class="input-group mb-2 mr-sm-2">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="fa fa-envelope"></i>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" class="form-control number" name="email" maxlength="12"  id="email_addr" placeholder="Mobile Number">
                                                                    </div>
                                                                    <button type="button"  name="forpassword" class="login loginmodal-submit w-100" id="forgot_password" value="Forgot Password">Send</button>
                                                                </form>
                                                            </div>
                                                            <!-- forgot password end here -->
                                                            <!-- otp modal start  -->
                                                            <div class="modalotp" id="verify_otp_modal_for_passsword" style="display:none;"> 
                                                                <form action="">
                                                                    <center><span id="error_message_otp_fp"></span></center>
                                                                    <div class="input-group mb-2 mr-sm-2">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <i class="fa fa-key"></i>
                                                                            </div>
                                                                        </div>
                                                                        <input type="text" class="form-control" id="otp_code_fp" placeholder="Enter Otp">
                                                                    </div>  
                                                                    <input type="button" name="forgotpwd" id="otp_btn_fp" class="login loginmodal-submit w-100" value="Submit">
                                                                    <input type="hidden" id="user_id_fp" value="">
                                                                </form>
                                                            </div>
                                                            <!-- otp modal end  -->

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal " id="verify_otp_modal" tabindex="0" role="dialog" aria-labelledby="Verify OTP" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content model-head">

                                                            <button type="button" class="close text-right" data-dismiss="modal">&times;</button>
                                                            <h1 class="modal-title text-center" id="myModalLabel">Enter a verification code</h1>
                                                            <p>Get a verification code from your mobile</p>

                                                            <div class="">
                                                                <form class="form-horizontal" autocomplete="off">
                                                                    <fieldset>
                                                                        <center><span id="error_message_otp"></span></center>

                                                                        <div class="input-group mb-2 mr-sm-2">
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text">
                                                                                    <i class="fa fa-key"></i>
                                                                                </div>
                                                                            </div>
                                                                            <input required="" placeholder="Enter Otp" class="input number form-control" id="otp_code"  type="text"><span class="highlight"></span><span class="bar"></span>
                                                                            <!-- <label class="label" for="otp_code">Enter OTP</label> -->
                                                                        </div> 

                                                                        <div class="control-group text-right">
                                                                            <label class="control-label" for="forpassword"></label>
                                                                            <a href="javascript:void(0);" class="pull-right forgotbtn mb-3" id="sendmessage">Resend otp</a>
                                                                            <!-- <button type="button" id="sendmessage">resend otp</button> -->
                                                                        </div>
                                                                        <div class="controls">
                                                                            <button id="otp_btn" type="button" class="login loginmodal-submit w-100 mt-10 btn-block">Verify</button>
                                                                        </div>
                                                                    </fieldset>
                                                                    <input type="hidden" id="user_id" value="">
                                                                </form>          
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--login signup modal end here -->
                                                <script src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script>
                                                <script>
                                                                        $(document).ready(function () {
                                                                            $("#showsignupmodal").click(function () {
                                                                                $(".modalsignup").show();
                                                                                $(".modallogin").hide();
                                                                                $(".logintext").text("Register to Your Account");
                                                                            });
                                                                            $("#showloginmodal").click(function () {
                                                                                $(".modalsignup").hide();
                                                                                $(".modallogin").show();
                                                                                $(".logintext").text("Login to Your Account");
                                                                            });
                                                                            $("#showforgotmodal").click(function () {
                                                                                $(".modallogin").hide();
                                                                                $(".modalforgotpwd").show();
                                                                                $(".logintext").text("Forgot Password");
                                                                            });
                                                                            $("#showupdatepwd").click(function () {
                                                                                $(".modalotp").hide();
                                                                                $(".modalupdatepwd").show();
                                                                                $(".logintext").text("Update Password");
                                                                            });
                                                                            $("#showotp").click(function () {
                                                                                $(".modalforgotpwd").hide();
                                                                                $(".modalotp").show();
                                                                                $(".logintext").text("Enter Otp");


                                                                                var email = $('#email_addr').val();

                                                                                jQuery.ajax({
                                                                                    url: "<?php echo base_url('index.php/web_panel/Registration/verify_email'); ?>",
                                                                                    method: 'POST',
                                                                                    dataType: 'json',
                                                                                    data: {
                                                                                        email: email
                                                                                    },
                                                                                    success: function(data) { //alert('first'); die;
                                                                                        //alert(data.status);
                                                                                        if (data.status == true) {
                                                                                            $('#user_id_fp').val(data.user_id);
                                                                                        } else {
                                                                                            $('#error_message_fp').text(data.message);
                                                                                            $('#error_message_fp').css({"font-size": "14px", "color": "red"});
                                                                                            $("#error_message_fp").animate({opacity: 'toggle'}, 2000);
                                                                                        }
                                                                                    }
                                                                                });
                                                                            });

                                                                        });
                                                                        $('#signup_btn').click(function () {
                                                                            var formdata = $('#signup_form').serialize();
                                                                            jQuery.ajax({
                                                                                url: "<?php echo base_url('index.php/web_panel/Registration/index'); ?>",
                                                                                method: 'POST',
                                                                                dataType: 'json',
                                                                                data: {
                                                                                    formdata: formdata
                                                                                },
                                                                                success: function (data) {
                                                                                    console.log(data);
                                                                                    if (data.status == 1) {
                                                                                        $('#error_message_signup').text(data.message);
                                                                                        $('#error_message_signup').css({"font-size": "14px", "color": "green"});
                                                                                        $("#error_message_signup").animate({opacity: 'toggle'}, 2000);
                                                                                        $('#login-modal').modal('hide');
                                                                                        $('#verify_otp_modal').modal('show');
                                                                                        $('#user_id').val(data.user_id);
                                                                                    } else {
                                                                                        $('#error_message_signup').text(data.message);
                                                                                        $('#error_message_signup').css({"font-size": "14px", "color": "red"});
                                                                                        $("#myModal").animate({scrollTop: 0});
                                                                                        //$("#error_message_signup").animate({opacity: 'toggle'}, 2000);
                                                                                    }
                                                                                }
                                                                            });
                                                                        });

                                                                        $('#forgot_password').click(function () {

                                                                            var email = $('#email_addr').val();
                                                                            if (email == '')
                                                                            {
                                                                                $('#email_error').html('Please Enter Mobile Number');
                                                                                //document.getElementById("postproject").addEventListener("click", scrollWin);
                                                                                return false;
                                                                            } else
                                                                            {
                                                                                $('#email_error').html('');
                                                                            }

                                                                            jQuery.ajax({
                                                                                url: "<?php echo base_url('index.php/web_panel/Registration/verify_email'); ?>",
                                                                                method: 'POST',
                                                                                dataType: 'json',
                                                                                data: {
                                                                                    email: email
                                                                                },
                                                                                success: function(data) {
                                                                                    //alert(data.status);
                                                                                    if (data.status == true) { //alert('second'); die;
                                                                                        $('#error_message_fp').text(data.message);
                                                                                        $('#error_message_fp').css({"font-size": "14px", "color": "green"});
                                                                                        $("#error_message_fp").animate({opacity: 'toggle'}, 5000);
                                                                                        $("#forgot_password_modal").hide();
                                                                                        $("#verify_otp_modal_for_passsword").show();
                                                                                        $('#user_id_fp').val(data.user_id);
                                                                                    } else {
                                                                                        $('#error_message_fp').text(data.message);
                                                                                        $('#error_message_fp').css({"font-size": "14px", "color": "red"});
                                                                                        $("#error_message_fp").animate({opacity: 'toggle'}, 5000);

                                                                                    }
                                                                                }
                                                                            });
                                                                        });

                                                                        $('#otp_btn').click(function () {
                                                                            var user_id = $('#user_id').val();
                                                                            var otp = $('#otp_code').val();
                                                                            //alert(user_id);
                                                                            // alert(otp);
                                                                            var currentLocation = window.location;
                                                                            jQuery.ajax({
                                                                                url: "<?php echo base_url('index.php/web_panel/Registration/verify_otp'); ?>",
                                                                                method: 'POST',
                                                                                dataType: 'json',
                                                                                data: {
                                                                                    user_id: user_id,
                                                                                    otp: otp
                                                                                },
                                                                                success: function (data) {
                                                                                    console.log(data);
                                                                                    if (data.status == true) { //alert('suceess');
                                                                                        $('#error_message_otp').text(data.message);
                                                                                        $('#error_message_otp').css({"font-size": "14px", "color": "green"});
                                                                                        $("#error_message_otp").animate({opacity: 'toggle'}, 2000);
                                                                                        window.location.reload();
                                                                                        //                    window.location.href = currentLocation;
                                                                                    } else {
                                                                                        //alert('false');
                                                                                        swal("OTP not match! Please Enter Correct OTP.");
                                                                                        $('#error_message_otp').text(data.message);
                                                                                        $('#error_message_otp').css({"font-size": "14px", "color": "red"});
                                                                                        $("#error_message_otp").animate({opacity: 'toggle'}, 2000);
                                                                                    }
                                                                                }
                                                                            });
                                                                        });

                                                                        $('#otp_btn_fp').click(function () {
                                                                            var user_id = $('#user_id_fp').val();
                                                                            var otp = $('#otp_code_fp').val();
                                                                            var encode_user_id = btoa(user_id);
                                                                            jQuery.ajax({
                                                                                url: "<?php echo base_url('index.php/web_panel/Registration/verify_otp_for_password'); ?>",
                                                                                method: 'POST',
                                                                                dataType: 'json',
                                                                                data: {
                                                                                    user_id: user_id,
                                                                                    otp: otp
                                                                                },
                                                                                success: function (data) {
                                                                                    if (data.status == true) {
                                                                                        $('#error_message_otp_fp').text(data.message);
                                                                                        $('#error_message_otp_fp').css({"font-size": "14px", "color": "green"});
                                                                                        $("#error_message_otp_fp").animate({opacity: 'toggle'}, 2000);
                                                                                        window.location.href = "<?php echo site_url('web_panel/Registration/change_password?sdfsdf='); ?>" + encode_user_id;
                                                                                    } else {
                                                                                        $('#error_message_otp_fp').text(data.message);
                                                                                        $('#error_message_otp_fp').css({"font-size": "14px", "color": "red"});
                                                                                        $("#error_message_otp_fp").animate({opacity: 'toggle'}, 2000);
                                                                                    }
                                                                                }
                                                                            });
                                                                        });

                                                </script>
                                                <script type="text/javascript">
                                                    $(document).on('ready', function () {
                                                        $(".variable").slick({
                                                            dots: true,
                                                            infinite: true,
                                                            autoplay: true,
                                                            variableWidth: true,
                                                            centerMode: true,
                                                            itemsMobile: [600, 1],

                                                        });
                                                    });
                                                    function login() {
                                                        var email_mobile = $('.mobile_or_email').val();
                                                        var password = $('.password_value').val();
                                                        if ($('#remember').is(':checked')) {
                                                            var remember = 1;
                                                        } else {
                                                            var remember = 0;
                                                        }
                                                        var currentLocation = window.location;
                                                        //$('#error_message').text('');
                                                        //alert(email_mobile);
                                                        jQuery.ajax({
                                                            url: "<?php echo base_url('index.php/web_panel/Login'); ?>",
                                                            method: 'POST',
                                                            dataType: 'json',
                                                            data: {
                                                                email_mobile: email_mobile,
                                                                password: password,
                                                                remember: remember
                                                            },

                                                            success: function (data) {
                                                                //console.log(data.message);
                                                                //alert(data.message); 
                                                                //alert(currentLocation);exit;
                                                                if (data.status == 1) {
                                                                    $('#error_message').text(data.message);
                                                                    $('#error_message').css({"font-size": "14px", "color": "green"});
                                                                    $("#error_message").animate({opacity: 'toggle'}, 2000);
                                                                    //window.location.href = currentLocation;
                                                                    window.location.href = "<?php echo base_url('index.php/web_panel/Userlogin/home'); ?>";
                                                                } else {
                                                                    // reload_captcha()
                                                                    $('#error_message').text(data.message);
                                                                    $('#error_message').css({"font-size": "14px", "color": "red"});
                                                                    //$("#error_message").animate({opacity: 'toggle'}, 2000);
                                                                    $("#myModal").animate({scrollTop: 0});
                                                                }
                                                            }
                                                        });
                                                    }
                                                </script>
                                                <script>
                                                    $('#sendmessage').click(sendmessage);

                                                    function sendmessage() {
                                                        var mobile = $('#mm').val();
                                                        jQuery.ajax({
                                                            url: "<?php echo base_url('index.php/web_panel/Home/send_otp'); ?>",
                                                            type: "post",
                                                            dataType: "json",
                                                            data: {mobile: mobile},
                                                            success: function (data) {
                                                                //alert('otp sent successfully');
                                                            }
                                                        });

                                                        swal('otp sent successfully');
                                                    }
                                                </script>

                                                <script>
                                                    $(document).ready(function () {
                                                        $(".click").click(function () {
                                                            $('#login-modal').modal('show');
                                                        });
                                                    });

                                                    $(".number").keypress(function (e) {
                                                        //if the letter is not digit then display error and don't type anything
                                                        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                                            //display error message
                                                            //$("#reg_agent_error_validation").html("Digits Only").show().fadeOut("slow");
                                                            return false;
                                                        }
                                                    });
                                                </script>