<?php

namespace App\Models;

use CodeIgniter\Model;

class ChecklistItemModel extends Model
{
    protected $table = 'checklist_items';
    protected $allowedFields = ['item'];
    public $timestamps = false;
}