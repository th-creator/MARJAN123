<?php 
class ImprContr extends Imprs {
    private $id;
    private $Série;
    private $BARRE;
    private $MONTANT;
    private $MODELE; 
    private $IP;
    private $MAC;
    private $AFFECTATION;
    private $PRODUCTION;

    public function __construct($id,$Série='',$BARRE='',$MONTANT='',$MODELE='',$IP='',$MAC='',$AFFECTATION='',$PRODUCTION='')
    {
        $this->id=$id;
        $this->Série=$Série;
        $this->BARRE=$BARRE;
        $this->MONTANT=$MONTANT;
        $this->MODELE=$MODELE;
        $this->IP=$IP;
        $this->MAC=$MAC;
        $this->AFFECTATION=$AFFECTATION;
        $this->PRODUCTION=$PRODUCTION;
    } 
    public function check() {
        
        $this->setImpr($this->Série,$this->BARRE,$this->MONTANT,$this->MODELE,$this->IP,$this->MAC,$this->AFFECTATION,$this->PRODUCTION);
    }
    public function modify() {
        
        $this->modifyImpr($this->id,$this->Série,$this->BARRE,$this->MONTANT,$this->MODELE,$this->IP,$this->MAC,$this->AFFECTATION,$this->PRODUCTION);
    }
    public function delete() {
        if ($this->emptyId() == false) {
            header('Location: ../imprimant.php?error=noid');
            exit();
        }
        $this->deleteImpr($this->id);
    }
    public function get() {
        $this->getImpr();
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