<?php
class Hooks_code_monkey extends Hooks
{

  function control_panel__add_to_head()
  {
    if (in_array(URL::getCurrent(), array('/publish', '/member'))) {
      $css = "<link href='http://fonts.googleapis.com/css?family=Source+Code+Pro' rel='stylesheet' type='text/css'>" . $this->css->link('code_monkey.css');
      $js  = $this->js->link('vendor/ace/src-min-noconflict/ace.js');

      return $css . $js;
    }
  }

}
