<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'bio', 'password','profile_picture','number',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function jobs()
    {
        return $this->hasMany(Jobs_posts::class);
    }
    public function hasUnreadNotifications()
    {
        return $this->notifications()->where('read', false)->exists();
    }
    
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function jobApplications()
{
    return $this->hasManyThrough(Application::class, Jobs_posts::class, 'user_id', 'job_id', 'id', 'id');
}

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id');
    }
}
