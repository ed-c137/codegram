<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'url',
        'image',
    ];
    public function profileImage(){
        $imagepath = ($this->image) ? $this->image : 'uploads/noprof.png';
        return '/storage/'. $imagepath;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function followers(){
        return $this->belongsToMany(User::class);
    }
}
