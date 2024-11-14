<div>
    <div class="modalShow">
        <div class="card-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Mahsulot haqida</h5>
                <button type="button" class="btn-close" wire:click="close()" ></button>
            </div>
            <div class="modal-body">
                <form action="{{route('product-income.store')}}" class="form"  method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="name">Yetkazib beruvchi</label>
                        <select name="supplier_id" wire:model="supplier_id" id="" class="form-control">
                            <option value="">Yetkazib beruvchini tanlang</option>
                            @if($suppliers != null)
                                @foreach($suppliers as $supplier)
                                    <option  value="{{$supplier->id}}">{{$supplier->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="color">Yetkazilgan sana</label>
                        <input type="date"  name="date" id="color" wire:model="date" placeholder="Yetkazilgan sanani belgilang" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pa">Izoh</label>
                        <textarea name="comment" wire:model="comment" id="ma" cols="2" rows="2" placeholder="Yetkazilgan mahsulot haqida izoh yozing" class="form-control"></textarea>
                    </div>
{{--                    @include('livewire.activeBtn')--}}
                    <div class="form-group mt-2">
                        <button type="button" class="btn btn-secondary" wire:click="close()">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
