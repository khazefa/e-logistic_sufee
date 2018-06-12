<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - <?php echo APP_NAME;?></title>
    <meta name="description" content="<?php echo APP_NAME;?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="<?php echo base_url();?>favicon.png">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/public/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/public/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/public/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/public/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/public/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/public/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-warning">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="<?php echo base_url();?>">
                        <img class="align-content" src="<?php echo base_url();?>assets/public/images/dn-logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <div class="text-center">
                        <?php
                        $error = $this->session->flashdata('error');
                        if($error)
                        {
                        ?>
                        <div class="alert alert-danger alert-dismissable" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $error; ?>                    
                        </div>
                        <?php
                                                                                }
                        $success = $this->session->flashdata('success');
                        if($success)
                        {
                        ?>
                        <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $success; ?>                    
                        </div>
                        <?php } ?>
                    </div>
                    <form id="sign_in" action="<?php echo base_url('login/proccess'); ?>" method="POST" class="form-validate" ecntype="application/x-www-form-urlencoded">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <!--
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                        </div>
                        -->
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <script src="<?php echo base_url();?>assets/public/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url();?>assets/public/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/public/js/plugins.js"></script>
    <script src="<?php echo base_url();?>assets/public/js/main.js"></script>


</body>
</html>
<!-- -->