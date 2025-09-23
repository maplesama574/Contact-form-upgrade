   
   <?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>?v=<?php echo e(time()); ?>">

<?php $__env->stopSection(); ?>

    
   <?php $__env->startSection('login'); ?>
    <a class="header-login" href="<?php echo e(route('login')); ?>">login</a>
   <?php $__env->stopSection(); ?>

   <?php $__env->startSection('content'); ?>
    <div class="admin-form">
            <div class="admin">
                    <div class="admin-title">
                         <h2>Admin</h2>
                    </div>
                    <div class="admin-content">
<!--コンテンツ-->
                        <div class="search-box">
                            <form class="search-form" action="<?php echo e(route('admin.dashboard')); ?>" method="GET">
                                <input class="search-text" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
                                <select class="search-gender" name="gender" id="gender">
                                    <option class="search-gender--option" value="" disabled selected>性別</option>              <option class="search-gender--option" value="全て">全て</option>
                                    <option class="search-gender--option" value="男性">男性</option>
                                    <option class="search-gender--option" value="女性">女性</option>
                                    <option class="search-gender--option" value="その他">その他</option>
                                </select>
                                <select class="search-department" name="department" id="department">
                                    <option class="search-department--option" value="" disabled selected>お問い合わせの種類</option>
                                    <option class="search-department--option" value="1.商品のお届けについて">1.商品のお届けについて</option>
                                    <option class="search-department--option" value="2.商品の交換について">2.商品の交換について</option>
                                    <option class="search-department--option" value="3.商品トラブル">3.商品トラブル</option>
                                    <option class="search-department--option" value="4.ショップへのお問い合わせ">4.ショップへのお問い合わせ</option>
                                    <option class="search-department--option" value="5.その他">5.その他</option>
                                </select>
<!--あとで消すかも↓-->
                                <?php
                                    $today = date('y-m-d');
                                ?>
                                <input class="search-date" type="date" name="date" id="date" value="<?php echo e($today); ?>">
                                </input>
                                <button class="submit-button">検索</button>
                                <a class="reset-button" href="<?php echo e(route('admin.dashboard')); ?>">リセット</a>
                            </form>
                        </div>

                        <div class="form-ex">
                        <div class="export">
                            <form action="<?php echo e(route('admin.export')); ?>" method="GET">
                                <input type="hidden" name="name" value="<?php echo e(request('name')); ?>">
                                <input type="hidden" name="email" value="<?php echo e(request('email')); ?>">
                                <input type="hidden" name="gender" value="<?php echo e(request('gender')); ?>">
                                <input type="hidden" name="department" value="<?php echo e(request('department')); ?>">

                            <button class="export-button">エクスポート</button>
                            </form>
                        </div>
<!--何個あるのか-->
                        <div class="pagination">
                            <?php echo e($contacts->appends(request()->query())->links('pagination::bootstrap-4')); ?>

                        </div>
                    </div>
                    </div>
<!--お問い合わせテーブル-->
                    <div class="admin-table">
                        <table class="admin-table-content">
                            <tr class="admin-table-header">
                                <th class="admin-table-header__detail">お名前</th>
                                <th class="admin-table-header__detail">性別</th>
                                <th class="admin-table-header__detail">メールアドレス</th>
                                <th class="admin-table-header__detail">お問い合わせの種類</th>
                                <th class="admin-table-header__detail"></th>
                            </tr>
                            <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="admin-table-item">
                                <td><?php echo e($contact->name); ?></td>
                                <td><?php echo e($contact->gender); ?></td>
                                <td><?php echo e($contact->email); ?></td>
                                <td class="message-cell">
                                    <?php

                                    $departments=[
                                        1=>'商品のお届けについて', 
                                        2=>'商品の交換について', 
                                        3=>'商品トラブル', 
                                        4=>'ショップへのお問い合わせ', 
                                        5=>'その他'];
                                        $number=(int)$contact->department;
                                        $text=$departments[$number] ?? '未分類';
                                    ?>

                                    <?php echo e($number); ?>.<?php echo e($text); ?>

                                </td>
                                    <!--詳細ページ-->
                                <td>
                                    <a class="admin-table-item__detail" href="#detail-<?php echo e($contact->id); ?>" data-id="<?php echo e($contact->id); ?>">詳細</a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
            </div>
    </div>

<!--モーダル　詳細の中身-->
    <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div id="detail-<?php echo e($contact->id); ?>" class="detail">
        <div class="detail-content">
            <a href="#" class="cancel-button">&times;</a>
        <table class="detail-table">
            <tr>
                <th>お名前</th>
                <td><?php echo e($contact->name); ?></td>
            </tr>
            <tr>
                <th>性別</th>
                <td><?php echo e($contact->gender); ?></td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><?php echo e($contact->email); ?></td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td><?php echo e($contact->tel); ?></td>
            </tr>
            <tr>
                <th>住所</th>
                <td><?php echo e($contact->address); ?></td>
            </tr>
            <tr>
                <th>建物名</th>
                <td><?php echo e($contact->building); ?></td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td><?php echo e($contact->department); ?></td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td><?php echo nl2br(e($contact->message)); ?></td>

            </tr>
        </table>
        <form method="POST" action="<?php echo e(route('admin.contacts.destroy', $contact->id)); ?>" class="delete">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
        <button type="submit" class="delete-button">削除</button>
        </form>
    </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>