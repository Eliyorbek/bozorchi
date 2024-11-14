<div>
    @php $categories = \App\Models\Category::where('status' , 'active')->get(); @endphp
    <link rel="stylesheet" href="/my.css">
    <div class="modalShow">
        <div class="card-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update brend</h5>
                <button type="button" class="btn-close" wire:click="close()" ></button>
            </div>
            <form action="{{route('sup-category.update' , $id)}}" enctype="multipart/form-data" class="form" method="POST">
            <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-6">
                        <label for="name" class="name">Nomi</label>
                        <input type="text" id="name" name="name" class="form-control" wire:model="name" placeholder="Ism kiriting">
                    </div>
                    <div class="form-group col-6">
                        <label for="name" class="name">Kategoriya</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="">Kategoriyani tanlang</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->name==$category_id?'selected':''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="name" class="name">Rasm</label><br>
                        <img src="{{$image}}" style="width:150px;" alt="">
                        <input type="file" id="name" name="image" class="form-control" wire:model="image" placeholder="Ism kiriting">
                    </div>
                    @include('livewire.activeBtn')
                <div class="form-group mt-2">
                    <button type="button" class="btn btn-secondary" wire:click="close()">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>
