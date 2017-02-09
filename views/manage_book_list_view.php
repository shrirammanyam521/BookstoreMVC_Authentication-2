<?php
$hasBooks = isset($books);
$hasPublishers = isset($publishers);
if ($hasBooks === false || $hasPublishers === false) {
    echo '<h1>views/book_list_view.php needs $books</h1>';
    exit();
}
?>

<h1>Managing Your Book</h1>
<div id="sidebar">
    <h2>Publishers</h2>
    <?php foreach ($publishers as $publisher2) : ?>
        <ul>
            <li>
                <a href="?controller=admin&publisher_id=<?php echo $publisher2->getID(); ?>">
                    <?php echo $publisher2->getName(); ?>
                </a>
            </li>
        </ul>
    <?php endforeach; ?>
</div>
<div id="main">
    <h2><?php echo $publisher->getName(); ?></h2>
    <table>
        <tr>
            <th>ISBN</th>
            <th>Book Title</th>
            <th>Book Price</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($books as $book) : ?>
            <tr>
                <td><?php echo $book->getISBN(); ?></td>
                <td><?php echo $book->getTitle(); ?></td>
                <td><?php echo $book->getPrice(); ?></td>
                <td>
                    <form action="?controller=admin&action=delete_book" method="post">
                        <input type="hidden" name="book_id" 
                               value="<?php echo $book->getID(); ?>" />
                        <input type="hidden" name="publisher_id" 
                               value="<?php echo $publisher_id; ?>" />
                        <input type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="?controller=admin&action=add_book">Add Product</a></p>
</div>