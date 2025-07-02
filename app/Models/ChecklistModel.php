<?php

namespace App\Models;

use CodeIgniter\Model;

class ChecklistModel extends Model
{
    protected $table = 'checklists';
    protected $allowedFields = ['toilet_id', 'user_id', 'tanggal', 'status'];
    public $timestamps = false;
}