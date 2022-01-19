<?php

namespace App\Classes;
use Illuminate\Support\Str;

class RobotClass
{

    protected $x;
    protected $y;
    protected $face;  /*  0 - North
                          1 - South
                          2 - East
                          3 - West   */ 

    public function __construct()
    {
        $this->x = 0;
        $this->y = 0;
        $this->face = 0;

    }

    public function place($x,$y,$face)
    {
       $face = Str::lower($face);
        if(!ctype_digit(strval($x)))
            return "X VALUE IS NOT AN INTEGER";
         
        if(!ctype_digit(strval($y)))
            return "Y VALUE IS NOT AN INTEGER";
    
        if($x>4)
        return "X COORDINATE IS BIGGER THAN THE BOARDS DIMENSION";

        if($y>4)
        return "Y COORDINATE IS BIGGER THAN THE BOARDS DIMENSION";
        
        if(strcmp($face,'west')&&strcmp($face,'east')&&strcmp($face,'north')&&strcmp($face,'south'))
        return "FACING VALUE IS UNCLEAR";
        else
        {
            $this->x = $x;
            $this->y = $y;
            if(!strcmp($face,'north')) $this->face = 0;
            if(!strcmp($face,'south')) $this->face = 1;
            if(!strcmp($face,'east')) $this->face = 2;
            if(!strcmp($face,'west')) $this->face = 3;
            
            return "1";
         }

    }

    public function move()
    {
        $txtFace = "";
        if($this->face == 0){
            $txtFace = "NORTH";
            if($this->y +1 > 4) // return -1 if robot goes beyond board
                return -1;
            else
                $this->y = $this->y +1;
        }
        if($this->face == 1){
            $txtFace = "SOUTH";
            if($this->y  == 0) 
                return -1;
            else
                $this->y = $this->y -1;
        }

        if($this->face == 2){
            $txtFace = "EAST";
            if($this->x +1 > 4) 
                return -1;
            else
                $this->x = $this->x +1;
        }

        if($this->face == 3){
            $txtFace = "WEST";
            if($this->x  == 0) 
                return -1;
            else
                $this->x = $this->x -1;
        }
        return "MOVED ROBOT FACING: ".$txtFace." NEW POSITION: ".$this->x." ".$this->y;    
    }

    public function left()
    {
        $txtFace = "";
        if($this->face == 0){
            $this->face = 3; //turn to west
            $txtFace = "WEST";
        }
        elseif($this->face == 1){
            $this->face = 2; //turn to east
            $txtFace = "EAST";
        }
        elseif($this->face == 2){
            $this->face = 0; // turn to north
            $txtFace = "NORTH";
        }elseif($this->face == 3){
            $this->face = 1; // turn to south
            $txtFace = "SOUTH";
        }else{
            return -1;
        }

        return "ROTATED LEFT. NEW FACE: " . $txtFace;
    }

    public function right()
    {
    
        $txtFace = "";
        if($this->face == 0){
            $this->face = 2; //turn to east
            $txtFace = "EAST";
        }
        elseif($this->face == 1){
            $this->face = 4; //turn to west
            $txtFace = "WEST";
        }
        elseif($this->face == 2){
            $this->face = 1; // turn to south
            $txtFace = "SOUTH";
        }elseif($this->face == 3){
            $this->face = 0; // turn to north
            $txtFace = "NORTH";
        }

        return "ROTATED NORTH. NEW FACE: " . $txtFace;
    }

}
