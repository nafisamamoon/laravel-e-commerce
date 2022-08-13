<div>
    @include('livewire.admin.brand.modal-form')
 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Brands list
                <a href="#" data-bs-toggle="modal" data-bs-target="#addbrandModal" class="btn btn-primary btn-sm float-end">Add Brand</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-stiped">
<thead>
    <tr>
        <th>
            ID
        </th>
        <th>
            Name
        </th>
        <th>
            Slug
        </th>
        <th>
            Status
        </th>
        <th>
            Action
        </th>
    </tr>
</thead>
<tbody>
    @forelse($brands as $brand)
    <tr>
        <td>{{$brand->id}}</td>
        <td>{{$brand->name}}</td>
        <td>{{$brand->slug}}</td>
        <td>{{$brand->status == '1' ?'hidden':'visible'}}</td>
        <td>
            <a href="#" wire:click="editBrand({{$brand->id}})"  data-bs-toggle="modal" data-bs-target="#updatebrandModal" class="btn btn-sm btn-success">Edit</a>
            <a href="#" wire:click="deleteBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#deletebrandModal" class="btn btn-sm btn-danger">Delete</a>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5">no brands found</td>
    </tr>
    @endforelse
   
</tbody>
                </table>
            </div>
        </div>
    </div>
 </div>
</div>
@push('script')
<script>
window.addEventListener('close-modal',event=>{
$('#addbrandModal').modal('hide');
$('#updatebrandModal').modal('hide');
$('#deletebrandModal').modal('hide');
});
</script>
@endpush