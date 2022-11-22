<h1>Список статей</h1>
<ol>
    <?php
    foreach ($posts as $post) {
        echo '<li>' . $post->title . '</li>';
        echo '<p>' . $post->text . '</p>';
    }
    ?>
</ol>
