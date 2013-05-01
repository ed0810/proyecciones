<?php
class proyecciones{
	public function suma($x){
		$suma = 0;
		for( $i = 0; $i < count($x); $i++){
			$suma += $x[$i];
		}
		return $suma;
	}

	public function a($x, $y, $b){
		$a = $this->suma($y)/count($x) - $b * $this->suma($x)/count($x);
		
		return $a;
	}

	public function b($x, $y, $xx, $xy){
		$b = 0;
		$b = (count($x) * $this->suma($xy)-$this->suma($x) * $this->suma($y))/(count($x)* $this->suma($xx)-$this->suma($x)*$this->suma($x));
		return $b;
	}
	

	public function cuadrado($x){
		for($i = 0; $i < count($x); $i++){
			$xx[$i] = $x[$i]*$x[$i];
		}
		return $xx;
	}

	public function xy($x, $y){
		for($i = 0; $i < count($x); $i++){
			$xy[$i] = $x[$i]*$y[$i];
		}
		return $xy;
	}
}
?>