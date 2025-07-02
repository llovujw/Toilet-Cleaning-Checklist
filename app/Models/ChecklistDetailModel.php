<?php

namespace App\Models;

use CodeIgniter\Model;

class ChecklistDetailModel extends Model
{
    protected $table = 'checklist_detail';
    protected $allowedFields = ['checklist_id', 'item_id', 'checked'];
    public $timestamps = false;
}