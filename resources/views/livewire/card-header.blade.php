<div>
    <div class="card-header row d-flex" wire:ignore style="align-items: center;">

        <div class="col-lg-10">
            <form action="">
                <div class="form-group" >
                    <input type="search" wire:model.live="search" class="form-control" name="" id=""  placeholder="Search">
                </div>
            </form>
        </div>
        @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
            <button type="button" wire:click="createOpen()" class="btn  btn-lg btn-primary col-lg-2" style="margin-bottom: 15px;">
               <i class="fa fa-plus"></i>  Qo'shish
            </button>
        @endif
    </div>
</div>
