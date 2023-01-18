<?php

	function Multiplicar($n1, $n2){
			return $n1 * $n2;
	}

	function esNumero($n1,$n2){
		if(is_numeric($n1) && is_numeric($n2)){
			return true;
		}else{
			false;
		}
	}

	function mostrarError(){
		echo "<span class='error'>Ingresa solo números</span>";
	}

	function validarCampos(){
		if(isset($_POST["numero01"]) && isset($_POST["numero02"])){
			$n1 = $_POST["numero01"];
			$n2 = $_POST["numero02"];
				if(esNumero($n1,$n2)){
					echo Multiplicar($n1,$n2);
				}else{
					mostrarError();
				}
		}
	}




?>