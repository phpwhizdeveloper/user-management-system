<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'name',
        'image',
    ];

    // Relationship with Type
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'category_user');
    }

}
