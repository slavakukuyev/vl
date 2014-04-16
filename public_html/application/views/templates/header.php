<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">

        <title>Video Library</title>

        <link href="<?php echo base_url('../media/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('../media/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('../media/css/bootstrap.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('../media/css/bootstrap.min.css') ?>" rel="stylesheet">   
        <link href="<?php echo base_url('../media/css/general.css') ?>" rel="stylesheet">            
        <link href="<?php echo base_url('../media/css/bootstrap-datetimepicker.min.css') ?>" rel="stylesheet">   



        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }

            @media (max-width: 980px) {
                /* Enable use of floated navbar text */
                .navbar-text.pull-right {
                    float: none;
                    padding-left: 5px;
                    padding-right: 5px;
                }
            }
        </style>


    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="<?= base_url() ?>">Video Library</a>          
                    <div class="nav-collapse collapse">                           


                        <!--after Login-->
                        <a class="btn btn-inverse logout <?php if (!$this->session->userdata('isLoggedIn')) { ?>hidden<?php } ?>" href="<?= base_url() ?>main/logout">Log out</a>
                        <p class="navbar-text pull-right <?php if (!$this->session->userdata('isLoggedIn')) { ?>hidden<?php } ?>">                           
                            Hi <span class="<?php if ($this->session->userdata('isadmin') != 1) { ?>hidden<?php } ?>">admin </span><a href="<?= base_url() ?>myaccount" class="navbar-link">
                                <?= $this->session->userdata('firstname') ?> <?= $this->session->userdata('lastname') ?>                   
                            </a>
                            <span> (Balance: <?= $this->session->userdata('balance')?>$) </span>
                        </p>     
                        <!--after Login-->


                        <!--before Login-->
                        <form class="form-inline pull-right <?php if ($this->session->userdata('isLoggedIn')) { ?>hidden<?php } ?>" action="<?= base_url() ?>main/login" method="post">
                            <span style="color:#FFFFFF;"> email</span> <input type="text" class="input-small" placeholder="Email" name="email">
                            <span style="color:#FFFFFF;"> pass</span><input type="password" class="input-small" placeholder="Password" name="password">
                            <label class="checkbox" style="color:#FFFFFF;">
                                <input type="checkbox"> Remember me
                            </label>
                            <button type="submit" name="submit" class="btn">Login</button>
                            <a style="color:#FFFFFF;margin-left:20px;" href="<?= base_url('registration') ?>">Registration</a>
                        </form>
                        
                        <!--before Login-->





                        <ul class="nav">
                            <li class="active"><a href="<?= base_url('main') ?>">Home</a></li>
                            <li><a href="<?= base_url('about') ?>">About</a></li>
                            <li><a href="<?= base_url('contactus') ?>">Contact</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>




        <!--Main Container-->      
        <div class="container-fluid">
            <div class="row-fluid">

