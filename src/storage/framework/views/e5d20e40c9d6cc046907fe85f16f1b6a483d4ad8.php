   
   <?php $__env->startSection('css'); ?>
   <link rel="stylesheet" href="<?php echo e(asset('css/contact.css')); ?>">
   <?php $__env->stopSection(); ?>

   <?php $__env->startSection('content'); ?>
   <div class="confirm-form">
    <div class="confirm-title">
        <h2>Confirm</h2>
    </div>
    <form class="confirm-table" method="POST" action="<?php echo e(route('contact.submit')); ?>">
        <?php echo csrf_field(); ?>
        <?php $__currentLoopData = $validated; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($value); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <table class="confirm-content">
                <tr class="confirm-item">
                    <th class="confirm-header">
                    お名前
                </th>
                <td class="confirm-content__item"><?php echo e($validated['first_name']); ?><?php echo e($validated['last_name']); ?></td>
                </tr>
                <tr class="confirm-item">
                    <th class="confirm-header">
                    性別
                </th>
                <td class="confirm-content__item">
                    <?php if($validated['gender']=='male'): ?>男性
                    <?php elseif($validated['gender']=='female'): ?>女性
                    <?php else: ?> その他
                    <?php endif; ?>
                </td>
                </tr>
                <tr class="confirm-item">
                    <th class="confirm-header">
                    メールアドレス
                </th>
                <td class="confirm-content__item"><?php echo e($validated['email']); ?></td>
                </tr>
                <tr class="confirm-item">
                    <th class="confirm-header">
                    電話番号
                </th>
                <td class="confirm-content__item"><?php echo e($validated['tel1']); ?><?php echo e($validated['tel2']); ?><?php echo e($validated['tel3']); ?></td>
                </tr>
                <tr class="confirm-item">
                    <th class="confirm-header">
                    住所
                </th>
                <td class="confirm-content__item"><?php echo e($validated['address']); ?></td>
                </tr>
                <tr class="confirm-item">
                    <th class="confirm-header">
                    建物名
                </th>
                <td class="confirm-content__item"><?php echo e($validated['building']); ?></td>
                </tr>
                <tr class="confirm-item">
                    <th class="confirm-header">
                    お問い合わせの種類
                </th>
                <td class="confirm-content__item"><?php echo e($validated['department']); ?></td>
                </tr>
                <tr class="confirm-item">
                    <th class="confirm-header">
                    お問い合わせ内容
                </th>
                <td class="confirm-content__item"><?php echo e($validated['message']); ?></td>
                </tr>
                </div>
            </table>
            <div class="confirm-submit">
                <button type="submit" class="confirm-button">送信</button>
                <a class="cancel-button" href="<?php echo e(route('contact.index')); ?>">修正</a>
            </div>
        </form>
   <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maplesama/coachtech/laravel/Contact-form/src/resources/views/contact/confirm.blade.php ENDPATH**/ ?>