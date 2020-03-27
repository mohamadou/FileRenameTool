<?php

include __DIR__.'/iterateFile.php';

$iterateFile = new IterateFile(dirname(__FILE__).'/../tmp');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        img{
            width: 150px;
        }
    </style>
</head>
<body>
<div class="container">
<table class="table table-bordered table-hover table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom image</th>
        <th scope="col">Lien</th>
        <th scope="col">Photo</th>
    </tr>
    </thead>
    <tbody>
        <?php
        foreach ($iterateFile->getFiles() as $k => $file){
            $html = "<tr><td>";
            $html .= $k+1;
            $html .= "</td><td>";
            $html .=  $file['fileName'];
            $html .="</td><td>";
            $html .= "<a href='https://magneelectromenager.com/tmp/";
            $html .= $file['filePath']."'>";
            $html .= "https://magneelectromenager.com/tmp/".$file['filePath'];
            $html .= "</a>";
            $html .="</td><td>";
            $html .= "<img src='";
            $html .= $file['imgPath'];
            $html .= "'/>";
            $html .="</td></tr>";
            echo $html;
        }
        ?>
    </tbody>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>