<div>
    <style>
       .table tr th,td{
            text-transform: none !important;
        }
    </style>
    <div class="p-4">

        @include('livewire.content-header')
        <div class="mt-2">
            @if(isset($update) && $update==1)
                @include('livewire.profil.update')
                @include('livewire.show')
            @endif
            <div class="row">
                <div class="col-lg-4 ">
                    <div class="card card-primary card-outline d-flex align-items-center flex-column" >
                        <div class="image pt-2">
                            <img src="{{ $models->image != null ? '/storage/user_img/' . $models->image : '/avatar.png' }}"
                                 style="width: 150px; height: 150px; border-radius: 50%;"
                                 alt="">
                        </div>
                        <div class="fulname">
                            <h3 style="text-transform: capitalize">{{$models->name}}</h3>
                        </div>
                        <table class="table text-align-center">
                            <tr>
                                <th>Ism</th>
                                <td>{{$models->name}}</td>
                            </tr>
                            <tr>
                                <th>Lavozim</th>
                                <td>{{$models->role==1?'Boshliq':'Kuryer'}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$models->email}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$models->phone}}</td>
                            </tr>

                            <tr>
                                <th>Avtomobil raqami</th>
                                <td>{{$models->car_number}}</td>
                            </tr>
                          </table>
                        <div class="card-footer w-100">
                            <button type="button" wire:click="updateWindow({{$models->id}})" class="btn w-100 btn-success"> Tahrirlash</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-primary card-outline d-flex align-items-center flex-column">
                            <h5 class="pt-3">Yangi parol qo'yish</h5>
                        <div class="card-body">
                            <form action="" class="form">
                                <div class="form-group">
                                    <label for="pass">Yangi parol</label>
                                    <input type="password" name="password1" wire:model="password1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pass">Parolni tasdiqlash</label>
                                    <input type="password" name="password1" wire:model="password2" class="form-control">
                                </div>
                                <button type="button" wire:click="editPassword({{$models->id}})" class="btn btn-sm btn-primary">Saqlash</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
