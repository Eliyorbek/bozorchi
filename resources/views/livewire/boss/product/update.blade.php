<div>
    <div class="modalShow">
        <div class="card-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Mahsulotni tahrirlash</h5>
                <button type="button" class="btn-close" wire:click="close()" ></button>
            </div>
            <div class="modal-body">
                <form action="{{route('product.update' ,$id)}}" class="form"  enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{$id}}" name="id">
                    <div class="form-group">
                        <label for="name" class="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" wire:model="name" placeholder="Mahsulot nomini kiriting">
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="price">Narxi</label>
                            <input type="text" name="price" id="price" wire:model="price" placeholder="Mahsulot narxini kiriting" class="form-control">
                        </div>
                        <div class="form-group col-6">
                            <label for="pric">Soni</label>
                            <input type="number" name="count" id="pric" wire:model="count" placeholder="Mahsulotning sonini kiriting" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="pri">Category</label>
                            @php $categories = \App\Models\Category::where('status' , 'active')->get();$brends = \App\Models\Brend::where('status', 'active')->get() @endphp
                            <select name="category" wire:model="category" id="" class="form-control">
                                <option value="">Kategoriyani tanlang</option>
                                @if($categories != null)
                                    @foreach($categories as $category)
                                        <option  value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="pri">Brend</label>
                            <select name="brend" wire:model="brend" id="" class="form-control">
                                <option value="">Brendini tanlang</option>
                                @if($brends != null)
                                    @foreach($brends as $category)
                                        <option  value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rasm">Rasm yuklash</label>
                        <input type="file" name="image[]" multiple class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pa">Ma'lumotlari</label>
                        <textarea name="description" wire:model="description" id="ma" cols="2" rows="2" placeholder="Mahsulot haqida malumotlarni kiriting" class="form-control"></textarea>
                    </div>

                    @include('livewire.activeBtn')
                    <div class="form-group mt-2">
                        <button type="button" class="btn btn-secondary" wire:click="close()">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>