<?php
class SignupContr extends Signup {
    private $uid; 
    private $pwd;
    private $pwdrepeat;
    private $email;
    private $role;

    public function __construct($uid,$pwd,$pwdrepeat,$email,$role = 'admin')
    {
        $this->uid=$uid;
        $this->pwd=$pwd;
        $this->pwdrepeat=$pwdrepeat;
        $this->email=$email;
        $this->role=$role;
    }
    public function signupUser() {
        if ($this->emptyInput() == false) {
            header('Location: ../signupForm.php?error=emptyinput');
            exit();
        }
        if ($this->invalidUid() == false) {
            header('Location: ../signupForm.php?error=invaliduid');
            exit();
        }
        if ($this->invalidEmail() == false) {
            header('Location: ../signupForm.php?error=invalidemail&name='.$this->uid);
            exit();
        }
        if ($this->pwdMatch() == false) {
            header('Location: ../signupForm.php?error=invalidpassword&email='.$this->email.'&name='.$this->uid);
            exit();
        }
        if ($this->pwdShort() == false) {
            header('Location: ../signupForm.php?error=shortpassword&email='.$this->email.'&name='.$this->uid);
            exit();
        }
        $this->setUser($this->uid,$this->pwd,$this->email,$this->role);
    }
    protected function emptyInput() {
        if (empty($this->uid) || empty($this->email) || empty($this->pwd) || empty($this->pwdrepeat) ) {
            return $result = false;
        } else {
            $result = true;
        }
        return $result;        
    }
    protected function invalidUid() {
        if (!preg_match("/^[a-zA-Z0-9]*$/",$this->uid)) {
            return $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    protected function invalidEmail() {
        if (!filter_var($this->email,FILTER_VALIDATE_EMAIL)) {
            return $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    protected function pwdMatch() {
        if ($this->pwd !== $this->pwdrepeat) {
            return $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    protected function pwdShort() {
        if (strlen($this->pwd) < 4) {
            return $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}