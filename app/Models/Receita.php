<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    use HasFactory;
    protected $fillable = [

        'nome', 'detalhes', 'valor', 'categoria', 'user_id'
    ];

             

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
