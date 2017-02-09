<?php
$hasBooks = isset($books);
$hasPublishers = isset($publishers);
if ($hasBooks === false || $hasPublishers === false) {
    echo '<h1>views/book_list_view.php needs $books</h1>';
    exit();
}
?>

<h1>Searching Your Book</h1>
<div id="sidebar">
    <h2>Publishers</h2>
    <?php foreach ($publishers as $publisher2) : ?>
        <ul>
            <li>
                <a href="?controller=guest&publisher_id=<?php echo $publisher2->getID(); ?>">
                    <?php echo $publisher2->getName(); ?>
                </a>
            </li>
        </ul>
    <?php endforeach; ?>
</div>
<div id="main">
    <h2><?php echo $publisher->getName(); ?></h2>
    <ul class="nav">
        <?php foreach ($books as $book) : ?>
            <li>
                <a href="?controller=guest&action=view_book&book_id=<?php echo $book->getID(); ?>">
                    <?php echo $book->getTitle(); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>