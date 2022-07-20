<?php 
class PcContr extends Pcs {
    private $id;
    private $Série;
    private $BARRE;
    private $MONTANT;
    private $MODELE; 
    private $DATE;
    private $RAM;
    private $OS;
    private $PROCESSEUR;
    private $IP;
    private $MAC;
    private $VERSION;
    private $ANTIVIRUS;
    private $CAPACITE;
    private $PC;
    private $AFFECTATION;

    public function __construct($id,$Série='',$BARRE='',$MONTANT='',$MODELE='',$DATE='',$RAM='',$OS='',$PROCESSEUR='',$IP='',$MAC='',$VERSION='',$ANTIVIRUS='',$CAPACITE='',$PC='',$AFFECTATION='')
    {
        $this->id=$id;
        $this->Série=$Série;
        $this->BARRE=$BARRE;
        $this->MONTANT=$MONTANT;
        $this->MODELE=$MODELE;
        $this->DATE=$DATE;
        $this->RAM=$RAM;
        $this->OS=$OS;
        $this->PROCESSEUR=$PROCESSEUR;
        $this->IP=$IP;
        $this->MAC=$MAC;
        $this->VERSION=$VERSION;
        $this->ANTIVIRUS=$ANTIVIRUS;
        $this->CAPACITE=$CAPACITE;
        $this->PC=$PC;
        $this->AFFECTATION=$AFFECTATION;
    } 
    public function check() {
        
        $this->setPc($this->Série,$this->BARRE,$this->MONTANT,$this->MODELE,$this->DATE,$this->RAM,$this->OS,$this->PROCESSEUR,$this->IP,$this->MAC,$this->VERSION,$this->ANTIVIRUS,$this->CAPACITE,$this->PC,$this->AFFECTATION);
    }
    public function modify() {
        
        $this->modifyPc($this->id,$this->Série,$this->BARRE,$this->MONTANT,$this->MODELE,$this->DATE,$this->RAM,$this->OS,$this->PROCESSEUR,$this->IP,$this->MAC,$this->VERSION,$this->ANTIVIRUS,$this->CAPACITE,$this->PC,$this->AFFECTATION);
    }
    public function delete() {
        if ($this->emptyId() == false) {
            header('Location: ../pc.php?error=noid');
            exit();
        }
        $this->deletePc($this->id);
    }
    public function get() {
        $this->getPc();
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