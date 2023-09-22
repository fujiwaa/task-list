<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusModel extends Model
{
    use HasFactory;
    protected $table = 'status_task';
    protected $primaryKey = 'id_status_task';
    protected $guarded = ['id_status_task'];
}