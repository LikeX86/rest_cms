<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitePortfolio extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'site_portfolios';
}
