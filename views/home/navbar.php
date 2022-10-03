<!-- Make Gutter in Desktop view -->
    
<div class="desktopGutter">

    <!-- Header -->

    <header>
        <nav class="flexCenterBetween">
            <div class="containerLogo flexCenterVertical">
                <a href="/"><img src="../public/assets/icons/logo.svg" alt="Logo du logiciel BuildUs"></a>
                <h3>BuildUs</h3>
            </div>
            
            <!-- Navbar for desktop view -->
            
            <div class="desktopNav flexCenterBetween">
                <a href="#pricing">Tarifs</a>
                <a href="#features">Fonctionnalités</a>
                <a href="/../controllers/registrationController.php" class="createAccount">Inscription</a>
                <a href="/../controllers/connexionController.php" class="connectionAccount">Connexion</a>
            </div>

            <!-- Burger Menu for mobile view -->

            <div class="mobileNav">
                <a class="openModal" href="#"><span class="containerBurger"></span></a>
                <ul class="mobileNavList flexCenterCenterColumn">
                    <li><a href="#pricing">Tarifs</a></li>
                    <li><a href="#features">Fonctionnalités</a></li>
                    <div class="flexCenterAround containerConnection">
                        <li class="flexCenterCenter">
                            <a href="/../controllers/registrationController.php" class="createAccount">Inscription</a>
                        </li>
                        <li class="flexCenterCenter">
                            <a href="/../controllers/registrationController.php" class="connectionAccount">Connexion</a>
                        </li>
                    </div>
                </ul>
            </div>
        </nav>

        <!-- Products image for each size of screen -->

        <div class="heroBanner flexCenterColumn">
            <div class="containerTitle flexCenterCenter">
                <h1>Gérez votre entreprise plus <strong class="important">simplement</strong></h1>
            </div>
            <div class="containerImg flexCenterCenter">
                <img class="mockupMobile" src="../public/assets/img/mockup/mockupMobile.png" alt="MockUp de la version mobile du logiciel BuildUs">
                <img class="mockupTabletLandscape" src="../public/assets/img/mockup/mockupTabletLandscape.png" alt="MockUp de la version tablette du logiciel BuildUs">
                <img class="mockupTabletPortrait" src="../public/assets/img/mockup/mockupTabletPortrait.png" alt="MockUp de la version tablette du logiciel BuildUs">
                <img class="mockupDesktop" src="../public/assets/img/mockup/mockupDesktop.png" alt="MockUp de la version ordinateur du logiciel BuildUs">
            </div>
        </div>

        <!-- Call to action -->

        <div class="footerBanner flexCenterCenter">
            <a href="#features" class="callToAction">Découvrez BuildUs</a>
        </div>
    </header>