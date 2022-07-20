<?php 
class SrvContr extends Srvs {
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
    private $C;
    private $D;
    private $E;
    private $F;
    private $SERVEUR;
    private $AFFECTATION;

    public function __construct($id,$Série='',$BARRE='',$MONTANT='',$MODELE='',$DATE='',$RAM='',$OS='',$PROCESSEUR='',$IP='',$MAC='',$VERSION='',$ANTIVIRUS='',$C='',$D='',$E='',$F='',$SERVEUR='',$AFFECTATION='')
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
        $this->C=$C;
        $this->D=$D;
        $this->E=$E;
        $this->F=$F;
        $this->SERVEUR=$SERVEUR;
        $this->AFFECTATION=$AFFECTATION;
    }
    public function check() {
        
        $this->setSrv($this->Série,$this->BARRE,$this->MONTANT,$this->MODELE,$this->DATE,$this->RAM,$this->OS,$this->PROCESSEUR,$this->IP,$this->MAC,$this->VERSION,$this->ANTIVIRUS,$this->C,$this->D,$this->E,$this->F,$this->SERVEUR,$this->AFFECTATION);
    }
    public function modify() {
        
        $this->modifySrv($this->id,$this->Série,$this->BARRE,$this->MONTANT,$this->MODELE,$this->DATE,$this->RAM,$this->OS,$this->PROCESSEUR,$this->IP,$this->MAC,$this->VERSION,$this->ANTIVIRUS,$this->C,$this->D,$this->E,$this->F,$this->SERVEUR,$this->AFFECTATION);
    }
    public function delete() {
        if ($this->emptyId() == false) {
            header('Location: ../serveur.php?error=noid');
            exit();
        }
        $this->deleteSrv($this->id);
    }
    public function get() {
        $this->getSrv();
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