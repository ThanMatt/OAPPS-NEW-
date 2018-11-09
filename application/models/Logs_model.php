<?php 

class Logs_model extends CI_Model {

  public function showLogs() {

    $this->db->from('log');
    $this->db->limit(100);
    $this->db->order_by('LogID', 'DESC');
    $result = $this->db->get();

    return $result->result();
  }

  public function splitDateTime($dateTime) {
    return strstr($dateTime, " ", false);
  }


}

?>