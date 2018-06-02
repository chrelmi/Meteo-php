<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table,td,th
            {
                    border:3px solid #eee;
                    border-collapse:collapse;
                    padding:3px 5px;
                    font-family:verdana;
                    
            }
            tr.col td
            {
                background-color:#D5E4FF;
            }
            h1 
            {
                color: #d26c22;
                font-family: arial, sans-serif;
                font-size: 35px;
                font-weight: bold;
                margin-top: 0px;
                margin-bottom: 1px;
            }
        </style>
    </head>
    <body>
        
        <?php
        $citta=$_POST['citta'];
        echo "<h1>Meteo di $citta</h1>";
        $ur="http://api.openweathermap.org/data/2.5/weather?appid=39411ec0a72cb5c7b070e9da15555979&q=";
        $url=$ur.$citta;
        $getw= file_get_contents($url);
        $output=json_decode($getw);
        $temp_max=$output->main->temp_max;
        $humidity=$output->main->humidity;
        $pressure=$output->main->pressure;
        $wind=$output->wind->speed;
        $description=$output->weather[0]->description;
        $temp_max=$temp_max-273.15;
        //echo "temp max: ".$temp_max."<br>"."humidity: ".$humidity." %<br>"."pressure: ".$pressure." hpa<br>"."wind: ".$wind." m/s<br>"."description: ".$description."<br>";        
        echo "<br>";
        echo "<table><tr class='col'><td>Temperatura</td><td>$temp_max °C</td></tr><tr><td>Umidità</td><td>$humidity %</td></tr><tr class='col'><td>Pressione</td><td>$pressure hpa</td></tr><tr><td>Vento</td><td>$wind m/s</td></tr><tr class='col'><td>Condizione meteo</td><td>$description</td></tr></table>"
        ?>
        <br><input type="button" value="home" onclick="location.href='index.html'">
    </body>
</html>


