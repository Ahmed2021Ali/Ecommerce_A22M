<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia, HasRoles;

    protected $fillable = ['name', 'email', 'password','last_login_at'];

    protected $hidden = ['password', 'remember_token',];

    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaCollection('userImages');
    }

    public function orders()
    {
        return $this->hasMany(OrderDetails::class)->paginate(5);
    }
    public function ordersOnlyTrashed()
    {
        return $this->hasMany(OrderDetails::class)->onlyTrashed()->paginate(5);
    }
    public function favs()
    {
        return $this->hasMany(Fav::class)->paginate(6);
    }
    public function addresses()
    {
        return $this->hasMany(Address::class)->paginate(2);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class)->paginate(6);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
