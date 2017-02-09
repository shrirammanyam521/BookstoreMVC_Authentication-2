<?php
$hasBook = isset($book);
$hasPublishers = isset($publishers);
if ($hasBook === false || $hasPublishers === false) {
    echo '<h1>views/book_list_view.php needs $book</h1>';
    exit();
}
?>

<h1>Searching Your Book</h1>
<div id="sidebar">
    <h1>Publishers</h1>
    <ul class="nav">
        <!-- display links for all publishers -->
        <?php foreach ($publishers as $publisher) : ?>
            <li>
                <a href="?publisher_id=<?php echo $publisher->getID(); ?>">
                    <?php echo $publisher->getName(); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="main">
    <h1><?php echo $book->getTitle(); ?></h1>
    <div id="left_column">
        <p>
            <img src="<?php echo $book->getImagePath(); ?>"
                 alt="<?php echo $book->getImageAltText(); ?>" />
        </p>
    </div>

    <div id="right_column">
        <p><b>List Price:</b> $<?php echo $book->getFormattedPrice(); ?></p>
        <p><b>Discount:</b> <?php echo $book->getDiscountedPercentage(); ?>%</p>
        <p><b>Your Price:</b> $<?php echo $book->getDiscountPrice(); ?>
            (You save $<?php echo $book->getDiscountAmount(); ?>)</p>
        <form action="<?php echo '../cart' ?>" method="post">
            <input type="hidden" name="action" value="add" />
            <input type="hidden" name="book_id"
                   value="<?php echo $book->getID(); ?>" />
            <b>Quantity:</b>
            <input id="quantity" type="text" name="quantity" value="1" size="2" />
            <br /><br />
            <input type="submit" value="Add to Cart" />
        </form>
    </div>
</div>