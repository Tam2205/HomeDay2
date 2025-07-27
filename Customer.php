<?php

class Customer {
    public $id;
    public $username;
    public $password; 
    public $fullname;
    public $address;
    public $phone;
    public $gender;
    public $birthday;

    public function __construct($id, $username, $password, $fullname, $address, $phone, $gender, $birthday) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password; 
        $this->fullname = $fullname;
        $this->address = $address;
        $this->phone = $phone;
        $this->gender = $gender;
        $this->birthday = $birthday;
    }

    
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getFullname() {
        return $this->fullname;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getBirthday() {
        return $this->birthday;
    }

 
    public function toArray() {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'password' => $this->password, 
            'fullname' => $this->fullname,
            'address' => $this->address,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'birthday' => $this->birthday
        ];
    }
}

?>