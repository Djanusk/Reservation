<?php
    function updatetestimonials($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('testimonials', $data);
    }
?>