<!-- NAVBAR FOR CATER -->
<nav class="navbar navbar-light navbar-expand-md" id="nav-client">
    <div class="container-fluid"><a class="navbar-brand" id="navbar-cater" href="client.php?page=client-home" style="font-size: 25px;">feeds</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav">
                <li class="nav-item" role="presentation"><a class="nav-link" id="nav-item-client" href="client.php?page=client-profile">Profile</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="nav-item-client" href="client.php?page=client-transactions">Transactions</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="nav-item-client" href="client.php?page=client-calendar">Calendar</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="nav-item-client" href="#">Welcome <?php echo $login_session ?></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="nav-item-client" href="control/do_logout.php">Sign Out</a></li>
            </ul>
        </div>
    </div>
</nav>