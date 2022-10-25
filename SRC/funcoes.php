<?php


class Funcoes{
    /*

    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

     * */
    public function SeculoAno(int $ano): int {
        $sec = $ano/100;
        if(is_int($sec)){
            return $sec;
        }else{
            $roundSec = round($sec, 0);
            $diferenca = $roundSec - $sec;
            if($diferenca<=0.5 && $diferenca > 0){
                return $roundSec;
            }else{
                return $roundSec + 1;
            }
            
        }
    }

    
	
	
	
	
	
	
	
	/*

    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23

     * */
    public function PrimoAnterior(int $numero): int {
        if($numero > 0){
            for($cont = 2; $cont<$numero; $cont++){
                if($numero%$cont  == 0){
                    return $this->PrimoAnterior($numero-1);
                }
            }
            return $numero;
        }
    }









    /*

    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

    Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

     * */
    
    public function SegundoMaior(array $arr): int {
        $arrM = [];
        $arrM = array_map(function($el){
            $bigNumber = array_reduce($el,function($nAnt, $n){
                return ($n>$nAnt)?$n:$nAnt;
            },0);
            return $bigNumber;
        }, $arr);
        sort($arrM);
        return $arrM[array_key_last($arrM) - 1];
    }
	
	
	
	
	
	
	

    /*
   Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste 

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
         -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false
    [1, 3, 2]  true
    [1, 2, 1, 2]  false
    [3, 6, 5, 8, 10, 20, 15] false
    [1, 1, 2, 3, 4, 4] false
    [1, 4, 10, 4, 2] false
    [10, 1, 2, 3, 4, 5] true
    [1, 1, 1, 2, 3] false
    [0, -2, 5, 6] true
    [1, 2, 3, 4, 5, 3, 5, 6] false
    [40, 50, 60, 10, 20, 30] false
    [1, 1] true
    [1, 2, 5, 3, 5] true
    [1, 2, 5, 5, 5] false
    [10, 1, 2, 3, 4, 5, 6, 1] false
    [1, 2, 3, 4, 3, 6] true
    [1, 2, 3, 4, 99, 5, 6] true
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true
    [3, 5, 67, 98, 3] true

     * */

	public function SequenciaCrescente(array $arr): bool {
        static $i = 0;
        static $repleceN = [];
        $nRepeat = array_unique(array_diff_assoc( $arr, array_unique( $arr ) ) );
        if(count($nRepeat)== 1){
           $arr = array_unique($arr);
           $i++;
           return $this->SequenciaCrescente($arr);
        }else if(count($nRepeat)== 0){
            if($i<count($arr) -1){
                $isCrescent = $arr[$i]< $arr[$i+1];
                if($isCrescent){
                    $i++;
                    return $this->SequenciaCrescente($arr);
                }else{
                    if($i>0){
                        if(!array_search($arr[$i-1], $repleceN)){
                            array_push($repleceN, $arr[$i]);
                        }
                    }else{
                        array_push($repleceN, $arr[$i]);
                    }
                    $i++;
                    return $this->SequenciaCrescente($arr);
                }
            }else{
                var_dump($repleceN);
                if(count($repleceN)<=1){
                    return true;
                }else{
                    return false;
                }
            }
        }else{
            return false;
        }
        //var_dump(array_intersect($arr, $arrC));
        
    }
}

$func = new Funcoes;
//echo $func->SeculoAno(2001);
//echo $func->PrimoAnterior(16);
$arr = [
    [1,2,300],
    [10,700,30],
    [50,100,200],
    [50,500,200]
];
//if($func->SequenciaCrescente([0, -2, 5, 6])){
  //  echo"true";
//}else{
//    echo"false";
//}
//echo $func->SegundoMaior($arr);