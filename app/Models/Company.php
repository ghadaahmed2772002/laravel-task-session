<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable = [
        'name',
        'country',
        'city',
        'country_size',
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'company_id', 'id');
    }
}
