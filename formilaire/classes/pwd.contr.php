<?php 
class PwdContr extends Pwd {
    private $oldpwd;
    private $newpwd; 
    private $repwd;
    private $id;

    public function __construct($oldpwd,$newpwd,$repwd,$id)
    {
        $this->oldpwd=$oldpwd;
        $this->newpwd=$newpwd;
        $this->repwd=$repwd;
        $this->id=$id;
    }
    public function setPwd() {
        if ($this->emptyInput() == false) {
            header('Location: ../updateUser.php?error=emptyinput');
            exit();
        }
        if ($this->pwdMatch() == false) {
            header('Location: ../signupForm.php?error=invalidpassword');
            exit();
        }
        if ($this->pwdShort() == false) {
            header('Location: ../signupForm.php?error=shortpassword');
            exit();
        }
        $this->updatePwd($this->oldpwd,$this->newpwd,$this->id);
    }
    
    protected function emptyInput() {
        if (empty($this->id) || empty($this->oldpwd) || empty($this->newpwd) || empty($this->repwd)) {
            return $result = false;
        } 
        return $result = true;
    }
    protected function pwdMatch() {
        if ($this->newpwd !== $this->repwd) {
            return $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    protected function pwdShort() {
        if (strlen($this->newpwd) < 4) {
            return $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}