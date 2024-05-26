<?php $__env->startSection('title', 'FreeGram - Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Users</h1>
     <div>
        <?php if(session()->has('success')): ?>
        
      
            <!--div>
                <?php echo e(session('success')); ?>

            </div-->
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


        <table class="table table-bordered table-striped" id="y_dataTables">
            <thead class="bg-primary ">
               <tr class="text-dark">
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created at</th> <th>Action</th>
               </tr>
            </thead>
              <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->created_at); ?></td>
                  
                    <td>
                        <a href="<?php echo e(url('/editUser/'.$user->id)); ?>" title="Edit" class="btn btn-primary">
                            <i class="fas fa-edit" title="Editar"></i></a>
                        <form id="delForm<?php echo e($user->id); ?>" method="POST" action="<?php echo e(url('/deleteUser/'.$user->id)); ?>" accept-charset="UTF-8" style="display:inline">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <button type="button" class="btn btn-danger btn-delete" title="Delete"
                                onclick=" confirmDelete(<?php echo e($user->id); ?>)"><i
                                    class="fas fa-trash" aria-hidden="true"></i></button>
                                
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
            
            
            
         </table>
       


<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
  
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
        <script>
        $(document).ready( function () {
        $('#y_dataTables').DataTable({
        "processing": true,"searching":true,  "lengthMenu": [[5,10, 25, 50,100, -1], [5,10, 25, 50,100, "All"]],
        "paging":true,  "bProcessing": true,
     //   ajax: "<?php echo e(url('dashboard')); ?>",
      /*  columns: [
                 { data: 'id', name: 'id' },
                 { data: 'name', name: 'name' },
                 { data: 'email', name: 'email' },
                 { data: 'created_at', name: 'created_at' },
                 { data: 'id', name: 'id' }
              ]*/
        });
        });
        </script>
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.min.js"></script>
    <script>
  
  function showMessage(){
  
  Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'User was deleted!',
                        showConfirmButton: false,
                        timer: 2000
                    });
  }     
function confirmDelete(id){ 
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
     $('#delForm'+id).submit();
  
  }
  
})
}

<?php if(session()->has('success')): ?>
        
         showMessage();
         

        <?php endif; ?>
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vincent/freeGram/resources/views/dashboard.blade.php ENDPATH**/ ?>