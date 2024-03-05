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



    <script>
        function filterTable() {
            var input, filter, table, tr, td_id, td_Descri, i, txtValue, td_liens;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            var resultsFound = false; // Définir une variable pour vérifier si des résultats sont trouvés

            // Cacher toutes les lignes du tableau
            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = "none";
            }

            // Afficher uniquement les lignes correspondant à la recherche
            for (i = 1; i < tr.length; i++) {
                td_id = tr[i].getElementsByTagName("td")[1];
                td_Descri = tr[i].getElementsByTagName("td")[2];
                td_liens = tr[i].getElementsByTagName("td")[3];
                if (td_id && td_Descri && td_liens) {
                    txtValue = td_id.textContent.toUpperCase() + " " + td_Descri.textContent.toUpperCase() + " " + td_liens.textContent.toUpperCase();
                    if (txtValue.indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        resultsFound = true; // Marquer qu'au moins un résultat est trouvé
                    }
                }
            }

            // Afficher le message "Aucun résultat trouvé" uniquement si aucune recherche n'a donné de résultats
            if (!resultsFound && filter !== "") {
                var noResultsRow = table.querySelector('tr[colspan]');
                if (!noResultsRow) {
                    noResultsRow = table.insertRow(-1);
                    var noResultsCell = noResultsRow.insertCell(-1);
                    noResultsCell.colSpan = 6; // Adapté au nombre de colonnes
                    noResultsCell.innerHTML = "Aucun résultat trouvé.";
                }
            } else {
                var noResultsRow = table.querySelector('tr[colspan]');
                if (noResultsRow) {
                    noResultsRow.remove();
                }
            }
        }
    </script>


    <form action="" method="post">
        <input type="search" name="recherche" id="searchInput" onkeyup="filterTable()" placeholder="Rechercher..." style=" padding: 4px; height: 38px; width: 180px;" autocomplete="off">
        <!-- <button type="submit" name="rechercher" class="button_1" autocomplete="off">Rechercher</button> -->
    </form>

    <section id="liste">

        <div class="MonTableau">
            <!-- <h1 style="margin:auto auto ; font-weight:bold;width:250px; color:#35424a;margin-top:20px "> Mes Liens</h1> -->

            <table style="text-align:center" id="myTable">

                <thead>
                    <tr>

                        <th>Id</th>
                        <th>Descriptions</th>
                        <th>Liens</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody id="showdata">

                    <?php

                    try {
                        include('bd.php');
                        $curseur = $con->prepare('SELECT * FROM liste');
                        $curseur->execute();
                        $result = $curseur->fetchAll();

                        foreach ($result as $row) {
                            $id = $row['id'];
                            echo '<tr>
    <td>' . $row['id'] . '</td>
    <td>' . $row['Descri'] . '</td>
    <td>' . $row['liens'] . '</td>


    <td>' . "<a href='sup.php?id=$id' onclick='return confirm(\"Etes Vous sûr de supprimer?\");'><button style='margin:auto auto; background:#35424a;color:white'>Supprimer</button></a>" . " " .
                                '</td>

    </tr>';
                        }
                    } catch (PDOException $e) {
                        echo 'ERROR: ' . $e->getMessage();
                    }



                    ?>

                </tbody>
            </table>
    </section>

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

        .branding h1 {
            margin-left: 50px;
        }


        header .highlight,
        header {
            color: teal;
            font-weight: bold;
        }

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

        /* form */
        form {
            margin-left: 120px;
        }

        button {
            background: #35424a;
            color: #ffffff;
            margin-top: 20px;
            border: #ffffff;
            height: 35px;
            cursor: pointer;
            border: 1px solid #ffffff;
            width: 150px;

        }

        button:hover {
            background: teal;
        }

        /* Images */

        img:hover {
            width: 30px;
        }

        /* Table */

        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto auto;
            margin-top: 40px;

        }

        table tr:nth-child(even) {
            background-color: #ddd;
        }

        table tr:nth-child(odd) {
            background-color: #f5f5f5;
        }



        th {
            background: #35424a;
            border: 2px solid #35424a;
            color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        td {
            border: 1px solid #ccc;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
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


            #showcase h1 {
                margin-top: 200px;
                font-size: 30px;
                margin-bottom: 50px;

            }



            button {
                background: teal;
                color: #ffffff;
                margin-top: 20px;
                margin-left: 10px;
                height: 35px;
                cursor: pointer;
                width: 150px;
                border: 0;
            }

            #searchInput {
                margin-top: 20px;
            }
        }


        @media only screen and (max-width: 680px) {

            form {
                margin-left: 58px;
            }


            table {
                border-collapse: collapse;
                width: 50%;
                margin: auto auto;
                margin-top: 40px;

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