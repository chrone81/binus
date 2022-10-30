<?php
class JawabanModel extends CI_Model{
    public function getJawabanDimensi($dimensi){
        $query="SELECT jawaban,
        CASE jawaban
        WHEN 'A' THEN Count(jawaban)*1
        WHEN 'B' THEN Count(jawaban)*2
        WHEN 'C' THEN Count(jawaban)*3
        WHEN 'D' THEN Count(jawaban)*4
        WHEN 'E' THEN Count(jawaban)*5
        END as jumlah
        FROM jawaban,tbkuesioner
        WHERE (tbkuesioner.id_kuesioner=jawaban.id_kuesioner) AND (tbkuesioner.id_dimensi=$dimensi)
        GROUP BY jawaban";
        return $this->db->query($query)->result_array();
    }
    public function getKuisioner(){
        $query="SELECT * FROM tbkuesioner ORDER BY id_kuesioner";
        return $this->db->query($query)->result_array();
    }
    public function deleteJawaban($session_id){
        $query="DELETE FROM jawaban WHERE username='$session_id'";
        return $this->db->query($query);
    }
    public function addJawaban($nomor,$jawaban,$session_id){
        $query="INSERT INTO jawaban (id_kuesioner,jawaban,username) VALUES ('$nomor','$jawaban','$session_id')";
        return $this->db->query($query);
    }
}