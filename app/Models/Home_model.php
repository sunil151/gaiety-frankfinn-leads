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

    public function getFilteredLeads($startDate = null, $endDate = null)
    {
        $builder = $this->db->table("lead_table l");

        $builder->select("
            l.id,
            l.full_name,
            l.mobile,
            l.email,
            l.centerId,
            l.qualificationId,
            l.utm_medium,
            l.utm_campaign,
            l.utm_term,
            l.utm_content,
            l.gad_source,
            l.gclid,
            l.gbraid,
            l.api_status,
            l.api_message,
            l.ts,
            (
                SELECT COUNT(*) 
                FROM lead_table 
                WHERE mobile = l.mobile
            ) AS lead_count
        ");

        // Only get latest row per mobile
        $builder->where("l.id = (SELECT MAX(id) FROM lead_table lt WHERE lt.mobile = l.mobile)");

        // Date filter
        if (!empty($startDate) && !empty($endDate)) {
            $builder->where("DATE(l.ts) >=", $startDate);
            $builder->where("DATE(l.ts) <=", $endDate);
        }

        $builder->orderBy("l.id", "DESC");

        return $builder->get()->getResultArray();
    }

}
