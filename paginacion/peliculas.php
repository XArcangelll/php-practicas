<?php

include_once 'db.php';

class Peliculas extends DB{

    private $paginaActual;
    private $totalPaginas;
    private $nResultados;
    private $resultadosPorPagina;
    private $indice;

    private $error = false;

    function __construct($nPorPagina)
    {
        //inicializar el constructor el contrusticor de la bd si no lo llamamos el constructor se llamara antes q el consutrctor de db
        //si se ejecuta antes clase pelicula  y no se ejecuta el constructor db significa q habra problemas porq no funcionaran los querys
        parent::__construct();

        $this->resultadosPorPagina = $nPorPagina;
        $this->indice = 0;
        $this->paginaActual = 1;
        $this->calcularPaginas();
    }

    function calcularPaginas(){
        $query = $this->connect()->query("SELECT COUNT(*) AS total FROM pelicula");
        $this->nResultados = $query->fetch(PDO::FETCH_OBJ)->total;
        $this->totalPaginas = round($this->nResultados / $this->resultadosPorPagina);
       

        if(isset($_GET["pagina"])){

            if(is_numeric($_GET["pagina"])){
                    if($_GET["pagina"] >=1 && $_GET["pagina"] <= $this->totalPaginas){
                        $this->paginaActual = $_GET["pagina"];
                        $this->indice = ($this->paginaActual - 1) * ($this->resultadosPorPagina);
                      
                    }else{
                            echo "No existe esa página";
                            $this->error = true;
                    }
            }else{
                    echo "Error al mostrar la página";
                    $this->error = true;
            }

        
        }
    }

    function mostrarPeliculas(){
        if(!$this->error){
                $query = $this->connect()->prepare('SELECT * FROM pelicula LIMIT :pos, :n');
                $query->execute(["pos" => $this->indice, "n" =>$this->resultadosPorPagina]);

                foreach($query as $pelicula){
                    include 'vista-pelicula.php';
                     
                }
        }else{
                echo "error";
        }
    }

    function mostrarPaginas(){

        $actual = "";

        echo "<ul>";
            for($i=0; $i<$this->totalPaginas;$i++){

                    if(($i + 1) == $this->paginaActual){
                        $actual = ' class="actual" ';
                    }else{
                        $actual = "";
                    }

                    echo '<li><a '.$actual .' href="?pagina=' . ($i+1) . '">' .($i +1) . '</a></li>';
            }
        echo "</ul>";
    }

    function mostrarTotalResultados(){
        return $this->nResultados;
    }


}

?>