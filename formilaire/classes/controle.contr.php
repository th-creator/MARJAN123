<?php 
class CntrContr extends Cntrs {
    private $id;
    private $Série;
    private $BARRE;
    private $MONTANT;
    private $MODELE; 
    private $IP;
    private $MAC;
    private $EMPLACEMENT;
    private $PRODUCTION;

    public function __construct($id,$Série='',$BARRE='',$MONTANT='',$MODELE='',$IP='',$MAC='',$EMPLACEMENT='',$PRODUCTION='')
    {
        $this->id=$id;
        $this->Série=$Série;
        $this->BARRE=$BARRE;
        $this->MONTANT=$MONTANT;
        $this->MODELE=$MODELE;
        $this->IP=$IP;
        $this->MAC=$MAC;
        $this->EMPLACEMENT=$EMPLACEMENT;
        $this->PRODUCTION=$PRODUCTION;
    } 
    public function check() {
        
        $this->setCntr($this->Série,$this->BARRE,$this->MONTANT,$this->MODELE,$this->IP,$this->MAC,$this->EMPLACEMENT,$this->PRODUCTION);
    }
    public function modify() {
        
        $this->modifyCntr($this->id,$this->Série,$this->BARRE,$this->MONTANT,$this->MODELE,$this->IP,$this->MAC,$this->EMPLACEMENT,$this->PRODUCTION);
    }
    public function delete() {
        if ($this->emptyId() == false) {
            header('Location: ../controle.php?error=noid');
            exit();
        }
        $this->deleteCntr($this->id);
    }
    public function get() {
        $this->getCntr();
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