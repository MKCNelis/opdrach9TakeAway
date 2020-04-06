<?php
//function to save the array the 'winkelwagen.json' file
function SaveArray($p_aSaveArray) {
    //change string into json compatible data
    $aJSONArray = json_encode($p_aSaveArray);
    //open the file in writing mode
    $file = fopen('winkelwagen.json','w');
    //change the files content of the opened file to what it already was + the new array
    file_put_contents('winkelwagen.json', $aJSONArray);
    //close the file
    fclose($file);
}

//function to load the 'winkelwagen.json' file
function LoadArray() {
    //open the file in reading mode
    $file = fopen('winkelwagen.json','r');
    //get the content of the opened file
    $aJSONArray = file_get_contents('winkelwagen.json');
    //change the read string to php compatible data
    $aReadArray = json_decode($aJSONArray,TRUE);
    //close the file
    fclose($file);
    //save the loaded data to be used in the page
    return($aReadArray);
}

//function to clear the 'winkelwagen.json' file
function ClearArray() {
    //open the file in writing mode
    $file = fopen('winkelwagen.json','r');
    //clear the file
    file_put_contents('');
    //run the function to reload the page
    PlaceOrder();
}

if(!empty($_POST)){
    $sProductNaam   = $_POST['sProductNaam'];
    $fPrijs         = $_POST['fPrijs'];
    $iAantal        = $_POST['iAantal'];

    $aWinkelwagen = LoadArray();
    $iRecordCounter = count($aWinkelwagen);
    $aWinkelwagen[$iRecordCounter] = array($sProductNaam,$fPrijs,$iAantal);
    //save the array to the file
    SaveArray($aWinkelwagen);
    header('location: winkelwagen.php');

}
$iTotaal = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/Style.css">
    <script>
        function ReloadPage() {
            document.getElementById('bConfirmation').innerHTML = '<p>are you sure this is what you want to buy?</p>\
                <button id="bTrueConfirm"></button>\
                <button id="bDone"></button>\
                <button id="bCancel"></button>';
            document.getElementById('bConfirmation').htmlstyle
        }
    </script>
</head>
<body>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup"></div>
<a class="navbar-brand" href="#"><img src="./Afbeeldingen/noodlebowl.gif" height="50px"></a>
<div class="container_Big" style="padding-left:60%;">
    <button>login</button>
    <button>registreren</button>
    <button> <img src="./Afbeeldingen/street-food-cart.png" height="50px"></button>
