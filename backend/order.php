<?php 

    include_once 'crud.php';
    include_once 'artikel.php';
    include_once 'klant.php';
    class order extends database {
        public $orderid;
        public $artid;
        public $klantid;
        public $verkorddatum;
        public $verkordbestaantal;
        public $verkordstatus;

        public function __construct($artid, $klantid, $verkorddatum, $verkordbestaantal = 1, $verkordstatus = "in behandeling")
        {
            parent::__construct();
    
            $this->artid = $artid;
            $this->klantid = $klantid;
            $this->verkorddatum = $verkorddatum;
            $this->verkordbestaantal = $verkordbestaantal;
            $this->verkordstatus = $verkordstatus;
        }

        public function insertOrder()
        {
            $this->insert("verkooporders", array("artid" => $this->artid, "klantid" => $this->klantid, "verkorddatum" => $this->verkorddatum, "verkordbestaantal" => $this->verkordbestaantal, "verkordstatus" => $this->verkordstatus));
            return true;
        }

        public function selectKlanten()
        {
            $object = $this->select("klanten", "*");
            return $object;
        }

        public function selectArtikelen()
        {
            $object = $this->select("artikelen", "*");
            return $object;
        }
    }


