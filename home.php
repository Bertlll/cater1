<?php
require_once 'controllers/do_login.php';
?>
<nav class="navbar navbar-light navbar-expand-md">
    <div class="container-fluid"><a class="navbar-brand" href="#"><strong>feeds.</strong></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" id="item" href="#">Sign up as</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="item1" href="index.php?page=client-signup"><strong>Client</strong></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="item1" href="index.php?page=cater-signup"><strong>Caterer</strong></a></li>

                <li class="nav-item" role="presentation"><a class="nav-link" target="_blank">Already have an account?</a></li>

                <!-- Sign in dropdown  -->
                <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Sign in</a>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <form class="form-inline" action="" method="POST">
                            <p id="form">Email Address</p><input class="form-control" name="email" type="text" placeholder="email address">
                            <p id="form">Password</p><input class="form-control" name="password" type="password" placeholder="password">
                            <p id="form" class="has-text-grey"><i>Forgot Password?</i></p><input class="btn btn-primary btn-block" id="but" type="submit" name="login" value="Sign In">
                        </form>
                    </div>
                </li>
                <!-- end of dropdown  -->
            </ul>
        </div>
    </div>
</nav>
<div class="container hero" id="first">
    <div class="hero-body poppins tx-bold">
        <p class="is-size-1">
            "The Platform" <br>
            for caterers... <br> <br><br>
            ... and for those <br>
            who need them.
        </p>
    </div>
</div>
<div id="middle">
    <div class="container">
        <div class="jumbotron tx-clight poppins tx-bold">
            <p class="has-text-white is-size-1">
                This is not just some <br>
                catering service site <br>
            </p>
            <br><br><br><br><br><br><br><br><br>
            <p class="has-text-right has-text-white is-size-1 tx-bold">
                feeds. bridges clients and caterers <br>
                stronger than ever.
            </p>

        </div>
    </div>
</div>