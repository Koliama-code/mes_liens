<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>service web</title>
</head>

<body>

    <header>
        <div class="container">
            <div class="branding">
                <span class="circle1"></span>
                <span class="circle2"></span>
                <h1><span>Geek</span> Dieud </h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php" ">Accueil</a></li>
                    <li><a href=" listes.php">Listes</a></li>
                </ul>
            </nav>

        </div>
    </header>

    <section id="showcase">
        <div class="container">

            <h1>Bienvenu chez moi !</h1>

        </div>
    </section>

    <section id="">
        <div class="container">

            <form action="index.php" method="POST">
                <div class="desc">
                    <h1>Description</h1>
                    <input type="text" class="input1" name="descri"></input>
                </div>
                <div class="lien">
                    <h1>copié le lien</h1>
                    <input type="text" class="input1" name="cop"></input>
                </div><br>
                <button type="submit" name="Envoyer"> Sauvegarder</button>

            </form>

        </div>
    </section>
    <?php

    try {
        include('bd.php');
        if (isset($_POST['Envoyer'])) {
            if (!empty($_POST['descri']) and !empty($_POST['cop'])) {
                $descri = htmlspecialchars($_POST['descri']);
                $cop = htmlspecialchars($_POST['cop']);

                $insert = $con->prepare("INSERT INTO liste (Descri,liens) VALUES (?, ?);");
                $insert->execute(array($descri, $cop));
                echo "<script>alert(\"Sauvegarder avec succès\")</script>";
            } else {
                echo "<script>alert(\"Veillez remplir tout les champs\")</script>";
            }
        }
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    ?>

    <footer>
        <p>© Geek Dieud.2024</p>
        <hr>
        <div class="sociaux">

            <ul>
                <li>
                    <a href="https://github.com/Koliama-code" target="_blank" rel="noopener noreferrer">
                        <img src="./assets/icons/Github.svg" alt="" />
                    </a>
                </li>

                <li>
                    <a target="_blank" href="http://instagram.com/nathanaelkoliama " target="_blank" rel="noopener noreferrer">
                        <img src="./assets/icons/Instagram.svg" alt="" />
                    </a>
                </li>


                <li>
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=+243998525877&text=" target="_blank" rel="noopener noreferrer">

                        <img src="./assets/icons/whatsapp.png" alt="" / width="23px">
                    </a>
                </li>


                <li>
                    <a href="http://linkedin.com/nathanaelkoliama" target="_blank" rel="noopener noreferrer">
                        <img src="./assets/icons/Linkedin.svg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="http://" target="_blank" rel="noopener noreferrer">
                        <img src="./assets/icons/Twitter.svg" alt="" />
                    </a>
                </li>



            </ul>
        </div>
    </footer>




    <style>
        body {
            font: 15px/1.5, arial, helvetica, sans-serif;
            padding: 0;
            margin: 0;
            background: #f1eeed;
        }


        /* global */
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            z-index: 1000;

        }

        /* header */

        header {
            background: #35424a;
            color: #ffffff;
            padding-top: 15px;
            min-height: 70px;
            border-bottom: teal 3px solid;
            position: fixed;
            width: 100%;
            display: flex !important;
        }

        header a {
            color: #ffffff;
            text-decoration: none;
            font-size: 20px;
        }

        header a:hover {
            color: teal;
            text-transform: uppercase;
        }

        header ul {
            display: flex;
            margin-top: 20px;
        }

        header li {
            padding: 10px;
            list-style-type: none;
        }


        header #branding {
            float: left;

        }

        /* .branding {
            margin-left: 100Px;
        } */

        .branding h1 {
            margin-left: 50px;
        }


        header .highlight,
        header {
            color: teal;
            font-weight: bold;
        }

        /* NAV */

        /* nav ul li {
            display: inline;
            justify-content: space-between;
            margin-right: 100px;
        }

        nav li {
            padding: 2px;
        } */

        /* circle */
        .circle1 {
            margin-left: 2px;
            position: absolute;
            margin-top: 10px;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            background: teal;
        }

        .circle2 {
            position: absolute;
            margin-top: 10px;
            margin-left: 12px;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            background: white;
        }

        /* showcase */
        #showcase {

            text-align: center;
            color: #ac9f9f;
        }

        #showcase h1 {
            margin-top: 200px;
            font-size: 30px;
            margin-bottom: 50px;

        }



        .input1 {
            height: 30px;
            width: 250px;
            border: 0;
            margin-left: 70px;
            margin-top: 20px;
            font-weight: bold;
            color: #35424a;

        }


        .desc,
        .lien {
            margin-left: 300px;
            display: flex;
            color: #35424a;
            font-weight: bold;


        }

        button {

            background: #35424a;
            color: #ffffff;
            margin-top: 20px;
            margin-left: 490px;
            height: 35px;
            cursor: pointer;
            width: 250px;
            border: 0;
        }

        button:hover {
            background: teal;
        }

        img:hover {
            width: 30px;
        }

        footer {
            padding: 20px;
            margin-top: 100px;
            color: #ffffff;
            background-color: #35424a;
            display: flex;
            justify-content: space-between;
            padding-left: 125px;
        }

        footer p {
            margin-top: 40px;
        }

        footer li {
            list-style: none;
            padding: 10px;
        }

        footer ul {
            margin-top: 25px;
            display: flex;
            justify-content: space-between;
            margin-right: 100px;
        }


        @media only screen and (max-width: 990px) {

            .desc,
            .lien {
                margin-left: 50px;
                display: flex;
                color: #35424a;
                font-weight: bold;

            }

            #showcase h1 {
                margin-top: 200px;
                font-size: 30px;
            }



            button {
                background: teal;
                color: #ffffff;
                margin-top: 10px;
                margin-left: 240px;
                height: 35px;
                cursor: pointer;
                width: 250px;
                border: 0;
            }



        }


        @media only screen and (max-width: 720px) {

            #showcase h1 {
                margin-top: 200px;
                font-size: 30px;
                margin-bottom: 50px;

            }


            .lien,
            .desc {
                display: block;
                margin: auto;
                color: #35424a;
                font-weight: bold;
            }

            .input1 {
                height: 30px;
                border: 0;
                margin-left: 0px;
                margin-top: 0px;
            }

            button {
                background: #35424a;
                color: #ffffff;
                margin-top: 20px;
                margin-left: 0px;
                height: 35px;
                cursor: pointer;
                width: 250px;
                border: 0;
            }

            footer {
                padding: 20px;
                margin-top: 80px;
                color: #ffffff;
                background-color: #35424a;
                display: block;
                padding: auto;

            }



            footer p {
                text-align: center;
                align-items: center;
            }


            footer ul {
                display: flex;
                justify-content: space-between;
                margin-right: 40px;
            }

            hr {
                margin-top: 40px;
            }

            footer li {
                list-style: none !important;
                padding: 10px;
            }

        }
    </style>
</body>


</html>