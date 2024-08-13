<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'sender_id', 'job_id', 'message', 'read',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function job()
    {
        return $this->belongsTo(Jobs_posts::class, 'job_id');
    }
    public function markAsRead()
    {
        $this->read = true;
        $this->save();
    }
}
