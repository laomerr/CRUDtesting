<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'pessoas';
    protected $primaryKey = 'cod_pessoa'; 
    public $timestamps = false;
    protected $fillable = ['nome', 'endereco', 'telefone', 'email', 'data_nascimento'];
}