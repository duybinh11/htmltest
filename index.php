<!doctype html>
<html>
//11111

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="app.css">
    <title>Tạo menu đa cấp với CSS</title>
</head>

<body>
    <ul class="main-navigation">
        <?php
        include 'data.php';
        foreach ($dc as $item) {
            if ($item['level'] == 0) {
                echo '<li><a href="#">' . $item['title'] . '</a>';
                echo '<ul>';
                foreach ($dc as $child) {
                    if ($child['id_parent'] == $item['id']) {
                        echo '<li><a href="#">' . $child['title'] . '</a>';
                        echo '<ul>';
                        foreach ($dc as $grandchild) {
                            if ($grandchild['id_parent'] == $child['id']) {
                                echo '<li><a href="#">' . $grandchild['title'] . '</a></li>';
                            }
                        }
                        echo '</ul>';
                        echo '</li>';
                    }
                }
                echo '</ul>';
                echo '</li>';
            }
        }
        ?>
        <li><a href="#">B</a></li>
    </ul>
</body>

</html>