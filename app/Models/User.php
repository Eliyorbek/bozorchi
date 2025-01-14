<?php

namespace App\Models;

 use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
 use Tymon\JWTAuth\Contracts\JWTSubject;

 class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


     public function getJWTIdentifier()
     {
         return $this->getKey();  // Bu yerda foydalanuvchi IDsi qaytariladi
     }

     /**
      * Get custom claims for the JWT token.
      *
      * @return array
      */
     public function getJWTCustomClaims()
     {
         if ($this->image !=null){
             return [
                 'id'=>$this->id,
                 'name'=>$this->name,
                 'email'=>$this->email,
                 'phone'=>$this->phone,
                 'image'=>'https://meningbozorchim.uz/storage/user_img/'.$this->image,
             ];
         }else{
             return [
                 'id'=>$this->id,
                 'name'=>$this->name,
                 'email'=>$this->email,
                 'phone'=>$this->phone,
             ];
         }
     }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role'=>'integer'
    ];

    public function delivery(){
        return $this->HasMany(OrderDelivery::class , 'courier_id');
    }
}
