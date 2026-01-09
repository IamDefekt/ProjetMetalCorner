<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Dashboard</title>
    <link rel="stylesheet" href="/style/admin.css">
</head>
<body>

    <?php include __DIR__ . '/components/navbar.php'; ?>

    <main class="admin-container">

        <?php include __DIR__ . '/components/sidebar.php'; ?>

        <div class="admin-content">
            <h1>Dashboard</h1>

            <section class="stats">
                <div class="card">
                    <h2>Concerts</h2>
                    <p>42</p>
                </div>

                <div class="card">
                    <h2>Articles</h2>
                    <p>12</p>
                </div>

                <div class="card">
                    <h2>Propositions</h2>
                    <p>5 en attente</p>
                </div>
            </section>
        </div>

    </main>

    <?php include __DIR__ . '/components/footer.php'; ?>

</body>
</html>
