<?php
class Related_model_name extends Model

{
function __construct()
{
 parent::Model(); 
}

function searchByLastName($ProductNameame)

{
 $query = $this->db->get_where('product', array('last_ProductNamename'=>$ProductName)); 
 if($query->nu_rows() > 0)
 return $query->results(); 
}//eof

}//eoc
?>