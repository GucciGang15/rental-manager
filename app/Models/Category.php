<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Equipment;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','description'];

    public function equipments(){
        return $this->hasMany(Equipment::class);
    }
}
