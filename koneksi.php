<?php
class Koneksi {
    private $server = "localhost";
    private $username = "dev"; // root
    private $password = "rahasia"; // ""
    private $db = "phb_kelas_c";

    function getKoneksi() {
        return new mysqli($this->server, $this->username, 
        $this->password, $this->db);
    }
}
?>