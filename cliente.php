<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(to bottom right, #f4f4f4, #999594);
            text-align: center;
        }

        h1 {
            color: #333;
        }

        #users-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .user-card {
            width: 300px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 20px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .user-card:hover {
            transform: scale(1.05);
        }

        h2 {
            margin-bottom: 10px;
            color: #333;
        }

        p {
            margin: 5px 0;
            color: #666;
            font-size: 14px;
            line-height: 1.5;
            letter-spacing: 0.05em;
            font-weight: bold;
        }

        .user-title {
            color: #007BFF;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <h1>Lista de Usuarios en JSONPlaceholder</h1>
    <hr>
    <div id="users-container">
        <?php
        /**
         * Obtiene la lista de usuarios desde la API JSONPlaceholder.
         *
         * @return array Retorna un array con la lista de usuarios.
         */
        $usersJson = file_get_contents('https://jsonplaceholder.typicode.com/users');
        $users = json_decode($usersJson, true);
        /**
         * Muestra la tarjeta de un usuario en formato HTML.
         *
         * @param array $usuario Un array con los datos del usuario.
         * @return string Retorna una cadena HTML con la tarjeta del usuario.
         */
        foreach ($users as $user) {
            echo "<div class='user-card'>";
            echo "<h2>{$user['name']}</h2>";
            echo "<p>Usuario:{$user['username']}</p>";
            echo "<p>Email:{$user['email']}</p>";
            echo "<p>Dirección:{$user['address']['street']}, {$user['address']['suite']}, {$user['address']['city']}, {$user['address']['zipcode']}</p>";
            echo "<p>Telefono:{$user['phone']}</p>";
            echo "<p>Sitio web:{$user['website']}</p>";
            echo "</div>";
        }
        ?>
    </div>

</body>

</html>