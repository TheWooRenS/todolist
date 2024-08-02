<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARD</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/hint.css@3.0.0/hint.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .thirteen h1 {
            position: relative;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 0px;
            text-transform: uppercase;
            width: 175px;
            text-align: center;
            margin: auto;
            white-space: nowrap;
            border: 2px solid #222;
            padding: 5px 11px 3px 11px;
        }

        .thirteen h1:before,
        .thirteen h1:after {
            background-color: #546E7A;
            position: absolute;
            content: '';
            height: 7px;

            width: 7px;
            border-radius: 50%;
            bottom: 12px;
        }

        .thirteen h1:before {
            left: -20px;
        }

        .thirteen h1:after {
            right: -20px;
        }

        .rainbow-bg {
            animation: rainbow-bg 2.5s linear;
            animation-iteration-count: infinite;
        }

        .rainbow {
            animation: rainbow 2.5s linear;
            animation-iteration-count: infinite;
        }

        @keyframes rainbow {

            100%,
            0% {
                color: rgb(255, 0, 0);
            }

            8% {
                color: rgb(255, 127, 0);
            }

            16% {
                color: rgb(255, 255, 0);
            }

            25% {
                color: rgb(127, 255, 0);
            }

            33% {
                color: rgb(0, 255, 0);
            }

            41% {
                color: rgb(0, 255, 127);
            }

            50% {
                color: rgb(0, 255, 255);
            }

            58% {
                color: rgb(0, 127, 255);
            }

            66% {
                color: rgb(0, 0, 255);
            }

            75% {
                color: rgb(127, 0, 255);
            }

            83% {
                color: rgb(255, 0, 255);
            }

            91% {
                color: rgb(255, 0, 127);
            }
        }
    </style>
</head>

<body>
    <br>
    <div class="thirteen">
        <h1>PHP TO-DO List</h1>
    </div>
    <br>
    <?php
    $db = new PDO("sqlite:" . __DIR__ . "/db.db");
    $sql = 'SELECT * FROM card';
    $kayitlar = $db->query($sql);
    ?>
    <?php foreach ($kayitlar as $row) { ?>
        <div class="row">
            <div class="col s12 m6">
                <div class="wow card blue-grey darken-1 animate__animated animate__backInLeft" data-wow-duration="1.4s" data-wow-offset="100">
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?= $row['title'] ?>">
                        <button class="material-icons" style="border: none; background-color: transparent; float: right; cursor: pointer; color: white; margin-right: 15px; margin-top: 15px;">cancel</button>
                    </form>
                    <form action="update.php" method="post">
                        <input type="hidden" name="updateTitle" value="<?= $row['title'] ?>">
                        <input type="hidden" name="updateDec" value="<?= $row['dec'] ?>">
                        <button class="material-icons" style="border: none; background-color: transparent; float: right; cursor: pointer; color: white; margin-top: 15px;">edit</button>
                    </form>
                    <div class="card-content white-text">
                        <span class="card-title"><?= $row['title'] ?></span>
                        <p><?= $row['dec'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="hint--rigth" aria-label="Kart Ekle">
        <span><a style="margin-left: 25px; margin-bottom: 25px; float: right;" class="btn-floating btn-large waves-effect waves-light red" href="dashboard.php"><i class="material-icons">add</i></a></span>
    </div>
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/hint.css@3.0.0/Gruntfile.min.js"></script>
    <footer>
        <br><br>
        <center style="font-size: 15px; width: 100%; height: 35px; user-select: none; cursor: url('https://cdn.custom-cursor.com/db/cursor/32/Infinity_Gauntlet_Cursor.png') , default !important;">
            <div class='rainbow'>thewoorens</div>
        </center>
    </footer>
</body>

</html>