   
   <?php $__env->startSection('css'); ?>
   <link rel="stylesheet" href="<?php echo e(asset('css/auth.css')); ?>">
   <?php $__env->stopSection(); ?>
    
   <?php $__env->startSection('login'); ?>
    <a class="header-login"href="<?php echo e(route('login')); ?>">login</a>
   <?php $__env->stopSection(); ?>

   <?php $__env->startSection('content'); ?>
   <div class="contact-form">
            <div class="login">
                    <div class="login-title">
                         <h2>Login</h2>
                    </div>
                    <div class="login-content">
                        <form class="login-content__inner" method="POST" action="<?php echo e(route('login.submit')); ?>">
                        <?php echo csrf_field(); ?>
                            <div class="login-content__item">
                            <p>メールアドレス</p>
                            <input class="login-content__input" type="email" name="email" placeholder="例:test@example.com" value="<?php echo e(old('email')); ?>">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="login-error"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="login-content__item">
                            <p>パスワード</p>
                            <input class="register-content__input" type="password"name="password" placeholder="例:coachtech1106">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="login-error"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <input type="hidden" name="redirect_to" value="<?php echo e($redirectTo ?? ''); ?>">
                        <button class="submit-button">ログイン</button>
                    </div>
                </form>
            </div>
        </div>
   <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/auth/login.blade.php ENDPATH**/ ?>