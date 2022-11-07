<main>

    <div class="formContent hidden">
        <div class="formContentTitle flexCenterCenter">
            <div class="containerAdd flexCenterCenter">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <h3>Ajout d'un client</h3>
        </div>
        <form method="POST">
            <div class="formInput flexCenterCenterColumn">
                <div class="formName flexCenterBetween">
                    <div class="flexCenterCenterColumn">
                        <input type="text" placeholder="Nom*" name="lastname" value="<?= $lastname ?? '' ?>" pattern="<?= REGEX_NAME ?>" required>
                        <p class="errorMessage"><?= (array_key_exists('lastname', $errorsRegistration)) ? $errorsRegistration['lastname'] : '' ?></p>
                    </div>
                    <div class="flexCenterColumn">
                        <input type="text" placeholder="Prénom*" name="firstname" value="<?= $firstname ?? '' ?>" pattern="<?= REGEX_NAME ?>" required>
                        <p class="errorMessage"><?= (array_key_exists('firstname', $errorsRegistration)) ? $errorsRegistration['firstname'] : '' ?></p>
                    </div>
                </div>
                <input type="mail" placeholder="example@app.com" name="mail" value="<?= $mail ?? '' ?>" pattern="<?= REGEX_MAIL ?>" required>
                <p class="errorMessage"><?= (array_key_exists('mail', $errorsRegistration)) ? $errorsRegistration['mail'] : '' ?></p>
                <input type="tel" placeholder="Téléphone*" name="phone" value="<?= $phone ?? '' ?>" pattern="<?= REGEX_PHONE ?>" required>
                <p class="errorMessage"><?= (array_key_exists('phone', $errorsRegistration)) ? $errorsRegistration['phone'] : '' ?></p>
                <input type="text" placeholder="SIRET*" name="siret" value="<?= $siret ?? '' ?>" pattern="<?= REGEX_SIRET ?>" required>
                <p class="errorMessage"><?= (array_key_exists('income', $errorsRegistration)) ? $errorsRegistration['siret'] : '' ?></p>
                <input type="text" placeholder="Adresse" name="adress" value="<?= $adress ?? '' ?>">
                <p class="errorMessage"><?= (array_key_exists('adress', $errorsRegistration)) ? $errorsRegistration['siret'] : '' ?></p>
            </div>
        
            <!-- Button to submit form -->
        
            <div class="registerButton flexCenterCenter">
                <button type="submit">Ajouter</button>
            </div>
        </form>
    </div>

    <!-- Modal confirmation register -->
    <?php if (isset($confirmation)) : ?>
        <?php if($confirmation == true) :?>
        <div class="showResult visible">
            <p class="resultFormText goodResult">Le données ont bien été ajoutées</p>
        </div>
        <?php elseif ($confirmation == false) : ?>
        <div class="showResult visible">
            <p class="resultFormText badResult">Les données fournies ne sont pas conformes</p>
        </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if (isset($isExist)) : ?>
        <?= ($isExist == true) ? '<div class="showResult visible"><p class="resultFormText badResult">L\'employé existe déjà dans le répertoire</p></div>' : '' ;?>
    <?php endif; ?>

    <!-- Listage des clients  -->
    <div class="containerSubject">
        <div class="containerTitleListing flexCenterCenter">
            <div class="containerAdd flexCenterCenter">
                <i class="fa-solid fa-plus"></i>
            </div>
            <h3>Clients</h3>
        </div>
        <div class="containerContent flexCenterColumn">
        <?php foreach ($tenClients as $client) : ?>
        <div class="listingRecap flexCenterBetween">
            <div class="containerInformations">
                <div class="containerPicture">
                    <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2940&q=80" alt="">
                </div>
                <div class="containerName">
                    <p><?= $client->lastname ?> <?= $client->firstname ?></p>
                </div>
            </div>
            <div class="containerMore flexCenterCenter">
                <div class="containerPlus flexCenterCenter">
                    <a href="/dashboard/profil-client?id=<?= $client->Id_users ?>"><i class="fa-regular fa-eye"></i></a>
                </div>
            </div>      
        </div>
        <?php endforeach; ?>
        </div>
        <div class="pagesListing">
            <?php if (isset($page) && $page > 1) : ?>
                <div class="containerPages flexCenterCenter">
                    <?php if ($page == 1) : ?>
                        <div class="containerPage flexCenterCenter">
                        </div>
                    <?php else : ?>
                        <div class="containerPage flexCenterCenter">
                            <a href="/dashboard/employes?page=<?= $whichPage - 1 ?>"><i class="fa-solid fa-chevron-left"></i></a>
                        </div>
                    <?php endif; ?>
                    <?php if($page == $howManyPages) : ?>
                        <div class="containerPage flexCenterCenter">
                        </div>
                    <?php else : ?>
                        <div class="containerPage flexCenterCenter">
                            <a href="/dashboard/employes?page=<?= $whichPage + 1 ?>"><i class="fa-solid fa-chevron-right"></i></a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>
