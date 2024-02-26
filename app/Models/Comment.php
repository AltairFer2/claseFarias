<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Asegúrate de que 'fillable' refleje los campos reales de tu migración
    protected $fillable = ['product_id', 'email', 'content'];

    public function product()
    {
        // Esta relación supone que tienes un modelo Product correspondiente.
        return $this->belongsTo(Product::class);
    }
}