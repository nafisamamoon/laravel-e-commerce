<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addbrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
        <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="storeBrand">
      <div class="modal-body">
       <div class="mb-3">
        <label>Brand Name</label>
        <input type="text" wire:model.defer="name" class="form-control">
       </div>
       <div class="mb-3">
        <label>Brand Slug</label>
        <input type="text" class="form-control" wire:model.defer="slug">
       </div>
       <div class="mb-3">
        <label>Status</label><br/>
        <input type="checkbox" wire:model.defer="status"/>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
</form>
    </div>
  </div>
</div>



<!-- brand update modal -->
<div wire:ignore.self class="modal fade" id="updatebrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5>
        <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="updateBrand">
      <div class="modal-body">
       <div class="mb-3">
        <label>Brand Name</label>
        <input type="text" wire:model.defer="name" class="form-control">
       </div>
       <div class="mb-3">
        <label>Brand Slug</label>
        <input type="text" class="form-control" wire:model.defer="slug">
       </div>
       <div class="mb-3">
        <label>Status</label><br/>
        <input type="checkbox" wire:model.defer="status"/>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
</form>
    </div>
  </div>
</div>




<!-- brand delete modal -->
<div wire:ignore.self class="modal fade" id="deletebrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">delete Brand</h5>
        <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="destroyBrand">
      <div class="modal-body">
     <h4>Are you sure you want to delete brand ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">yes delete</button>
      </div>
</form>
    </div>
  </div>
</div>