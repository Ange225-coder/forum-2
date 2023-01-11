<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Forum for DEV</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="public/css/indexStyle.css">
    </head>

    <body>

        <header style="background-image: url('public/pics/homepage/bg-masthead.jpg')">

                <!--  ../../ are used here for escape backend/router/router.php if the link into the url has been changed  -->
            <nav>
                <h1>
                    <a href="../../index.php">Dev Forum</a>
                </h1>

                <ul>
                    <li>
                        <a href="../../frontend/views/users/userLogin/login.php">Se connecter</a>
                    </li>

                    <li>
                        <a href="../../frontend/views/users/userRegistration/registration.php">S'inscrire</a>
                    </li>
                </ul>
            </nav>

            <div>
                <h1>Votre Endroit Favori pour discuter de Technologies, de Codes Informatiques</h1>

                <hr >

                <p class="header-textInfo--size">
                    Sur Dev Forum, vous pouvez créer des sujets de discussions, posez un problème en programmation, aidez certains développeurs à résoudre leur problème lié aux codes
                </p>

                <p>
                    <a href="../../frontend/views/users/userRegistration/registration.php">En savoir plus</a>
                </p>
            </div>
        </header>


        <section class="information">
            <div>
                <h1>Pour les développeurs, nous avons ce qu'il faut!</h1>

                <hr>

                <p class="information--textSize">
                    Dev Forum vous propose l'aide dont vous avez besoin pour vous épanouir dans le monde du développement informatique! En fonction de vos besoins, cliquez sur l'un des liens, pour créer ou participer à une discussion, pour poser une préoccupation ou pour répondre à un problème posé!
                </p>

                <p>
                    <a href="../../frontend/views/users/userLogin/login.php">Commencer!</a>
                </p>
            </div>
        </section>


        <section class="services">

            <h1 class="services--marge">A votre service</h1>

            <hr>

            <div class="services--flex">
                <div>
                    <h1 class="bi-gem"></h1>

                    <h2>Sujets explicites</h2>

                    <p>
                        Créer des sujets de discussions explicites autour de l'informatique!
                    </p>
                </div>

                <div>
                    <h1 class="bi-globe"></h1>

                    <h2>Apport d'aides</h2>

                    <p>
                        Parcourez les sujets de discussions déjà créer et partagez votre avis
                    </p>
                </div>

                <div>
                    <h1 class="bi-laptop"></h1>

                    <h2>Codes</h2>

                    <p>
                        Publiez, ou apportez des modifications sur les codes erronés postés
                    </p>
                </div>

                <div>
                    <h1 class="bi-heart"></h1>

                    <h2>Faite le avec amour</h2>

                    <p>
                        Les informaticiens ne constituent-ils pas une superbe et grande famille ?
                    </p>
                </div>
            </div>
        </section>


        <section class="links">

            <div class="links--flex">
                <div>
                    <a href="#">
                        <img src="public/pics/homepage/1.jpg" alt="dev-forum-project-1">
                    </a>
                </div>

                <div>
                    <a href="#">
                        <img src="public/pics/homepage/2.jpg" alt="dev-forum-project-2">
                    </a>
                </div>

                <div>
                    <a href="#">
                        <img src="public/pics/homepage/3.jpg" alt="dev-forum-project-3">
                    </a>
                </div>
            </div>

            <div class="link-members">
                <div class="link-members--pad">
                    <h1>
                        Parler Informatique en devenant membre de Dev Forum!
                    </h1>

                    <p>
                        <a href="../../frontend/views/users/userRegistration/registration.php">Devenir membre!</a>
                    </p>
                </div>

            </div>

        </section>


        <section class="suggestions">

            <h1>Entrons en contact!</h1>

            <hr>

            <p class="suggestions-p1--marge">
                Êtes-vous prêt à construire votre prochain projet avec nous? où à nous faire des suggestions pour ce site? Envoyez-nous un message et nous vous répondrons dèh que possible!
            </p>

            <form method="post" action="../../backend/router/router.php?action=setSuggestionCtrl">

                <p class="error">
                    <?php if(isset($error_suggestions)): ?>



                        <?= $error_suggestions; ?>

                    <?php endif; ?>
                </p>

                <div>
                    <label for="full_name">
                        <input type="text" name="full_name" id="full_name" placeholder="Full name" class="form--pad" required>
                    </label>
                </div>

                <div>
                    <label for="email">
                        <input type="email" name="email" id="email" placeholder="Email address" class="form--pad" required>
                    </label>
                </div>

                <div>
                    <label for="phone">
                        <input type="tel" name="phone" id="phone" placeholder="Phone number" class="form--pad" required>
                    </label>
                </div>

                <div>
                    <label for="suggestion">
                        <textarea name="suggestion" id="suggestion" placeholder="Message" class="area--pad" required></textarea>
                    </label>
                </div>

                <div>
                    <button type="submit" onclick="showPopUp()">Envoyer</button>
                </div>

                <script src="vendor/popUp.js"></script>
            </form>

            <h2 class="bi-phone"></h2>

            <p>+ (225) 07-679-495-58</p>

        </section>


        <footer>
            <p>
                Copyright © 2022 - Dev Forum - <a href="../../frontend/views/admins/adminIndex.php">Gestion</a>
            </p>
        </footer>
    </body>
</html>