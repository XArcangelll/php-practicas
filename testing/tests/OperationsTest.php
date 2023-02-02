<?php
use PHPUnit\Framework\TestCase;

class OperationsTest extends TestCase{

    private $op;

    public function setUp():void{
        $this->op = new Operations();
    }

    public function testSumWithTwoValues(){
        $this->assertEquals(7,$this->op->sum(2,5));
    }

    public function testSumWithNullValues(){
       // $this->assertEquals('Value are not numeric',$this->op->sum(NULL,NULL));
       $this->expectException(InvalidArgumentException::class);
       $this->op->sum(NULL,NULL);
    }

    public function testSumWithNotNumericValues(){
        // $this->assertEquals('Value are not numeric',$this->op->sum(NULL,NULL));
        $this->expectException(InvalidArgumentException::class);
        $this->op->sum("a","hello");
     }

     public function testDivWithTwoValues(){
        $this->assertEquals(4,$this->op->div(20,5));
    }

    public function testDivWithNullValues(){
       $this->expectException(InvalidArgumentException::class);
       $this->op->div(NULL,NULL);
    }
 

    public function testDivWithNotNumericValues(){ 
        $this->expectException(InvalidArgumentException::class);
        $this->op->div("a","hello");
     }
     public function testDivWithZeroDenominador(){  
        $this->expectException(DivisionByZeroError::class);
        $this->op->div(5,0);
     }

}

?>