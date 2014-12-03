<?php

class Prestamo
{
   
    private $_precision = 12;
 
   
    private $_iterador  = 12;
 
    private $_tasaInteres;
 
    private $_capital;
 
    private $_pagos = array();
 
    private $_tablaPagos = array();
 
    public function __construct($precision = 12)
    {
        if (is_int($precision) && $precision > 0) {
            $this->_precision = $precision;
        }
 
        bcscale($this->_precision);
    }
 
    public function setTasaInteres($tasa, $periodos = 1)
    {
        if (!is_numeric($tasa)) {
            throw new \Exception('Tasa de Interes No Valida');
        }
 
        if (is_int($periodos)) {
            $tasa   = bcadd('1', $tasa);
            $period = bcdiv('1', $periodos);
            $tasa   = $this->bcpowx($tasa, $period, $this->_iterador);
            $this->_tasaInteres = bcsub($tasa, '1');
        }
    }
 
   
    public function setIterador($iterador)
    {   
        if (is_int($iterador) ){
            $this->_iterador = $iterador;
        }
    }
 

  
    public function convertirTasa($tasa, $de, $a)
    {
        $retorno        = 0;
        if (is_int($de) && is_int($a) && is_numeric($tasa)) {
            $tasa       = bcadd('1', $tasa);
            $period     = bcdiv($a, $de);
            $tasa       = $this->bcpowx($tasa, $period, $this->_iterador);
            $retorno    = bcsub($tasa, '1');
        }
        return $retorno;
    }
 
 
    public function getTasaInteres()
    {
        return $this->_tasaInteres;
    }
 
   
    public function calcularTasaInteres()
    {   
        if (is_numeric($this->_capital) && $this->_capital > 0 && array_sum($this->_pagos) >= $this->_capital ) {
            $tirP               = array_sum($this->_pagos) / $this->_capital;  
            $this->_tasaInteres = $this->_tir(0, $tirP, 0);             
        } else {
            throw new \Exception('Faltan parametros para calcular la tasa de interes.');
        }
 
        return $this->_tasaInteres;
    }
 
   
    private function _tir($a, $b, $tirc)
    {    
        $tir    = bcdiv(bcadd($a, $b), 2);
        $van    = 0;
        foreach ($this->_pagos as $cuota => $valor) {
            //$van    = $van + $valor / pow((1 + $tir ), $cuota);
            $van = bcadd($van, bcdiv($valor, bcpow(bcadd('1', $tir), $cuota)));
        }
        $van = bcsub($van, $this->_capital);
 
        if (bccomp($tirc, $tir) == 0) {
            return $tir;
        } else {
            if ($van > 0) {
                return $this->_tir($tir, $b, $tir);
            } else {
                return $this->_tir($a, $tir, $tir);
            }
        }
    }
 
   
    public function setCapital($monto)
    {
        if (is_numeric($monto)) {
            $this->_capital = $monto;
        } else {
            throw new \Exception('No se establecio un monto valido.');
        }
    }
 
    
    public function calcCuotaFrancesa($periodos)
    {
        $i          = $this->_tasaInteres;
        $n          = (int) $periodos;
        if (bccomp(0, $this->_tasaInteres) == 0) {
            $cuota  = bcdiv($this->_capital, $n);
        } else {
            $base=  bcadd('1', bcdiv($i,$this->_iterador));
            $power= $periodos;
            $innerResult=  bcpow($base, $power);
            $innerDivider=  bcsub('1', bcdiv('1', $innerResult));
            $numerador  = $this->_capital;
            $divisor    = bcdiv($innerDivider, bcdiv($i, $this->_iterador));
            $cuota      = bcdiv($numerador, $divisor);           
        }
        return $cuota;
    }
 
    
    public function pagos($desde, $hasta, $cuota)
    {
        $desde = (int) $desde;
        $hasta = (int) $hasta;
 
        if (is_numeric($cuota)) {
            for($i = $desde; $i <= $hasta; $i++) {
                $this->_pagos[$i] = $cuota;
            }
        } else {
            throw new \Exception('La cuota no tiene un valor valido.');
        }
    }
 
   
    public function calcTablaDePagos($amortConst = false)
    {
        $i      = $this->_tasaInteres;
        end($this->_pagos);
        $datos  = each($this->_pagos);
        $n      = $datos['key'];
        if ($n <= 0) {
            throw new \Exception('El periodo de pago no puede ser cero.');
        }
 
        if ($amortConst) {
            // Si tenemos Amortizacion Constante entonces la amortizacion es el 
            // Capital dividido el numero de cuotas, si no es asi se toma el 
            // arreglo de pagos para calcular la tabla.
            $c  = bcdiv($this->_capital, $n);
        }
 
        $tabla      = array();
        $tabla[0]['Monto']  = $this->_capital;
        $tabla[0]['Saldo']  = $this->_capital;
        $tabla[0]['Periodo']  = 0;
        $tabla[0]['Amortizacion']  = "";
        $tabla[0]['Interes']  = "";
        $tabla[0]['Cuota']  = "";
        for ($p = 1; $p <= $n; $p++) {
            $tabla[$p]['Periodo']   = $p;
            $tabla[$p]['Monto']     = $tabla[($p-1)]['Saldo'];
            $interes        = bcmul($tabla[$p]['Monto'], bcdiv($this->_tasaInteres,$this->_iterador));
            if ($amortConst) {
                $tabla[$p]['Amortizacion']  = $c;
            } else {
                $tabla[$p]['Amortizacion']  = bcsub( $this->_pagos[$p],$interes);
            }
            $tabla[$p]['Interes']       = $interes;
            $tabla[$p]['Cuota']     = bcadd($tabla[$p]['Amortizacion'], $tabla[$p]['Interes']);
            $tabla[$p]['Saldo']     = bcsub($tabla[$p]['Monto'], $tabla[$p]['Amortizacion']);
        }
   
        $this->_tablaPagos = $tabla;
        return $tabla;
    }
    
    
    
 
    public function getHtmlPrestamo($dec = 2)
    {
        if (count($this->_tablaPagos) < 1) {
            throw new \Exception('No se creo la tabla de pagos. Ejecute calTablaDePagos');
        }
        // Genero el HTML
        echo '<table style="border:solid;" border="1">';
        echo '<td>Periodo</td><td>Monto</td><td>Amort.</td><td>Interes</td><td>Cuota</td><td>Saldo</td>';
        foreach ($this->_tablaPagos as $value) {
            echo '<tr>' . PHP_EOL;
            echo '<td>' . number_format($value['Periodo'], 0, ',', '.')         . '</td>' . PHP_EOL;
            echo '<td>' . number_format($value['Monto'], $dec, ',', '.')        . '</td>' . PHP_EOL;
            echo '<td>' . number_format($value['Amortizacion'], $dec, ',', '.') . '</td>' . PHP_EOL;
            echo '<td>' . number_format($value['Interes'], $dec, ',', '.')      . '</td>' . PHP_EOL;
            echo '<td>' . number_format($value['Cuota'], $dec, ',', '.')        . '</td>' . PHP_EOL;
            echo '<td>' . number_format($value['Saldo'] , $dec, ',', '.')       . '</td>' . PHP_EOL;
            echo '</tr>' . PHP_EOL;
        }
 
        echo '</table>';  
    }
 
 
 
