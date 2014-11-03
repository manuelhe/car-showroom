<?php
//Index site template
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $config['siteTitle'];?></title>
        <meta name="description" value="<?php echo $config['siteIntro'];?>">
        <link rel="stylesheet" href="/styles/css/all.css"/>
    </head>
    <body>
        <header>
            <h1><?php echo $config['siteTitle'];?></h1>
            <p><?php echo $config['siteIntro'];?></p>
        </header>
    </body>
</html>