<?php
Class User extends CI_Model{
 function login($username, $password){
   $this->db->select('idUsuario, Usuario, Password,idTienda,idRol,cedula,idEstado');
   $this->db->from('Usuario');
   $this->db->where('Usuario', $username);
   $this->db->where('idEstado', 1);
   $this->db->where('password', MD5($password));
   $this->db-> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

  function udpdateLogin(){
    $this->db->set('FechaIngreso','NOW()',false);
    $this->db->where('idUsuario', $this->session->userdata('logged_in')["idUsuario"]);
    $this->db->update('Usuario');

  }
}
?>