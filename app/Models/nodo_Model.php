<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;


class nodo_Model extends Model
{
    use HasFactory;

    protected $table = 'nodo';
    protected $primaryKey = 'id';

    protected $fillable = [
        'parent',
        'title',
        'created_at'
    ];

    protected $dateFormat = 'Y-d-m H:i:s';  //funcion para formateo de la fecha en SQL Server
}
