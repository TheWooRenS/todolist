<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>CARD | DASHBOARD</title>
    <style>
        @media only screen and (max-width: 600px) {
        .myform {
                margin: auto;
                width: 180%;
            }
        .myform a{
                margin: auto;
                width: 180%;
            }
        }
        /* Hide scrollbar for Chrome, Safari and Opera */
        body::-webkit-scrollbar {
        display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        body {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
        }
    </style>
</head>

<?php
    $title = $_POST['updateTitle'];
    $dec = $_POST['updateDec'];
?>

<body style="overflow: hidden;">

    <form method="post" action="edit.php" class="myform">
        <div class="row">
            <div class="input-field col s6">
                <input placeholder="Başlık" id="title" name="title" type="text" class="validate" autocomplete="off" required <?php echo "value='{$title}'" ?> >
            </div>

        </div>
        <div class="row">
            <div class="input-field col s6">
                <input placeholder="Açıklama" id="dec" name="dec" type="text" class="validate" autocomplete="off" required  <?php echo "value='{$dec}'" ?>>
            </div>
        </div>
        <div class="row">
            <button type="submit" style="border: 0; background-color: transparent;" name="duzenle">
                <a class="waves-effect waves-light btn-large"><i class="material-icons right">edit</i>Düzenle</a>
            </button>
        </div>
    </form>

    <p style="float: left;">* Sadece açıklama düzenlenebilir</p>

</body>

</html>
