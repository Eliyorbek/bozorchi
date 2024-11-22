<div>
    <link rel="stylesheet" href="/my.css">
    @php
        $categories = \App\Models\Category::where('status' , 'active')->get();
     @endphp
    <div class="modalShow row">
        <div class="card col-lg-12">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Sup kategoriya qo'shish</h5>
                    <button type="button" class="btn-close" wire:click="close()" ></button>
                </div>
                <form action="{{route('sup-category.store')}}" method="POST" class="form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="name" class="name">Nomi</label>
                                <input type="text" id="name" name="name" class="form-control" wire:model="name" placeholder="Ism kiriting">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="name" class="name">Kategoriya</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="">Kategoriyani tanlang</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="name" class="name">Rasm</label>
                            <input type="file" id="name" name="image" class="form-control" wire:model="image" placeholder="Ism kiriting">
                        </div>
                        @include('livewire.activeBtn')
                    <div class="form-group mt-2">
                        <button type="button" class="btn btn-secondary" wire:click="close()">Close</button>
                        <button type="submit"  class="btn btn-primary">Save</button>
                    </div>
                </div>
                </form>

            </div>
        </div>
</div>
