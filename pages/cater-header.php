<!-- NAVBAR FOR CATER -->
<nav class="navbar navbar-light navbar-expand-md" id="nav-cater">
    <div class="container-fluid"><a class="navbar-brand" id="navbar-cater" href="cater.php?page=client-home" style="font-size: 25px;"><img src="../assets/branding/Logo White.png" alt="" width="72px"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav">
                <li class="nav-item" role="presentation"><a class="nav-link" id="nav-item-cater" href="cater.php?page=cater-profile">Profile</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="nav-item-cater" href="cater.php?page=cater-transactions">Transactions</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" id="nav-item-cater" href="#">Calendar</a></li>
                <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" style="text-decoration: none;color: white" aria-expanded="false" href="#">Welcome, <?php echo $comp_name ?></a>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <a class="dropdown-item" role="presentation" href="#">Account Settings</a>
                        <a class="dropdown-item" role="presentation" href="edit-profile.php?edit=<?=$id_number;?>">Edit Profile</a>
                    </div>
                </li>

                <li class="nav-item" role="presentation"><a class="nav-link" id="nav-item-cater" href="control/do_logout.php">Sign Out</a></li>
            </ul>
        </div>
    </div>
</nav>