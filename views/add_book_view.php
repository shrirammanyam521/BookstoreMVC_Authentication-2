<?php
$hasPublishers = isset($publishers);
if ($hasPublishers === false) {
    echo '<h1>views/add_book_view.php needs $publishers</h1>';
    exit();
}
?>

<h1>Add Book Page</h1>
<div id="main">
    <form action="?controller=admin&action=add_book" method="post">
        <input type="hidden" name="action" value="add_book" />

        <label>Publisher:</label>
        <select name="publisher_id">
            <?php foreach ($publishers as $publisher) : ?>
                <option value="<?php echo $publisher->getID(); ?>">
                    <?php echo $publisher->getName(); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <label>ISBN:</label>
        <input type=text" name="isbn" /> 
        <br />
        <label>Title:</label>
        <input type=text" name="book_title" /> 
        <br />
        <label>Price:</label>
        <input type=text" name="book_price" /> 
        <br />
        <label>&nbsp;</label>
        <input type="submit" value="Add Book" name="addbook_submitted" /> 
        <br />
    </form>
</div>