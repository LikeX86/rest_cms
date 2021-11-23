<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteServico extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'site_servicos';


    public function itens(){
        return $this->hasMany(ItemServico::class, 'site_servicos_id');
    }
}
