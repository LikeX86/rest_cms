<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemServico extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'items_servicos';

    public function servico()
    {
        return $this->belongsTo(SiteServico::class, 'site_servicos_id');
    }
}