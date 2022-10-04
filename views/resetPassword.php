<div class="backToHome">
        <a href="/accueil"><i class="fa-solid fa-arrow-left"></i></a> 
    </div>
    <div class="formContainer flexCenterColumn">
        <div class="formContent">
            <div class="formContentTitle flexCenterCenter">
                <h3>Retrouvez <strong class="important">BuildUs</strong></h3>
            </div>
            <form method="POST" novalidate>
                <div class="formInput flexCenterCenterColumn">
                    <input type="text" placeholder="example@app.com" name="userLogin" required>
                    <p class="errorMessage"><?= (array_key_exists('userLogin', $errorConnexion)) ? $errorConnexion['userLogin'] : '' ?></p>
                    <input type="password" placeholder="Mot de passe" name="userPassword" required>
                    <p>Mot de passe oublié ? <a href="connexion.html">Cliquez ici</a></p>
                </div>
                <div class="registerButton flexCenterCenter">
                    <button type="submit" name="connexion">Se connecter</button>
                </div>
            </form>
        </div>
        <h4>Vous souhaitez créer un compte ? <a href="/inscription">Cliquez ici</a></h4>
    </div>

    <!-- CDN Font Awesome -->

    <script src="https://kit.fontawesome.com/d067b7d25c.js" crossorigin="anonymous"></script>