<?php

defined('BASEPATH') or exit('No direct script access allowed');

class chart_model extends CI_Model
{
    public function getChart($id)
    {
        $this->db->select('volume');
        $this->db->from('rencana_perjadin');
        $this->db->where(array('MONTH(rencana_perjadin.tanggal_berangkat)' => $id));
        return $this->db->get()->result_array();
    }
}
