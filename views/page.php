<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $pageData->title; ?></title>
        <meta http-equiv='Content-Type' content='text/html;charset=utf-8'/>
        <?php echo $pageData->css; ?>
        <?php echo $pageData->embeddedStyle ?>
    </head>
    <body>
        <?php echo $pageData->navigation; ?>
        <?php include_once "$pageData->content"; ?>
        <?php echo $pageData->scriptElements; ?>
    </body>
</html>