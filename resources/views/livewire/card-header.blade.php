<div>
    <div class="card-header d-flex align-items-center justify-content-end" style="gap:10px; line-height: 20px;">

        <div class="form-group" style="margin-top: 18px;">
            <div class="input-group">
                <button type="button" class="btn btn-default float-right" id="daterange-btn">
                    <i class="far fa-calendar-alt"></i>Muddatni tanlang
                    <i class="fas fa-caret-down"></i>
                </button>
            </div>
        </div>
{{--        <div class="col-sm-3"style="margin-top: 18px">--}}
{{--            <div class="form-group">--}}
{{--                <select class="select2" multiple="multiple" data-placeholder="Tanlang" style="width: 100%;height: 30px;margin-top: 20px;">--}}
{{--                    @if($options!=null)--}}
{{--                        @for($i=0;$i<count($options);$i++)--}}
{{--                            <option>{{$options[$i]}}</option>--}}
{{--                        @endfor--}}
{{--                    @endif--}}
{{--                </select>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="search">
            <form action="">
                <div class="form-group d-flex" style="gap:10px;">
                    <input type="search" wire:model.live="search"  name="" id="" style=" padding:6px; outline: none; height: 34px;margin-top: 14px; border-radius: 5px; width: 15rem;" placeholder="Search">
                </div>
            </form>
        </div>
        @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
            <button type="button" wire:click="createOpen()" class="btn btn-sm btn-primary">
               <i class="fa fa-plus"></i>  Qo'shish
            </button>
        @endif
    </div>
</div>
