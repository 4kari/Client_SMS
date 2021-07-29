<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
    public function login($username, $password){
        $data = json_decode($this->curl->simple_get('http://10.5.12.26/user/api/User/',array('username'=>$username), array(CURLOPT_BUFFERSIZE => 10)),true);
        //hash password
        if ($data!=null){
            if ($data['data']['password']==$password){
                echo "username dan password benar";
                $user=[
                        'username' => $data['data']['username'],
                        'level' => $data['data']['level']
                    ];
                var_dump($user);
                $this->session->set_flashdata('pesan', 'Login sukses!');
                $this->session->set_userdata($user);
            }else{
                $this->session->set_flashdata('pesan', 'Password salah!');
            }
        }else{
            $this->session->set_flashdata('pesan', 'Username tidak ditemukan!');
        }
    }
    public function getUsers($limit, $start, $keyword = null, $user)
    {
        //administrator
        if ($user == 1) {
            if ($keyword !== null) {
                $query =
                    "
			SELECT u.id,  u.username, u.level_id, l.level as level FROM user u, user_level l WHERE u.level_id = l.id and (u.username LIKE '%$keyword%' OR l.level LIKE '%$keyword%')
		";
            } else {
                $query =
                    "
			SELECT u.id,  u.username, u.level_id, l.level as level FROM user u, user_level l WHERE u.level_id = l.id
		";
            }
        }
        //admin prodi
        if (($user == 2)) {
            if ($keyword !== null) {
                $query =
                    "
			SELECT u.id,  u.username, u.level_id, l.level as level FROM user u, user_level l WHERE u.level_id = l.id AND u.level_id != '1' AND u.level_id != '2' and (u.username LIKE '%$keyword%' OR l.level LIKE '%$keyword%')
		";
            } else {
                $query =
                    "
			SELECT u.id,  u.username, u.level_id, l.level as level FROM user u, user_level l WHERE u.level_id != '1' AND u.level_id != '2' AND u.level_id = l.id limit
		";
            }
        }
        return $this->db->query($query, $limit, $start, $keyword)->result_array();
    }
    public function getUserByLv($lvl1='null',$lvl2='null',$lvl3='null',$lvl4='null' ){
        $query ="SELECT u.id,  u.username, u.level_id, l.level as level FROM user u, user_level l WHERE u.level_id = l.id and
        (u.level_id=$lvl1 OR u.level_id=$lvl2 OR u.level_id=$lvl3 OR u.level_id=$lvl4)";
        return $this->db->query($query)->result_array();
    }
    public function getUserByProdi($level, $prodi){
        if ($level==3){
            $query ="SELECT u.id,  u.username, u.level_id, l.level as level FROM user u, user_level l, dosen d WHERE u.level_id = l.id AND d.username = u.id AND d.prodi=$prodi AND u.level_id=$level  
            ORDER BY `u`.`username` ASC";
        }
        if ($level==4){
            $query ="SELECT u.id,  u.username, u.level_id, l.level as level FROM user u, user_level l, mahasiswa m WHERE u.level_id = l.id AND m.username = u.id AND m.prodi=$prodi AND u.level_id=$level  
            ORDER BY `u`.`username` ASC";
        }
        return $this->db->query($query)->result_array();
    }
}
