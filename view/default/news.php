<html>
<head>
    <title>Новости</title>
</head>
<body>
    <section>
        <a href="../">НАЗАД</a>
        <ul>
        <?php
        foreach ($news as $new) {
            echo "<li><a href='" . $new['link'] . "'>" . $new['name'] . "</a></li>";
        }
        ?>
        </ul>
    </section>
</body>
</html>