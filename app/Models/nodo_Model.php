<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;


class nodo_Model extends Model
{
    use HasFactory;
    use NodeTrait;

    protected $table = 'arbol';
    protected $primaryKey = 'id';

    protected $fillable = [

        'parent_id',
        'parent',
        'title',
    ];

    protected $dateFormat = 'Y-d-m H:i:s';  //funcioon para formateo de la fecha en SQL Server
}