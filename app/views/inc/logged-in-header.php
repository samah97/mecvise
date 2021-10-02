<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="/Mecvise/">
        <link rel="stylesheet" href="css/main.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
              integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="css/mainBlackNav.css">
        <link rel="stylesheet" href="css/whiteNav.css">
        <title>Discussions</title>
        <?php if (isset($data['addGoogleAds'])){
            require APPROOT . '/views/inc/google-ads.php';
        }
        ?>
    </head>
</head>