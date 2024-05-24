<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    protected $fillable = ['transaction_id', 'mobile_no', 'success', 'active'];

    protected static function booted()
    {
        static::deleting(function ($payment) {
            $payment->user()->delete();
        });
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
