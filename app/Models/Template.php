<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $table = 'templates';
    protected $fillable = ['nama_template', 'keterangan_template', 'foto_template', 'elemen_resume', 'design_html_css'];
}
