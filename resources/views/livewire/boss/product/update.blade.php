<div>
    @php
        $categories = \App\Models\Category::where('status' , 'active')->get();
        $brends = \App\Models\Brend::where('status', 'active')->get();
        $sups = \App\Models\SupCategory::where('status' , 'active')->get();
    @endphp
    <div class="modalShow row ">
        <div class="card col-lg-12">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Mahsulotni tahrirlash</h5>
                <button type="button" class="btn-close" wire:click="close()" ></button>
            </div>
            <div class="modal-body">
                <form action="{{route('product.update' ,$id)}}" class="form"  enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{$id}}" name="id">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="name" class="name">Nomi</label>
                            <input type="text" id="name" name="name" class="form-control" wire:model="name" placeholder="Mahsulot nomini kiriting">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="price">Narxi</label>
                            <input type="number" name="price" id="price" wire:model="price" placeholder="Mahsulot narxini kiriting" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="pric">Miqdori</label>
                            <input type="number" name="count" id="pric" wire:model="count" placeholder="Mahsulotning miqdorini kiriting" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="pri">O'lchov turini</label>
                            <select class="form-select" name="brend_id" id="basic-usage" data-placeholder="Choose one thing">
                                <option>O'lchov turini tanlang</option>
                                @if($brends != null)
                                    @foreach($brends as $olchov)
                                        <option  value="{{$olchov->id}}" {{$olchov->id==$brend_id?'selected':''}}>{{$olchov->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="pri">Kategoriyasi</label>
                            <select class="form-select" id="basic-usage" name="category_id" wire:model="category_id" data-placeholder="Choose one thing">
                                <option value="">Kategoriyani tanlang</option>
                                @if($categories != null)
                                    @foreach($categories as $category)
                                        <option  value="{{$category->id}}" {{$category->id==$category_id?'selected':''}}>{{$category->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="pri">Sup kategoriyasi</label>
                            <select class="form-select" id="basic-usage" name="sup_id" wire:model="sup_id" data-placeholder="Choose one thing">
                                <option value="">Kategoriyaqa qarashligini tanlang</option>
                                @if($sups != null)
                                    @foreach($sups as $sup)
                                        <option  value="{{$sup->id}}">{{$sup->name}}</option>
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
