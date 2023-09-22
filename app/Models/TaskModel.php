<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    use HasFactory;
    protected $table = 'task_list';
    protected $primaryKey = 'id_task_list';
    protected $guarded = ['id_task_list'];

    public function User() {
        return $this->hasOne(UserModel::class, 'id_user', 'id_user');
    }

    public function Status() {
        return $this->belongsTo(StatusModel::class, 'id_status_task');
    }
}
