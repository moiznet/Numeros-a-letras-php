<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?



class Numeros
{

public $unidades = array("cero", "uno","dos","tres","cuatro","cinco","seis","siete","ocho","nueve");
public $decenas = array("-", "diez", "veinti","treinta","cuarenta","cincueta","secenta","setenta","ochenta","noventa");
public $centenas = array("-", "ciento","doscientos","trecientos","cuatrocientos","quinientos","seicientos","setecientos","ochocientos","novecientos");
public $cifras;



public function __construct($numero) {
	
					$str = (string) $numero;
					$arr1 = str_split($str);
					$cantidad_digitos = count($arr1);
					$residuo = fmod($cantidad_digitos, 3);
					$cantida_miles = $cantidad_digitos / 3;  
					
					
					$this -> str  = (string) $numero;
					$this -> arr1= str_split($str);
					$this -> cantidad_digitos = count($arr1);
					$this -> residuo = fmod($cantidad_digitos, 3);
					$this -> cantida_miles = $cantidad_digitos / 3;  
					
					
					$this -> primerapartedelnumero();	
									
									 } //function __construct




public function trse($a_0,$a_1,$a_2){

	
	
		$numerfinal_1 = $this -> centenas[$a_0]." ".$this -> decenas[$a_1]." y ".$this -> unidades[$a_2];
		return $numerfinal_1;
		
									}//function trse




function unidad($unidad) {
	
		$numerfinal_x = $this -> unidades[$unidad];
		return $numerfinal_x;
									
									}//function unidad($unidad)




function decena($decenanum1,$decenanum2) {
	



		 $numerfinal_x = $this -> decenas[$decenanum1]." y ".$this -> unidades[$decenanum2];
		return $numerfinal_x;

										}//function decena






public function primerapartedelnumero() {
      


			if ($this -> residuo == 1) {
			$this -> cifras[] =$this ->  unidad($this -> arr1[0]);
			unset($this -> arr1[0]);
			$this -> strx = array_values($this -> arr1);
			$this -> cantida_miles = $this -> cantida_miles -1;
			} // si el residuo es 1 digito

	
	
			if ($this -> residuo == 2) {
			$this -> cifras[] = $this -> decena($this -> arr1[0],$this -> arr1[1]);	
			unset($this -> arr1[0]);
			unset($this -> arr1[1]);
			$this -> strx = array_values($this -> arr1);
			$this -> cantida_miles = $this -> cantida_miles -1;
			} // si el residuo es 2 digito




			if ($this -> residuo == 0) {
			$this -> cifras[] = $this -> trse($this -> arr1[0],$this -> arr1[1],$this -> arr1[2]);	
			unset($this -> arr1[0]);
			unset($this -> arr1[1]);
			unset($this -> arr1[2]);
			$this -> strx = array_values($this -> arr1);
			$this -> cantida_miles = $this -> cantida_miles -2;
			} // si el residuo es 0 digito



			$this -> strxstrig = implode("",$this -> strx); // paso el array a string
			$this -> arr_ds3 = str_split($this -> strxstrig, 3); // divido el string en grupos de a tres en un arreglo



			for ($i = 0, $i2 = 1; $i <= $this ->cantida_miles; $i++, $i2++) {
			$this -> {'arrgrupo'.$i2} = str_split($this ->arr_ds3[$i]);
			} // divido cada grupo en un arreglo independiente



			for ($i = 0, $i2 = 1; $i <= $this ->cantida_miles; $i++, $i2++) { 
			$this -> cifras[] = $this -> trse($this ->{'arrgrupo'.$i2}[0],$this ->{'arrgrupo'.$i2}[1],$this ->{'arrgrupo'.$i2}[2]);
			}// paso a letra cada array con tres digitos a letra por el m,etodo trse(,,,)


			$this -> cifras = array_reverse($this -> cifras); // invertimos orden de los elementos en arreglo para poder contar miles y millones.


			for ($i = 0, $o = 0; $o <= $this ->cantida_miles; $i++, $o++) {
				if ($i%2==0) // Vemos si 54 dividido en 2 da resto 0 si lo da
{ $this -> milesomillo[$o] = " mil " ; } //escribo Par
else //Sino
{ $this -> milesomillo[$o] = " millones " ; } //Escribo impar
				
					
			} // creo un arreglo por medio de for con los elementos mil y illones para mesclar con el arreglo invertido en letra.
				
		
			
 if ($this ->cantida_miles < 0  ) {
	 $total_letra = $this -> cifras;
	 
	 }else{
			$total_letra = $this -> array_interlace($this -> cifras, $this -> milesomillo); 
 }




			$total_letra = array_reverse($total_letra); // invertimos orden de los elementos de nuevo al derecho
	
	
			
 		
			
		$separado_por_comas = implode("", $total_letra);
		$newphrase = str_replace("- - y cero mil - - y cero",".", $separado_por_comas);
		$newphrase = str_replace("y cero","", $newphrase);
		$newphrase = str_replace("-","", $newphrase);
		
		
		$newphrase = str_replace("diez y uno","once", $newphrase);
		$newphrase = str_replace("diez y dos","doce", $newphrase);
		$newphrase = str_replace("diez y tres","trece", $newphrase);
		$newphrase = str_replace("diez y cuatro","catroce", $newphrase);
		$newphrase = str_replace("diez y cinco","quince", $newphrase);
		
		$newphrase = str_replace("veinti y ","veinti", $newphrase);
		$newphrase = str_replace("veinti ","veinte", $newphrase);
		
		
		
		
		
		
		echo $newphrase;
		
    } // function primerapartedelnumero() end




public function array_interlace() {  // funcion para interlazar a dos arreglos en este caso el valor en letras invertido con el arreglo que dice mil y mi9llones
				$args = func_get_args(); 
				$total = count($args); 
			
				if($total < 2) { 
					return FALSE; 
				} 
				
				$i = 0; 
				$j = 0; 
				$arr = array(); 
				
				foreach($args as $arg) { 
					foreach($arg as $v) { 
						$arr[$j] = $v; 
						$j += $total; 
					} 
					
					$i++; 
					$j = $i; 
				} 
				
				ksort($arr); 
				return array_values($arr); 
}  // function array_interlace() end
	
} // class Numeros

?>



<?

$numero = $_POST["numero"];
$lola = new Numeros($numero); 

 ?>


<br />
<br />

<form action="#" method="post">

<input name="numero" type="text" value="<? echo $numero; ?>" />

</form>





</body>
</html>
