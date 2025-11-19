<?php
namespace App\Models;

use CodeIgniter\Model;

class Home_model extends Model
{
    protected $table = 'lead_table';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ["*"];

    public function save_lead_data($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}
