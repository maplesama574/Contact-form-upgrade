<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <?php echo $__env->yieldContent('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/sanitize.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/common.css')); ?>">
    </head>

<body>
    <header class="header">
        <div class="header-item">
            <a class="header-logo" href="/">FashionablyLate</a>
            <?php echo $__env->yieldContent('login'); ?>
        </div>
    </header>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</body>

</html><?php /**PATH /var/www/resources/views/layouts/app.blade.php ENDPATH**/ ?>