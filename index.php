<?php
session_start();

// Připojení k databázi přes db.php
require_once 'db.php';

// Získání aktuální stránky z URL, výchozí je "home"
$page = $_GET["page"] ?? "home";

// Pokud se jedná o POST požadavek na stránce zájmů, zpracujeme jej před výstupem HTML (pro PRG)
if ($page === 'interests' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'pages/interests.php';
    exit;
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Profil 7.0 - Viktor Horák</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Hlavní navigace -->
        <nav class="main-nav">
          <a href="?page=home" class="<?php echo $page === 'home' ? 'active' : ''; ?>">Domů</a>
          <a href="?page=interests" class="<?php echo $page === 'interests' ? 'active' : ''; ?>">Zájmy</a>
          <a href="?page=skills" class="<?php echo $page === 'skills' ? 'active' : ''; ?>">Dovednosti</a>
        </nav>

        <main>
            <?php
            // Jednoduchý routing přepínačem
            switch ($page) {
                case "home":
                    require "pages/home.php";
                    break;
                case "interests":
                    require "pages/interests.php";
                    break;
                case "skills":
                    require "pages/skills.php";
                    break;
                default:
                    require "pages/not_found.php";
                    break;
            }
            ?>
        </main>
    </div>
</body>
</html>