</div>
</div>
<div class="container_Big">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="index.html">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">Hotpot</a>
                <a class="nav-item nav-link" href="#">Sushi</a>
                <a class="nav-item nav-link" href="noodles.php">noodles</a>
                <a class="nav-item nav-link" href="Hotpot.php">Hotpot</a>
            </div>
        </div>
    </nav>

    <div class="container_Big" style="background-color: var(--ColorGray);">

        <div class="container">
            <h2>
                <p>
                    bij de hotpots krijgt u de ingredienten bezorgd u hoeft allen maar een pan een een warmteborn te hebben enn een beetjegeduld
                    alle producten die geleverd worden zij par boiled zo dat de kans van voedsel vergifteging zo klein mogelijk is, de
                </p>
            </h2
        </div>
        <div class="container aligner" style="background-color: var(--ColorGray);">
            <img src="./Afbeeldingen/Sushi-1.jfif" alt="doet nie" width="34%" height="30%" class="roundimage" border="5">
        </div>
        <hr>
        <div class="container alignerboxes" style="background-color: var(--ColorGray);">
            <div class="row" >
                <div class="col-6">
                    <form method="POST">
                        <div>
                            <!--                        <div class="ar-image">-->
                            <!--                            <div class="article-image">-->
                            <h>
                                shoyu Ramen
                            </h>
                            <br>
                            <img src="./afbeeldingen/MizutakiChickenHotPot.jpg" height="250px">
                            <p>

                                <input type="hidden" name="sProductNaam" value="shoyu Ramen"><br>
                                <input type="hidden" name="fPrijs" value="10.75"><br>
                                <input type="number" name="iAantal">
                                <button type="submit" onclick="ReloadPage()">add to kart</button>
                            </p>
                            <!--                            </div>-->
                            <!--                        </div>-->
                        </div>
                    </form>
                </div>
                <div class="col-6">

                    <div>
                        <!--                        <div class="ar-image">-->
                        <!--                            <div class="article-image">-->
                        <p>
                            <br><h6> shoyu the traditional word for ramen with soja</h6>
                            <br> bambooshoots
                            <br> chashu
                            <br> springunion
                            <br> soya egg
                            <br> 1shitake
                            <br> flour ramen noodles

                        </p>
                        <!--                            </div>-->
                        <!--                        </div>-->
                    </div>

                </div>
            </div>
            <div class="row" >
                <div class="col-6">

                    <div>
                        <!--                        <div class="ar-image">-->
                        <!--                            <div class="article-image">-->
                        <p>
                            <br>green curry ramen conbines the the ramen from japan with the tast of Thai curry
                            <br>laos leaves
                            <br>lemongrass,
                            <br>1 bunch scallions, sliced,
                            <br>chicken
                            <br>greenpeppers
                            <br>fish sauce
                            <br> sesem oil
                            <br>ginger
                            <br>basel
                            <br>deepfriet sjalotje
                            <br>beensprouts
                            <br>some toasted sesame seeds,
                            <br> cuconutmilk

                        </p>
                        <!--                            </div>-->
                        <!--                        </div>-->
                    </div>

                </div>
                <div class="col-6">
                    <form method="POST">
                        <div>
                            <!--                        <div class="ar-image">-->
                            <!--                            <div class="article-image">-->
                            <h>greencurry ramen</h>
                            <br>
                            <img src="./afbeeldingen/porkhotpot.jpg" height="250px">
                            <br>
                            <input type="hidden" name="sProductNaam" value="greencurry ramen"><br>
                            <input type="hidden" name="fPrijs" value="9.75"><br>
                            <input type="number" name="iAantal">
                            <button type="submit" onclick="ReloadPage()">add to kart</button>
                            <!--                            </div>-->
                            <!--                        </div>-->
                        </div>
                    </form>
                </div>
            </div>
            <div class="row" >
                <div class="col-6">
                    <form method="POST">
                        <div>
                            <!--                        <div class="ar-image">-->
                            <!--                            <div class="article-image">-->
                            <h>
                                mushroom tofuramen
                            </h>
                            <br>
                            <img src="./afbeeldingen/VeganKimchiHotPot_wide-1024x575.jpg" height="250px">
                            <p>

                                <input type="hidden" name="sProductNaam" value="mushroomtofu ramen"><br>
                                <input type="hidden" name="fPrijs" value="25.50"><br>
                                <input type="number" name="iAantal">
                                <button type="submit" onclick="ReloadPage()">add to kart</button>
                            </p>
                            <!--                            </div>-->
                            <!--                        </div>-->
                        </div>
                    </form>
                </div>
                <div class="col-6">

                    <div>
                        <!--                        <div class="ar-image">-->
                        <!--                            <div class="article-image">-->
                        <p><br> powerful mushroom stock with tofu and an arragement of mushrooms
                            <br> topping

                            <br> shittake
                            <br> cubed tofu
                            <br> enoki muschrooms
                            <br> spinage
                            <br> furikake
                            <br>deepried sjolots
                            <br>

                        </p>
                        <!--                            </div>-->
                        <!--                        </div>-->
                    </div>

                </div>
            </div>
        </div>
        <div id="bConfirmation"></div>
    </div>
</body>

<script>
    //function to reload the page
    function PlaceOrder() {
        window.location.replace("winkelwagen.php");
    }
</script>
</html>
