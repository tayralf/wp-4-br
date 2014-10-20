<?php 
  $s1 = 'a:9:{s:23:"pa_vehicle-manufacturer";a:6:{s:4:"name";s:23:"pa_vehicle-manufacturer";s:5:"value";s:0:"";s:8:"position";s:1:"0";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}s:14:"pa_product-kit";a:6:{s:4:"name";s:14:"pa_product-kit";s:5:"value";s:0:"";s:8:"position";s:1:"1";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}s:15:"pa_vehicle-type";a:6:{s:4:"name";s:15:"pa_vehicle-type";s:5:"value";s:0:"";s:8:"position";s:1:"2";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}s:15:"pa_product-type";a:6:{s:4:"name";s:15:"pa_product-type";s:5:"value";s:0:"";s:8:"position";s:1:"3";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}s:15:"pa_product-line";a:6:{s:4:"name";s:15:"pa_product-line";s:5:"value";s:0:"";s:8:"position";s:1:"4";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}s:16:"pa_product-group";a:6:{s:4:"name";s:16:"pa_product-group";s:5:"value";s:0:"";s:8:"position";s:1:"5";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}s:7:"pa_fuel";a:6:{s:4:"name";s:7:"pa_fuel";s:5:"value";s:0:"";s:8:"position";s:1:"6";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}s:17:"pa_product-origin";a:6:{s:4:"name";s:17:"pa_product-origin";s:5:"value";s:0:"";s:8:"position";s:1:"7";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}s:8:"pa_brand";a:6:{s:4:"name";s:8:"pa_brand";s:5:"value";s:0:"";s:8:"position";s:1:"8";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}';
  $s2= 'a:6:{s:23:"pa_vehicle-manufacturer";a:6:{s:4:"name";s:23:"pa_vehicle-manufacturer";s:5:"value";s:0:"";s:8:"position";s:1:"0";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}s:14:"pa_product-kit";a:6:{s:4:"name";s:14:"pa_product-kit";s:5:"value";s:0:"";s:8:"position";s:1:"1";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}s:15:"pa_vehicle-type";a:6:{s:4:"name";s:15:"pa_vehicle-type";s:5:"value";s:0:"";s:8:"position";s:1:"2";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}s:15:"pa_product-type";a:6:{s:4:"name";s:15:"pa_product-type";s:5:"value";s:0:"";s:8:"position";s:1:"3";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}s:15:"pa_product-line";a:6:{s:4:"name";s:15:"pa_product-line";s:5:"value";s:0:"";s:8:"position";s:1:"4";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}s:8:"pa_brand";a:6:{s:4:"name";s:8:"pa_brand";s:5:"value";s:0:"";s:8:"position";s:1:"8";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}';
  $s3 = 'a:1:{s:7:"pa_fuel";a:6:{s:4:"name";s:7:"pa_fuel";s:5:"value";s:0:"";s:8:"position";s:1:"8";s:10:"is_visible";i:1;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}';
  $s4 = 'a:1:{s:7:"pa_fuel";a:6:{s:4:"name";s:7:"pa_fuel";s:5:"value";s:0:"";s:8:"position";s:1:"8";s:10:"is_visible";i:0;s:12:"is_variation";i:0;s:11:"is_taxonomy";i:1;}}'; 
  echo '<pre>';
  echo print_r(unserialize($s1), true);
  echo '</pre>';
  echo '<pre>';
  echo print_r(unserialize($s2), true);
  echo '</pre>';
  echo '<pre>';
  echo $s3;
  echo '</pre>';
  echo '<pre>';
  echo print_r(unserialize($s3), true);
  echo '</pre>';
  echo '<pre>';
  echo $s4;
  echo '</pre>';
  echo '<pre>';
  echo print_r(unserialize($s4), true);
  echo '</pre>';
?>
