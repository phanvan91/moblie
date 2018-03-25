<?php
function dequy($data,$parent_id=0,$str='Cha: ',$select=0){
  foreach($data as $value){
    if($value['parent_id'] == $parent_id){
      if($select !=0 && $value['id'] == $select){
        echo '<option value="'. $value['id'] .'" selected >'.$str.$value['name'].' </option>';
      }else{
        echo '<option value="'. $value['id'] .'" >'.$str.$value['name'].' </option>';
      }

      dequy($data,$value['id'],$str.'----  Con: ',$select);
    }
  }
}
function liscate($data,$parent_id=0,$str=''){
  foreach($data as $value){
    if($value['parent_id'] == $parent_id){
      echo '<tr class="odd gradeX">
              <td></td>';

              if($value['parent_id'] == 0){
                echo '<td> <b>'.$str.$value['name'].'</b></td>';
              }else{
                echo '<td>'.$str.$value['name'].'</td>';
              };

              if($value['active'] == 1){
                echo '<td style="color:red" ><b> Active </b></td>';
              }else{
                echo '<td> No </td>';
              }


              echo '<td class="center"> <a href="'.URL::route('getcateedit',$value['id']).'"> <span class="glyphicon glyphicon-edit"></span> </a> </td>
              <td class="center"> <a href=""> <span class="glyphicon glyphicon-trash"></span> </a> </td>
            </tr>';
            liscate($data,$value['id'],$str.'--');
    }

  }
}
 ?>
