<?php 
class EnrgContr extends Enrgs {
    private $id;
    private $Série;
    private $BARRE;
    private $MONTANT;
    private $MODELE; 
    private $AFFECTATION;
    private $PRODUCTION;

    public function __construct($id,$Série='',$BARRE='',$MONTANT='',$MODELE='',$AFFECTATION='',$PRODUCTION='')
    {
        $this->id=$id;
        $this->Série=$Série;
        $this->BARRE=$BARRE;
        $this->MONTANT=$MONTANT;
        $this->MODELE=$MODELE;
        $this->AFFECTATION=$AFFECTATION;
        $this->PRODUCTION=$PRODUCTION;
    } 
    public function check() {
        
        $this->setEnrg($this->Série,$this->BARRE,$this->MONTANT,$this->MODELE,$this->AFFECTATION,$this->PRODUCTION);
    }
    public function modify() {
        
        $this->modifyEnrg($this->id,$this->Série,$this->BARRE,$this->MONTANT,$this->MODELE,$this->AFFECTATION,$this->PRODUCTION);
    }
    public function delete() {
        if ($this->emptyId() == false) {
            header('Location: ../enregist.php?error=noid');
            exit();
        }
        $this->deleteEnrg($this->id);
    }
    public function get() {
        $this->getEnrg();
    }
    protected function emptyId() {
        if (empty($this->id)) {
            $result = false;
        } else{
            $result= true;
        }
        return $result;
    }
}