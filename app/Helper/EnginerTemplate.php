<?php
/**
 * Created by PhpStorm.
 * User: phuon
 * Date: 2/26/2017
 * Time: 12:21 PM
 */

namespace App\Helper;


use Illuminate\Support\Facades\Blade;

class EnginerTemplate
{
    public  static function Init(){

    }

    public static  function input($datas,$errors){
        if(!isset($datas['value'])){
            $datas['value'] ="";
        }
        echo "<div class='form-group'>";
        if(isset($datas['label'])){
            echo "<label>".$datas['label']."</label>";
        }
        echo "<input ";
        if(isset($datas['id'])){
            echo " id = '".$datas['id']."' ";
        }
        if(isset($datas['type'])){
            echo " type = '".$datas['type']."' ";
        }
        echo " name='".$datas['name']."' ";
        echo " class= 'form-control ";
        if(isset($datas['class'])){
            echo $datas['class']."' ";
        }else{
            echo "' ";
        }
        if(isset($datas['other'])){
            echo $datas['other']." ";
        }
        if(isset($datas['placeholder'])){
            echo "placeholder ='".$datas['placeholder']."' ";
        }
        $val = (old($datas['name']))? old($datas['name']) : $datas['value'];
        echo "value= '".$val."'";
        echo " />";
        if ($errors->has($datas['name'])){
            echo '<span class="help-block">';
            echo '<strong>'. $errors->first($datas['name']) .'</strong>';
            echo '</span>';
        }
        echo "</div>";
    }

    public static function  textarea($datas,$errors){
        if(!isset($datas['value'])){
            $datas['value'] ="";
        }
        echo "<div class='form-group'>";
        if(isset($datas['label'])){
            echo "<label>".$datas['label']."</label>";
        }
        $input = "<textarea ";
        if(isset($datas['id'])){
            $input .= " id = '".$datas['id']."' ";
        }
        $input .= " name='".$datas['name']."' ";
        $input .= " class= 'form-control ";
        if(isset($datas['class'])){
            $input .= $datas['class']."' ";
        }else{
            $input .= "' ";
        }
        if(isset($datas['other'])){
            $input .= $datas['other']." ";
        }
        if(isset($datas['rows'])){
            $input .= "rows='".$datas['rows']."' ";
        }
        $val = (old($datas['name']))? old($datas['name']) : $datas['value'];
        $input .= " >".$val."</textarea>";
        echo  $input;
        if ($errors->has($datas['name'])){
            echo '<span class="help-block">';
            echo '<strong>'. $errors->first($datas['name']) .'</strong>';
            echo '</span>';
        }
        echo "</div>";
    }

    public static function  select($input,$errors){
        $datas = $input['datas'];
        $name = $input['name'];
        $val_name = $input['val-name'];
        $val_data = $input['val-data'];
        $val =  old($name)? old($name) : (isset($input['value']) ? $input['value'] : "");
        $label = isset($input['label'])?$input['label']: "";
        echo '<div class="form-group">';
        echo '<label>'.$label.'</label>';
        echo '<select class="form-control" name="'.$name.'">';
        echo '<option value="0">Please choose </option>';
        foreach($datas as $item){
            echo '<option value="'.$item->{$val_data}.'" ';
            echo ($item->{$val_data} == $val )? "selected" : "";
            echo '>'.$item->{$val_name}.'</option>';
        };
        echo  '</select>';
         echo '</div>';
    }
}