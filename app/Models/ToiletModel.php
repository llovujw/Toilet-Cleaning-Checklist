<?php

namespace App\Models;
use CodeIgniter\Model;

class ToiletModel extends Model
{
    protected $table = 'toilets';
    protected $allowedFields = ['lantai', 'nama_toilet'];
}