<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
    require APPPATH.'/libraries/REST_Controller.php';
 
    class Api extends REST_Controller{
        function __construct(){
            parent::__construct();
        }

        //semua data ditampilkan dengan menggunakn parameter nis
        //http://localhost/PKL/rest_api/api/mahasiswa?nis=11404432
        function mahasiswa_get(){
            $nis = $this->get('nis');
            if($nis == ''){
                $mahasiswa = $this->db->get('siswa')->result();
            }else{
                $this->db->where('nis',$nis);
                $mahasiswa = $this->db->get('siswa')->result();
            }
            $this->response($mahasiswa);
        }
    }