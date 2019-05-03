<!DOCTYPE html>
<head>
    <title><?= $app['name'] ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= \core\router\generate('books') ?>">
                <i id="my-icon" class="fas fa-book-open"></i><?= $app['name'] ?></a>
            <div class="input-group" id="select-tag">
                <form action="<?= \core\router\generate('search_by_tags') ?>" method="get" class="form-inline">
                    <select required class="custom-select" id="inputGroupSelect04"
                            aria-label="Example select with button addon"
                            name="search-tag">
                        <option selected disabled value="">Select a tag</option>
                        <?php
                        global $app;
                        $STH = $app['db']->query("SELECT * FROM tags");
                        $STH->setFetchMode(PDO::FETCH_ASSOC);
                        $tags = [];
                        while ($row = $STH->fetch()) {
                            $tags[] = ['id' => $row['id'], 'tag' => $row['tag']];
                        }
                        foreach ($tags as $tag) : ?>
                            <option value=<?= $tag['id'] ?>><?= $tag['tag'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-info" type="submit" id="choose">Find</button>
                    </div>
                </form>
                <form action="<?= \core\router\generate('search_by_word') ?>" class="form-inline" method="get">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"
                           name="search"
                           id="search" required>
                    <button class="btn btn-info" type="submit">Search</button>
                </form>
            </div>
        </div>

    </nav>
</header>
<div class="container">
    <?= $content ?>
</div>
<footer class="footer" id="my-footer">
    <div class="container">
        <p class="text-muted">© <?= date_format(date_create(), 'Y') ?> Company, Inc.</p>
    </div>
</footer>
</body>
</html>