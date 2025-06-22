<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipper extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone', 'email', 'status', 'user_id'];
    public function orders() {
        return $this->hasMany(Order::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
