<?php

$host = "webdev.iyaclasses.com";
$userid = "ebird_JimJobBob";
$userpw = "Treesap3#";
$db = "ebird_WITS1";

$mysql = new mysqli(
    $host,
    $userid,
    $userpw,
    $db
);

if($mysql -> errno){
    echo "DB Connection Error <br>";
    echo $mysql -> connect_error;
    exit();
}
if(empty($_REQUEST["search"])){
    header("Location: http://webdev.iyaclasses.com/~ebird/WITS/WITS-frontpage.php");
}
$sql = "SELECT toolName, location, material FROM allTools WHERE toolName like '%".$_REQUEST["search"]."%'";
$results = $mysql -> query($sql);

if(!$results){
    echo "DB Query Problem <hr>";
    echo $mysql -> error;
    exit();
}




?>
<html>
<head>
    <link href="https://fonts.cdnfonts.com/css/stretch-pro" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet'>

    <title>WITSResults</title>
</head>

<style>
    * {
        margin: 0px;
        padding: 0px;
    }

    #outercontainer {
        background-color: #202020;
        height: 3500px;
        font-family: 'Lora';
    }

    #bgimage {
        height: 1194px;
        position: absolute;
        opacity: 80%;
    }

    @font-face {
        font-family: 'Stretch Pro';

    }

    #navbar {
        height: 150px;
        font-family: 'Stretch Pro';
        font-size: 16px;
        color: #F0F0F0;
        position: absolute;
        margin-top: 30px;
        margin-left: 1100px;
        word-spacing: 40px;
    }

    #middletext {
        font-family: 'Stretch Pro';
        font-size: 80px;
        color: #F0F0F0;
        position: absolute;
        text-align: center;
        margin-top: 430px;
        margin-left: 300px;
    }

    #logoimage {
        position: absolute;
        width: 250px;
        float: left;
    }

    #searchicon {
        position: absolute;
        width: 35px;
        float: right;
        margin-left: 1725px;
        margin-top: 20px;
    }
    #searchbar {
        position: absolute;
        margin-left: 500px;
        margin-top: 630px;
    }

    #quote {
        position: absolute;
        color: #F0F0F0;
        font-size: 20px;
        margin-left: 350px;
        text-align: center;
        margin-top: 930px;
    }

    #yourresultsfor {
        position: absolute;
        margin-top: 250px;
        text-align: center;
        margin-left: 620px;
        font-family: 'Stretch Pro';
        font-size: 30px;
        color: #F0F0F0;
    }

    #toolbox {
        width: 1371px;
        height: 750px;
        left: 08%;
        top: 393px;
        /*border: 1px solid #000000;*/
        position: absolute;
        flex-direction: column;
        justify-content: center;
        flex-wrap: wrap;

    }

    #tooltitle {
        font-size: 40px;
        color: #F0F0F0;
        padding: 5px;
        position: relative;
        margin-left: 20%;
        margin-top: 5%;

    }

    #tooldescription {
        font-size: 20px;
        color: #F0F0F0;
        padding: 25px;
        position: relative;
        margin: auto;

    }

    #toolimage {
        position: relative;
        width: 380px;
        height: 500px;
        background: #5B5B5B;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 20px;
        margin: 30px;
        float: right;

    }

    #notwhatyouwere {
        position: absolute;
        width: 1198px;
        height: 49px;
        left: 170px;
        top: 920px;
        font-family: 'Lora';
        font-style: normal;
        font-weight: 400;
        font-size: 25px;
        line-height: 32px;
        text-align: center;
        color: #FFCC00;
    }

    #toolimage2 {
        position: absolute;
        margin-top: 1400px;
        margin-right: 50px;
        float: left;
        width: 400px;
    }

    #ineed {
        position: absolute;
        width: 300px;
        height: 40px;
        left: 171px;
        top: 1481px;
        font-family: 'Stretch Pro';
        font-style: normal;
        font-weight: 400;
        font-size: 40px;
        line-height: 40px;
        color: #F0F0F0;
    }

    #material {
        position: absolute;
        width: 450px;
        height: 40px;
        left: 168px;
        top: 1742px;
        font-family: 'Stretch Pro';
        font-style: normal;
        font-weight: 400;
        font-size: 40px;
        line-height: 40px;
        color: #F0F0F0;
    }

    #process {
        position: absolute;
        width: 363px;
        height: 49px;
        left: 168px;
        top: 2006px;
        font-family: 'Stretch Pro';
        font-style: normal;
        font-weight: 400;
        font-size: 40px;
        line-height: 40px;
        text-align: center;
        color: #F0F0F0;
    }

    #location {
        position: absolute;
        width: 388px;
        height: 49px;
        left: 159px;
        top: 2272px;
        font-family: 'Stretch Pro';
        font-style: normal;
        font-weight: 400;
        font-size: 40px;
        line-height: 40px;
        text-align: center;
        color: #F0F0F0;
    }

    #buttonbox {
        display: flex;
        box-sizing: border-box;
        position: absolute;
        width: 477px;
        height: 162px;
        left: 155px;
        top: 1529px;
        border: 1px solid #000000;
    }

    #describebuttons {
        box-sizing: border-box;
        width: 212px;
        height: 54px;
        border: 3px solid #F0F0F0;
        filter: drop-shadow(0px 4px 4px #000000);
        border-radius: 15px;
    }

    #searchresult {
        position: absolute;
        margin-top: 290px;
        color: #FFCC00;
        margin-left: 710px;
        font-size: 50px;
    }

    #rect {
        position: absolute;
        width: 100%;
        height: 229px;
        left: 0px;
        top: 0px;
        background: linear-gradient(180deg, #000000 0%, rgba(0, 0, 0, 0) 95.14%);
    }

    #rect2 {
        position: absolute;
        width: 100%;
        height: 229px;
        left: 0px;
        top: 1000px;
        background: linear-gradient(180deg, #000000 0%, rgba(0, 0, 0, 0) 95.14%);
        transform: rotate(-180deg);
    }

    #rect3 {
        position: absolute;
        width: 831px;
        height: 1634px;
        left: 781px;
        top: 1484px;
        background: linear-gradient(180deg, #5B5B5B 13.53%, rgba(91, 91, 91, 0) 108.48%);
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
        border-radius: 10px;
    }

    hr {
        color: #FFCC00;
    }


</style>


<body>

<div id="outercontainer">
    <div id="rect"></div>
    <div id="rect2"></div>

    <img id="logoimage" src="witslogo.png">
    <img id="searchicon" src="search.svg">
    <div id="navbar">
        account edit contact catalog search
    </div>
    <div id="yourresultsfor"> YOUR RESSULTS FFOR...</div>
    <div id="searchresult">" <?php echo $_REQUEST["search"]?> "</div>

    <div id="toolbox">
        <?php
        while($currentRow = mysqli_fetch_array($results)){
            echo "<div id='toolimage'><div id='tooltitle'>".$currentRow["toolName"]."</div>
                    <div id='tooldescription'> Location: ".$currentRow["location"]."<br>Material: ".$currentRow["material"]."</div></div>";
        }
        ?>
        <div id="notwhatyouwere"> Not what you were looking for? Check our catalog for a more detailed search!</div>
    </div>
    <hr>
    <br><br>

    <div id="ineed">I NEEED</div>
    <div id="material">MATEERIAL</div>
    <div id="process">PRROCESS</div>
    <div id="location">LOCCATION</div>
    <div id="rect3"></div>
</div>
</body>

</html>
