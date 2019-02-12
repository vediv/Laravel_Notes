<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form class="form-horizontal" id="add-form">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="address" placeholder="Address"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="button" class="btn btn-default" id="add-button">Add</button>
                        </div>
                      </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Address</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr id="customer-<?php echo e($d->id); ?>">
                                <td ><?php echo e($d->name); ?></td>
                                <td ><?php echo e($d->address); ?></td>
                                <td>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#edit-modal" data-id="<?php echo e($d->id); ?>"  data-name="<?php echo e($d->name); ?>" data-address="<?php echo e($d->address); ?>">Edit</button>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#delete-modal" data-id="<?php echo e($d->id); ?>">Delete</button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>                   
                </div>
            </div>
        </div>
    </div>    

  <!-- edit Modal -->
  <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
                    <form class="form-horizontal" id="edit-form">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" placeholder="Name">
                          <input type="hidden" class="form-control" name="id" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="address" placeholder="Address"></textarea>
                        </div>
                      </div>
                    </form> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="edit-button">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- delete Modal -->
  <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
          <h2>Are you sure want to delete?</h2>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="delete-button">Yes</button>
        </div>
      </div>
    </div>
  </div>  
   
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>