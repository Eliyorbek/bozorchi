<div>
    <link rel="stylesheet" href="/my.css">
    <div class="modalShow row">
        <div class="card col-lg-12">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Banner qo'shish</h5>
                    <button type="button" class="btn-close" wire:click="close()" ></button>
                </div>
                <form action="{{route('banner.store')}}" method="POST" class="form" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="name" class="name">Rasm</label>
                                <input type="file" id="name" name="image" class="form-control" wire:model="image" placeholder="Ism kiriting">
                            </div>
                            <div class="col-lg-6">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" name="slug" placeholder="Bannerga mos nom yozing">
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="start">Boshlanish sana</label>
                            <input type="date" class="form-control" name="start_date">
                        </div>
                        <div class="col-lg-6">
                            <label for="start">Tugash sana</label>
                            <input type="date" class="form-control" name="end_date">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <button type="button" class="btn btn-secondary" wire:click="close()">Close</button>
                        <button type="submit"  class="btn btn-primary">Save</button>
                    </div>
                </div>
                </form>

            </div>
        </div>
</div>