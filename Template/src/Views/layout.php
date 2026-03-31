<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tomodachi Life Manager</title>
    <link rel="stylesheet" href="/css/style.css"> 
    <style>
        body { font-family: sans-serif; background: #f4f4f4; padding: 20px; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        nav { margin-bottom: 20px; padding: 10px; background: #333; color: white; border-radius: 5px; }
        nav a { color: white; text-decoration: none; margin-right: 15px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input, select { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
    </style>
</head>
<body>

    <nav>
        <a href="/">🏠 Immeuble</a>
    </nav>

    <main class="container">
        <?= $content ?>
    </main>

    <footer style="text-align: center; margin-top: 20px; color: #888;">
        <p>&copy; 2026 - Tomodachi</p>
    </footer>

</body>
</html>