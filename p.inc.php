<?php
class Pilot{
    private $name;
    private $birthDate;
    private $nationality;
    private $code;

    public function __construct($n, $bd, $nat, $c){
        $this -> name = $n;        
        $this -> birthDate = $bd;        
        $this -> nationality = $nat;        
        $this -> code = $c;        
    }

    public function toString(){
        return '<table>
        <tr>
            <td>név:</td>
            <td>'. $this -> name .'</td>            
        </tr>
        <tr>
            <td>nemzetiség:</td>
            <td>'. $this -> nationality .'</td>            
        </tr>
        <tr>
            <td>születési dátum:</td>
            <td>'. $this -> birthDate .'</td>            
        </tr>
        </table>';        
    }

    public function getCode(){
        return $this -> code;
    }
    
    public function getName(){
        return $this -> name;
    }

    public function getBirthDate(){
        return $this -> birthDate;
    }

    public function isCodeValid($code) {
        return preg_match('/^[A-Za-z]{3}$/', $code) === 1;
    }

    public function evElsoNapjanSzuletettE(){
        $tmp = explode('.', $this -> birthDate);
        if (count($tmp) == 3 && $tmp[1] == '01' && $tmp[2] == '01'){
            return true;
        }
        return false;
    }
}