    public function bcfact($fact)
    {
        if($fact == 1) return 1;
        return bcmul($fact, $this->bcfact(bcsub($fact, '1')));
    }    
 
   
    public function bcexp($x, $iters = 7)
    {
        /* Compute e^x. */
        $res = bcadd('1.0', $x);
        for($i = 0; $i < $iters; $i++) {
            $res += bcdiv(bcpow($x, bcadd($i, '2')), $this->bcfact(bcadd($i, '2')));
        }
        return $res;
    }
 
  
    public function bcln($a, $iters = 10)
    {
        $result = "0.0";
        for($i = 0; $i < $iters; $i++) {
            $pow = bcadd("1.0", bcmul($i, "2.0"));
            //$pow = 1 + ($i * 2);
            $mul        = bcdiv("1.0", $pow);
            $fraction   = bcmul($mul, bcpow(bcdiv(bcsub($a, "1.0"), bcadd($a, "1.0")), $pow));
            $result     = bcadd($fraction, $result);
        }
 
        $res = bcmul("2.0", $result);
        return $res;
    }
 
   
    public function bcpowx($a, $b, $iters = 25)
    {
        $ln = $this->bcln($a, $iters);
        return $this->bcexp(bcmul($ln, $b), $iters);
    }
    
    public function getpagos(){
        
        return $this->_pagos;
    }
}
