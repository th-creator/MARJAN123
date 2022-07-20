<?php 
class UpdateContr extends Update {
    private $value;
    private $id;

    public function __construct($id,$value)
    {
        $this->value=$value;
        $this->id=$id;
    }
    public function setName() {
        if ($this->emptyInput() == false) {
            header('Location: ../updateUser.php?error=emptyinput');
            exit();
        }
        if ($this->invalidUid() == false) {
            header('Location: ../updateUser.php?error=invalidname');
            exit();
        }
        $this->updateName($this->value,$this->id);
    }
    public function setEmail() {
        if ($this->emptyInput() == false) {
            header('Location: ../updateUser.php?error=emptyinput');
            exit();
        }
        if ($this->invalidEmail() == false) {
            header('Location: ../updateUser.php?error=invalidemail');
            exit();
        }
        $this->updateEmail($this->value,$this->id);
    }
    protected function invalidUid() {
        if (!preg_match("/^[a-zA-Z0-9]*$/",$this->value)) {
            return $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    protected function invalidEmail() {
        if (!filter_var($this->value,FILTER_VALIDATE_EMAIL)) {
            return $result = false;
        }
        return $result = true;
    }
    protected function emptyInput() {
        if (empty($this->id) || empty($this->value)) {
            return $result = false;
        } 
        return $result = true;
    }
}