<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test</title>

    <!-- Deshabilitar realce en toque en IE  -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Manifiesto de aplicación web -->
    <!--link rel="manifest" href="manifest.json"-->

    <!-- Añadir a la pantalla de inicio de Chrome en Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Web Starter Kit">
    <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon-192x192.png">

    <!-- Añadir a la pantalla de inicio de Safari en iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Web Starter Kit">
    <link rel="apple-touch-icon" href="images/touch/apple-touch-icon.png">

    <!--Icono de mosaico para Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#2F3BA2">

    <!-- Colorea la barra de estado en dispositivos móviles -->
    <meta name="theme-color" content="#2F3BA2">
    <?php
    $booster->css_source  = array(
      '../../app/styles/main.css');
    echo $booster->css_markup();
    ?>
  </head>
  <body>
    <header>
      <img src="app/images/logo.png" alt="Logo">
    </header>
