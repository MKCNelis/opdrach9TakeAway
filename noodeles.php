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
        // header('location: sushi.php');
        echo('<script>ReloadPage()</script>');
    }
    $iTotaal = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>noodles</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/Style.css">
</head>
<body>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup"></div>
        <a class="navbar-brand" href="#"><img src="afbeeldingen/noodlebowl.gif" height="50px"></a>
       <div class="container_Big" style="padding-left:60%;">
         <button>login</button>
        <button>registreren</button>
        <button> <img src="afbeeldingen/street-food-cart.png" height="50px"></button>
        </div>
        </div>
     
    <!-- <img src="/afbeeldingen/pusheen.gif" alt="cat"> -->
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
            <a class="nav-item nav-link" href="noodeles.html">noodles</a>
            <a class="nav-item nav-link" href="Hotpot.html">Hotpot</a>
          </div>
        </div>
      </nav>
    
    <div class="box boxbackground hiddentext">
       <h>
           Dah food
       </h>
       <br>
       <br>
       <img src="afbeeldingen/miguel-maldonado-qom5MPOER-I-unsplash.jpg" height="500px">
        <p>
          Al 20 jaar een begrip in het centrum van Heerlen
          <br>De hotspotvoor AsianCuisine
          <br>Klanten hadden behoefte aan take away
          <br>2 jaar lang telefonische takeaway bestellingen
          <br>Nu wilt Hot Pot een online take awayomgeving
          <br>Bestellen van iconische gerechten
          <br>Bestellen van pakketten instant noodles(nevenproducten)
          <!-- <form>
          <input type="number"name=""><input type="checkbox" name="">
        </form> -->
        </p>

    </div>
    <br>
    <div class="box boxbackground hiddentext">
        <form method="POST">
            <div>              
                <div class="ar-image" id="noodele2">
                    <div class="article-image">
                      <h>
                          Dah food
                      </h>
                      <br>
                      <br>
                        <p>
                        Al 20 jaar een begrip in het centrum van Heerlen
                        <br>De hotspotvoor AsianCuisine
                        <br>Klanten hadden behoefte aan take away
                        <br>2 jaar lang telefonische takeaway bestellingen
                        <br>Nu wilt Hot Pot een online take awayomgeving
                        <br>Bestellen van iconische gerechten
                        <br>Bestellen van pakketten instant noodles(nevenproducten)
                        <!-- <form>
                          <input type="number"name=""><input type="checkbox" name="">
                        </form> -->
                        </p>
                        <input type="hidden" name="sProductNaam" value="sushi 2"><br>
                        <input type="hidden" name="fPrijs" value="3.52"><br>
                        <input type="number" name="iAantal" required>
                        <button type="submit" onclick="ReloadPage()">add to kart</button>
                  </div>
              </div>
          </div>
      </form>

   </div>
   <br><br>
   <form onclick="submit">
   <div class="box boxbackground hiddentext">
        <h>
            Dah food
        </h>
        <br>
        <img src="afbeeldingen/matt-chris-pua-vQQJeTpBmmM-unsplash.jpg" height="500px">
          <p>
          Al 20 jaar een begrip in het centrum van Heerlen
          <br>De hotspotvoor AsianCuisine
          <br>Klanten hadden behoefte aan take away
          <br>2 jaar lang telefonische takeaway bestellingen
          <br>Nu wilt Hot Pot een online take awayomgeving
          <br>Bestellen van iconische gerechten
          <br>Bestellen van pakketten instant noodles(nevenproducten)
          </p>

 </div>
</form>
    <hr>
</div>

</body>
<footer>

</footer>
</html>
<script>


</script>