   
   <?php $__env->startSection('css'); ?>
   <link rel="stylesheet" href="<?php echo e(asset('css/auth.css')); ?>">
   <?php $__env->stopSection(); ?>
    
   <?php $__env->startSection('login'); ?>
    <a class="header-login"href="<?php echo e(route('login')); ?>">login</a>
   <?php $__env->stopSection(); ?>

   <?php $__env->startSection('content'); ?>
        <div class="contact-form">
            <div class="register">
                    <div class="register-title">
                         <h2>Register</h2>
                    </div>
                    <div class="register-content">
                        <form class="register-content__inner" method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>
                            <div class="register-content__item">
                            <p>お名前</p>
                            <input class="register-content__input" type="text" name="name" placeholder="例:山田 太郎" vaule="<?php echo e(old('name')); ?>">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="register-error"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="register-content__item">
                            <p>メールアドレス</p>
                            <input class="register-content__input" type="email" name="email" placeholder="例:test@example.com" vaule="<?php echo e(old('email')); ?>">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="register-error"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="register-content__item">
                            <p>パスワード</p>
                            <input class="register-content__input" type="password"name="password" placeholder="例:coachtech1106" vaule="<?php echo e(old('password')); ?>">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="register-error"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        <button class="submit-button">登録</button>
                    </div>
                </form>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/auth/register.blade.php ENDPATH**/ ?>