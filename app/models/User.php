<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter user
    public function register($data){
      $this->db->query('INSERT INTO users (`username`, `pwd`, `name`) VALUES(:username, :password, :name)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':username', $data['email']);
      $this->db->bind(':password', $data['password']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //login user
    public function login($email, $password){
      $this->db->query('SELECT * FROM users WHERE `username` = :email');
      $this->db->bind(':email', $email);
      $row = $this->db->single();
      $hashed_pwd=$row->pwd;
      if(password_verify($password, $hashed_pwd)){
        return $row;
      }else{
        return false;
      }
    }

    // Find user by email
    public function findUserByEmail($email){
      $this->db->query('SELECT * FROM users WHERE username = :username');
      // Bind value
      $this->db->bind(':username', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }
  }