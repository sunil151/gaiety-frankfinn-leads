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
        // Default end date = today
        if (empty($endDate)) {
            $endDate = date("Y-m-d");
        }
    
        // Default start date = today if empty
        if (empty($startDate)) {
            $startDate = date("Y-m-d");
        }
    
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
            lc.total_leads AS lead_count
        ");
    
        // Fast subquery using JOIN (no N+1 query)
        $builder->join("(SELECT mobile, COUNT(*) AS total_leads 
                         FROM lead_table 
                         GROUP BY mobile) lc", 
                       "lc.mobile = l.mobile", 
                       "left");
    
        // Only latest record per mobile
        $builder->where("l.id IN (SELECT MAX(id) FROM lead_table GROUP BY mobile)");
    
        // Date filter
        $builder->where("DATE(l.ts) >=", $startDate);
        $builder->where("DATE(l.ts) <=", $endDate);
    
        // Latest first
        $builder->orderBy("l.id", "DESC");
    
        return $builder->get()->getResultArray();
    }


}
