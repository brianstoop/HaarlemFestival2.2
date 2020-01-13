<?php 
    use App\Config;

    /*require dirname(__DIR__) . '\header.html'*/

    if (!isset($_SESSION)) {
    session_start();
    }
      
    $_SESSION['return_to'] = $_SERVER['REDIRECT_URL'];
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo Config::URLROOT; ?>/css/jazz/jazzstyle.css">
    <link rel="stylesheet" href="<?php echo Config::URLROOT; ?>/css/Default/Navigation.css">
    <title>Haarlem Festival Homepage</title>
</head>

<body id="jazzPage" class="">
    <div class="logo">
        <img src="<?php echo Config::URLROOT; ?>/img/jazz/haarlem-logo-png-transparent.png" alt="Logo Haarlem" width="180" height="150">   
    </div>

    <?php include(dirname(dirname(__FILE__)) . "/Default/navigation.html")?>

    <div class="background">
        <img src="<?php echo Config::URLROOT; ?>/img/jazz/gumbokings.jpg" alt="Gumbo Kings">
    </div>

    <div class="backgroundText">
        <p class="jazzText">Haarlem Festival has invited some of the best jazz artists for a very special event. 
        On Thursday, Friday and Saturday Patronaat will host the jazz event. On Sunday there will be a free concert on near De Grote Kerk
        </p>
        <a class="arrowDown" href=>&#187;</a>
    </div>

    <div class="tab">
    <button class="active"><a>Line Up</a></button>
    <?php echo("<button class=tabLinks onclick=window.location.href='" . Config::URLROOT . "/jazz/Thursday'><a>Tickets</a></button>");?>
    </div>

    <div class=dayLineup>
        

        <?php
        foreach($dates as $date){

            echo("<div class='dayRow'>");
            
            $dayName = date_format($date->Date, "l");
            echo ("<div class='dayName'>$dayName</div><div class='fill'></div>");

            foreach($jazzArtists as $jazzArtist){

                if($jazzArtist->DateID == $date->DateID){
                    echo ("
                        <div class='dayArtist'>
                                    <img class='img-fluid' src=" . Config::URLROOT . "/img/jazz/jazzLineup/$jazzArtist->Image>
                                    <div class='artist'>
                                        <a class='artistName'>$jazzArtist->Name<a class='artistTime'>$jazzArtist->StartTime</a>
                                    </div><div class='dayFill'>
                        </div></div>
                    ");
                }
            } 
            echo("</div>");
        }

        
        ?>
    </div>

