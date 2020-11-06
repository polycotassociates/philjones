<?php

namespace Drupal\texas_migrate_programs\Controller;
use Drupal\Core\Controller\ControllerBase;
/**
 *In case of no default template of module, below markup will be displayed
 */
class TexasProgramsController extends ControllerBase {
  public function content() {



    //take uri string from participant questionnaire and transform into array of values to be mapped to mapped to text list of program names
      //$programs = $value;
      //explode string
    $dates = '11/08/2020&3/23/2020&&10/16/2020';
    //$string = 'DEP-F=B&DEP-L=N&SUSD-F=N&SUSD-L=N&CWWD=B&MAP=N&HTDS-F=N&HTDS-L=N&WAT=N';
    $programs = explode('&', $string);
      //loop over array to see which are not N
      foreach ($programs as &$value) {
        // get everything after =
        $toggle =  ltrim(strstr($value, '='), '=');
        //filter out values we don't need
        if ($toggle == 'N') {
            $value = NULL;
          }else{
            $value = strtolower(substr($value, 0, strpos($value, '=')));
          }
        }
      //remove nulls
    $programs = array_filter($programs);

     //explode string
    $dates = explode('&', $dates);
    //remove nulls
    $dates = array_filter($dates);
    $date = min($dates);
    //$value = $dates;
    //return just program keys
    return array('#markup' => var_dump($date));
  }

}
