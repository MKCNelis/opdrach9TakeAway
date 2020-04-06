<?php
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
        //run the function to reload the page
        PlaceOrder();
    }

    function ClearArray() {
        //open the file in writing mode
        $file = fopen('winkelwagen.json','r');
        //clear the file
        file_put_contents('');
    }

    $aWinkelwagen = LoadArray();
    $iTotaal = 0;
?>

<script>
    function PlaceOrder() {
        document.reload();
    }
</script>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Winkelwagen</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="./css/Style.css">
    </head>

    <body>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup"></div>
            <a class="navbar-brand" href="index.html"><img src="./afbeeldingen/noodlebowl.gif" height="50px"></a>
        <div class="container_Big" style="padding-left:60%;">
            <button>login</button>
            <button>registreren</button>
            <button> <img src="./afbeeldingen/street-food-cart.png" height="50px"></button>
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
                <a class="nav-item nav-link" href="sushi.php">Sushi</a>
                <a class="nav-item nav-link" href="noodeles.html">noodels</a>
                <a class="nav-item nav-link" href="Hotpot.html">Hotpot</a>
            </div>
            </div>
        </nav>
        
        <div class="row justify-content-center page-content">
            <div class="Winkelmandje col-7" style="background-color: var(--ColorGray);">
                <table>
                    <tr>
                        <th width="90%">Product</th>
                        <th width="5%">Prijs</th>
                        <th width="5%">Aantal</th>
                    </tr>
                    <?php
                        if(!empty($aWinkelwagen[0])) {
                            foreach($aWinkelwagen as $iKey => $aContentArray) {
                                echo("<tr>"
                                    ."<td>".$aContentArray[0]."</td>"                                                 //Product naam
                                    ."<td align='right'>".$aContentArray[1]."</td>"                                   //Product prijs
                                    ."<td align='right'>".$aContentArray[2]."</td>"                                   //Aantal in winkelwagen
                                    ."</tr>");
                                $iTotaal = number_format($iTotaal+($aContentArray[2]*$aContentArray[1]), 2, ".", "");
                            }
                        }
                        else{
                            echo("looking prety empty here");
                        }
                    ?>
                </table>
            </div>

            <div class="Winkelmandje col-3" style="background-color: var(--ColorGray);">
                <div>
                    <?php
                        foreach($aWinkelwagen as $iKey => $aContentArray) {
                            echo("€".number_format(($aContentArray[2]*$aContentArray[1]), 2, '.', '')."<br>");
                        }
                        echo("<b>€".number_format(($iTotaal), 2, ".", "")."</b>");
                    ?>
                </div>
                <div>
                    Betalingsmethode:<br>
                    <button class='MethodeKnoppen'><input type='radio' id='0'
                    name='iBetalingsMethode' value='0'> 
                    <label for='0'>Paypal</label></button><br>
                    <button class='MethodeKnoppen'><input type='radio' id='1'
                    name='iBetalingsMethode' value='1'> 
                    <label for='1'>Ideal</label></button><br>
                    <button class='MethodeKnoppen'><input type='radio' id='2'
                    name='iBetalingsMethode' value='2'> 
                    <label for='2'>AmazonPay</label></button><br>
                </div>

            </div>
        </div>

        <div id="complete">
        </div>

        
    </body>

</html>