   
   <?php $__env->startSection('css'); ?>
   <link rel="stylesheet" href="<?php echo e(asset('css/contact.css')); ?>">
   <?php $__env->stopSection(); ?>

   <?php $__env->startSection('content'); ?>
   <div class="contact-form">
    <div class="contact-title">
        <h2>Contact</h2>
    </div>
    <form class="contact-table" method="POST" action="<?php echo e(route('contact.confirm')); ?>">
        <?php echo csrf_field(); ?>
    <table class="contact-content">
        <tr class="contact-item">
            <th class="content-title">お名前<span class="content-title__red">※</span></th>
            <td>
                <div class="contact-content__input--wrap-name">
                <div class="contact-content__input--item">
                <input class="contact-content__input--name" type="name" name="first_name" value="<?php echo e(old('first_name')); ?>" placeholder="例:山田">
                <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="contact-form-error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="contact-content__input--item">
                <input class="contact-content__input--name" type="name" name="last_name" value="<?php echo e(old('last_name')); ?>" placeholder="例:太郎">
                <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="contact-form-error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            </td>
        </tr>
        <tr class="contact-item gender">
            <th class="content-title">性別<span class="content-title__red">※</span></th>
            <td>
                <div class="contact-content__input--gender-wrap">
                <label for="male">
                    <input type="radio" name="gender" value="male" <?php echo e(old('gender')=='male' ? 'checked' : ''); ?>>男性
                </label>
                <label for="female">
                    <input class="contact-content__input--radio" type="radio" name="gender" value="female" <?php echo e(old('gender')=='female' ? 'checked' : ''); ?>>女性
                </label>
                <label for="other">
                    <input class="contact-content__input--radio" type="radio" name="gender" value="other" <?php echo e(old('gender')=='other' ? 'checked' : ''); ?>>その他
                </label>
                </div>
                <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="contact-form-error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </td>
        </tr>
        <tr class="contact-item">
            <th class="content-title">メールアドレス<span class="content-title__red">※</span></th>
            <td>
                <div class="contact-content__input--wrap">
                <input class="contact-content__input--address" type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="例:test@example.com">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="contact-form-error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </td> 
        </tr>
        <tr class="contact-item">
            <th class="content-title">電話番号<span class="content-title__red">※</span></th>
            <td>
                <div class="contact-content__input--tel-wrap">
                <input class="contact-content__input--tel" type="tel" name="tel1" value="<?php echo e(old('tel1')); ?>" placeholder="080">
                    <span>-</span>
                <input class="contact-content__input--tel" type="tel" name="tel2" value="<?php echo e(old('tel2')); ?>" placeholder="1234">
                    <span>-</span>
                <input class="contact-content__input--tel" type="tel" name="tel3" value="<?php echo e(old('tel3')); ?>" placeholder="5678">
                </div>
                <?php $__errorArgs = ['tel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="contact-form-error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </td> 
        </tr>
        <tr class="contact-item">
            <th class="content-title">住所<span class="content-title__red">※</span></th>
            <td>
                <div class="contact-content__input--wrap">
                <input class="contact-content__input--address" type="text" name="address" value="<?php echo e(old('address')); ?>" placeholder="例:東京都渋谷区千駄ヵ谷1-2-3">
                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="contact-form-error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </td>
        </tr>
        <tr class="contact-item">
            <th class="content-title">建物名</th>
            <td>
                <input class="contact-content__input--address" type="text" name="building" value="<?php echo e(old('building')); ?>" placeholder="例:千駄ヵ谷マンション101">
            </td>
        </tr>
        <tr class="contact-item">
            <th class="content-title">お問い合わせの種類<span class="content-title__red">※</span></th>
            <td>
                <div class="contact-content__input--wrap">
                <select class="contact-content__select" name="department" id="department">
                    <option class="contact-content__select--option" value="">選択してください</option>
                    <option class="contact-content__select--option" value="1.商品のお届けについて" <?php echo e(old('department')=='1.商品のお届けについて' ? 'selected' : ''); ?>>1.商品のお届けについて</option>
                    <option class="contact-content__select--option" value="2.商品の交換について" <?php echo e(old('department')=='2.商品の交換について' ? 'selected' : ''); ?>>2.商品の交換について</option>
                    <option class="contact-content__select--option" value="3.商品トラブル" <?php echo e(old('department')=='3.商品トラブル' ? 'selected' : ''); ?>>3.商品トラブル</option>
                    <option class="contact-content__select--option" value="4.ショップへのお問い合わせ" <?php echo e(old('department')=='4.ショップへのお問い合わせ' ? 'selected' : ''); ?>>4.ショップへのお問い合わせ</option>
                    <option class="contact-content__select--option" value="5.その他" <?php echo e(old('department')=='5.その他' ? 'selected' : ''); ?>>5.その他</option>
                </select>
                <?php $__errorArgs = ['department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="contact-form-error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </td>
        </tr>
        <tr class="contact-item">
            <th class="content-title">お問い合わせ内容<span class="content-title__red">※</span></th>
            <td>
                <div class="contact-content__input--wrap">
                <textarea class="contact-content__textarea" name="message" rows="3" cols="40" id="text" placeholder="お問い合わせ内容を後ご記載ください"><?php echo e(old('message')); ?></textarea>
                <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="contact-form-error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </td>
        </tr>
    </table>
    <button type="submit" class="submit-button">確認画面</button>
    </form>
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maplesama/coachtech/laravel/Contact-form/src/resources/views/contact/index.blade.php ENDPATH**/ ?>