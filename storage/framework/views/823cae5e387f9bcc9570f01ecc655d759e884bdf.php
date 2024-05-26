<?php $__env->startSection('title', 'FreeGram - Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Edit User</h1>
     <div>
        <?php if(session()->has('success')): ?>
        
      
            <!--div>
                <?php echo e(session('success')); ?>

            </div-->
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    
        <div class="register-box">

        
        

        
        <div class="card card-outline card-primary">

            
                            <div class="card-header ">
                    <h3 class="card-title float-none text-center">
                        Update User Data              </h3>
                </div>
            
            
            <div class="card-body register-card-body ">
                    <form action="/updateUser/<?php echo e($user->id); ?>" method="post">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('PUT'); ?>
        
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control "
                   value="<?php echo e($user->name); ?>" placeholder="Full name" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user "></span>
                </div>
            </div>
          
                    </div>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  
                    <p class="d-block text-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        
        <div class="input-group mb-3">
            <input readonly type="email" name="email" class="form-control "
                   value="<?php echo e($user->email); ?>" placeholder="Email">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope "></span>
                </div>
            </div>
           
                    </div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        
       
        
       
        
        <button type="submit" class="btn btn-block btn-flat btn-primary">
            <span class="fas fa-user-plus"></span>
            Update
        </button>

    </form>
            </div>

            
                            
            
        </div>

    </div>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('js'); ?>
  
   <script type="text/javascript" charset="utf8" src="../vendor/sweetalert2/sweetalert2.all.js"></script>
   <script>
        function showMessage(){
        
        Swal.fire({
                              icon: 'success',
                              title: 'Success',
                              text: 'User was updated!',
                              showConfirmButton: false,
                              timer: 2000
                          });
        }     
    <?php if(session()->has('message')): ?>
        
    showMessage();
    

   <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>

   

   

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vincent/freeGram/resources/views/edit.blade.php ENDPATH**/ ?>