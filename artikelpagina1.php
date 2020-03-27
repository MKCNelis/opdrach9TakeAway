<?php
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
    if(!empty($_POST)){
        $sProductNaam   = "testproduct1";
        $iPrijs         = 5.32;
        $iAantal        = $_POST['iAantal'];
        
        $aWinkelwagen = LoadArray();
        $iRecordCounter = count($aWinkelwagen);
        $aWinkelwagen[$iRecordCounter] = array($sProductNaam,$iPrijs,$iAantal);
    }
    $iTotaal = 0;
?>

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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">Features</a>
            <a class="nav-item nav-link" href="#">Pricing</a>
          </div>
        </div>
      </nav>
    
    <div class="row justify-content-center page-content">
        <div class="Winkelmandje col-7">
            <h2>testartikel 1</h2>
            <p>
                this is just a test product<br>
                donot mind this text as it is subject to change<br>
                also. as a customer you should be unable to reach this page<br>
                if you did however reach this page as a customer. please let us know so we can better your experience<br>
                thank you very much for your input
            </p>
        </div>

        <div class="Winkelmandje col-3">
            <div>
                <?php
                    echo("Betalingsmethode:<br>"
                        ."<button class='MethodeKnoppen'><input type='radio' id='0'
                        name='iBetalingsMethode' value='0'> 
                        <label for='0'>Paypal</label></button><br>"                                  //value 0 = PayPal
                        ."<button class='MethodeKnoppen'><input type='radio' id='1'
                        name='iBetalingsMethode' value='1'> 
                        <label for='1'>Ideal</label></button><br>"                                   //value 1 = Ideal
                        ."<button class='MethodeKnoppen'><input type='radio' id='2'
                        name='iBetalingsMethode' value='2'> 
                        <label for='2'>AmazonPay</label></button><br>");                             //value 2 = AmazonPay
                ?>
            </div>

            <div>
                <table>
                    <?php
                        if(file_exists('winkelwagen.json')) {
                            foreach($aWinkelwagen as $iKey => $aContentArray){
                                echo("€".($aContentArray[2]*$aContentArray[1]));
                            }
                            echo("Betalingsmethode:<br>"
                                ."€".$iTotaal);
                        }
                        else {
                            echo("Betalingsmethode:<br>"
                            ."€".$iTotaal);
                        }
                    ?>
                </table>
            </div>
        </div>
        <form method="POST">
            <input type="number">
        </form>
    </div>
    
</body>

</html>