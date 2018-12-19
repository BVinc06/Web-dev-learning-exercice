<?php
	
	include("exo6_head.php");

	include("exo6_nav.php");

	class Voiture 
	{

		private $_modele;
		private $_marque;
		private $_type;

		public function getAttributes()
		{
			echo 'Marque: '. $this->gMarque() . ' Modele: ' . $this->gModele() . ' Type: ' . $this->gType() . '<br>';
		}

		public function gMarque()
		{
			return $this->_marque;
		}

		public function gModele()
		{
			return $this->_modele;
		}

		public function gType()
		{
			return $this->_type;
		}

/////////////////////////////////////////////////////////////////////////

		public function sMarque($Marque)
		{
			$this->_marque=$Marque;

		}

		public function sModele($Modele)
		{
			$this->_modele=$Modele;
			
		}

		public function sType($Type)
		{
			$this->_type=$Type;
			
		}

		public function __construct($Marque, $Modele, $Type){
			$this->sMarque($Marque);
			$this->sModele($Modele);
			$this->sType($Type);
		}

	}

	$v1 = new Voiture("Audi","A1","Citadine");
	$v2 = new Voiture("Volkswagen","Passat","Berline");
	$v3 = new Voiture("Volkswagen","Golf","Compact");
	$v4 = new Voiture("Mazda","CX-5","SUV");

	$v1->getAttributes();
	$v2->getAttributes();
	$v3->getAttributes();
	$v4->getAttributes();

	$v1->sMarque("TOYOTA");

	$v1->getAttributes();

	include("exo6_footer.php");

?>