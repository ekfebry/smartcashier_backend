<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Member extends Model
{
    use HasApiTokens;

    protected $fillable = ['name', 'email', 'password', 'phone', 'address'];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
