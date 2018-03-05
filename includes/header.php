<header>
    <!-- menu classique desktop -->
        <div class="navbar-fixed" id="menuDesktop">
            <nav>
                <a href="http://projet4.gostiaux.net" id="logo">
                    <img src="public/images/logo.png" alt="Logo du site">
                </a>

                <!-- contenu menu déroulant pour les épisodes -->
                    <ul id="dropdown1" class="dropdown-content">
                        <li><a href="#!">one</a></li>
                        <li class="divider"></li>
                        <li><a href="#!">two</a></li>
                        <li class="divider"></li>
                        <li><a href="#!">three</a></li>
                    </ul>

                <ul class="right hide-on-med-and-down" id="menuDroit">
                    <li><a href="http://projet4.gostiaux.net"><i class="material-icons left">home</i>Accueil</a></li>
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons left">local_library</i>Episodes<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href="view/login.php"><i class="material-icons left">lock_open</i>Identification</a></li>
                </ul>
            </nav>
        </div>

    <!-- menu mobile responsive -->
        <div id="menuMobile">
            <nav>
                <div class="nav-wrapper" class="navbar-fixed">
                        <a href="http://projet4.gostiaux.net" id="logo">
                            <img src="public/images/logo.png" alt="Logo du site">
                        </a>
                        <a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                </div>
            </nav>
                <!-- elements du menu responsive -->
                    <ul id="dropdown2" class="dropdown-content">
                        <li><a href="#!">one</a></li>
                        <li class="divider"></li>
                        <li><a href="#!">two</a></li>
                        <li class="divider"></li>
                        <li><a href="#!">three</a></li>
                    </ul>

                <ul class="sidenav" id="mobile-menu">
                    <li><a href="http://projet4.gostiaux.net">Accueil</a></li>
                    <li><a href="#!" class="dropdown-trigger" data-target="dropdown2">Episodes</a></li>
                    <li><a href="view/login.php">Identification</a></li>
                </ul>
        </div>
</header>