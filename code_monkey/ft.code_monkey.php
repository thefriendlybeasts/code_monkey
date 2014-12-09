<?php
class Fieldtype_code_monkey extends Fieldtype
{
  public function render()
  {
    // Config settings.
    $config    = $this->getConfig();
    $height    = array_get($this->field_config, 'height',     $config['height']) . 'px';
    $theme     = array_get($this->field_config, 'theme',      $config['theme']);
    $soft_tabs = array_get($this->field_config, 'soft_tabs',  $config['soft_tabs']);
    $tab_size  = array_get($this->field_config, 'tab_size',   $config['tab_size']);
    $mode      = array_get($this->field_config, 'mode',       $config['mode']);
    $required  = ($this->is_required) ? 'data-required="true"' : '';

    $data = HTML::convertEntities($this->field_data);
    $html = "<input type='hidden' name='".$this->fieldname."' id='".$this->field_id."' value='".$data."' $required>".
            "<div id='ace_$this->field_id' class='code_monkey_editor' style='height:$height'></div>";
    $js   = $this->js->inline('
              $(function() {
                // Get this party started.
                var editor_'.$this->field_id.' = ace.edit("ace_'.$this->field_id.'");
                editor_'.$this->field_id.'.setTheme("ace/theme/'.$theme.'");
                editor_'.$this->field_id.'.getSession().setMode("ace/mode/'.$mode.'");
                editor_'.$this->field_id.'.getSession().setUseSoftTabs('.$soft_tabs.');
                editor_'.$this->field_id.'.getSession().setTabSize('.$tab_size.');

                // Store input and its value in vars.
                var $input_'.$this->field_id.' = $(\'#'.$this->field_id.'\'),
                    value_'.$this->field_id.'  = $input_'.$this->field_id.'.val();

                // Load value into Ace editor.
                editor_'.$this->field_id.'.getSession().setValue(value_'.$this->field_id.');

                // After editing, update value of input.
                editor_'.$this->field_id.'.on("blur", function(){
                  value_'.$this->field_id.' = editor_'.$this->field_id.'.getSession().getValue();
                  $input_'.$this->field_id.'.val(value_'.$this->field_id.');
                });
              });
            ');

    return Parse::template("{{ noparse }}$html{{ /noparse }}$js", array());
  }
}
