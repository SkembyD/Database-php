----The Schtroumpf Code ----
<?php
class Papier {

}
class Schtroumpf {
  public $color = "Bleu";
  public $bonnet = "Bonnet neuf blanc"
  private $sexualOrientation = "Heureux";

  public function __construct($metier, $pasion){
    $this->metier = $metier;
    $this->passion = $passion;
    echo "Moi Schtroumpf " . $metier . "<br>";
    echo "Ma passion c'est le ". $passion . "<br>"
}
public function __destruct(){
  echo "Moi Schtroumpf " . $this->metier . "<br>";
  echo "Je me meurt...<br>";
  echo "Viva la vida"
}
public function sayMySexualOrientation() {
  return $this->sexualOrientation;
}
private function repare($bonnet) {

}
}
$schtroumpf1 = new Schtroumpf();
echo "Il est " . $schtroumpf1->color . "<br>";
echo "Il est " . $schtroumpf1->sayMySexualOrientation();
