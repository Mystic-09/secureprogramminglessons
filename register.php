<?php
session_start();
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $passwordcheck = $_POST['passwordcheck'];

    // Controleer of wachtwoorden gelijk zijn
    if ($password != $passwordcheck) {
        $error = "De wachtwoorden komen niet overeen";
    }

    // Controleer sterkte van het wachtwoord
    if (
        !isset($error) &&
        (
            strlen($password) < 8 ||
            !preg_match('/[A-Z]/', $password) ||
            !preg_match('/[a-z]/', $password) ||
            !preg_match('/[0-9]/', $password)
        )
    ) {
        $error = "Wachtwoord moet minimaal 8 tekens bevatten, inclusief een hoofdletter, kleine letter en cijfer.";
    }

    // Als er geen fouten zijn, ga verder
    if (!isset($error)) {

        // Controleer of gebruikersnaam al bestaat
        $stmt = $pdo->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->execute([$username]);

        if ($stmt->rowCount() > 0) {
            $error = "Deze gebruikersnaam is al in gebruik";
        } else {

            // Hash het wachtwoord
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Voeg gebruiker toe
            $stmt = $pdo->prepare(
                "INSERT INTO user (username, password, balance, isAdmin)
                 VALUES (?, ?, 100, 0)"
            );

            $stmt->execute([$username, $hashedPassword]);

            $success = "Je account is aangemaakt, je kunt nu inloggen";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omanido - registreren</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<?php include 'includes/header.php'; ?>

<div class="container mx-auto mt-20 p-6 bg-white max-w-sm shadow-md rounded-md">

    <div class="flex justify-center">
        <img src="img/Omanido1.png" alt="Omanido Logo" class="mb-6 w-1/2">
    </div>

    <h2 class="text-lg text-center font-bold mb-6">
        Registreren bij Omanido
    </h2>

    <?php if (isset($error)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong>Fout!</strong>
            <span><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></span>
        </div>
    <?php endif; ?>

    <?php if (isset($success)): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <strong>Gelukt!</strong>
            <span><?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?></span>
        </div>
    <?php endif; ?>

    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">

        <div class="mb-4">
            <label for="username" class="block text-sm font-medium text-gray-700">
                Gebruikersnaam:
            </label>

            <input
                type="text"
                id="username"
                name="username"
                required
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
        </div>

        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700">
                Wachtwoord:
            </label>

            <input
                type="password"
                id="password"
                name="password"
                required
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
        </div>

        <div class="mb-6">
            <label for="passwordcheck" class="block text-sm font-medium text-gray-700">
                Herhaal wachtwoord:
            </label>

            <input
                type="password"
                id="passwordcheck"
                name="passwordcheck"
                required
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
        </div>

        <div class="flex justify-center">
            <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Registreren
            </button>
        </div>

    </form>

</div>

</body>
</html>