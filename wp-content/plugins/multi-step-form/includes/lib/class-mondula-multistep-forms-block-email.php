<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Description of class-mondula-multistep-forms-block-submit
 *
 * @author Gull Ocean
 */
class Mondula_Form_Wizard_Block_Email extends Mondula_Form_Wizard_Block {

    private $_label;
    private $_required;

    protected static $type = "fw-email";

    public function __construct ( $label, $required ) {
        $this->_label = $label;
        $this->_required = $required;
    }

    public function get_required( ) {
      return $this->_required;
    }

    public function render( $ids ) { 
      ?>
      <div class="fw-input-container">
          <h3><?php echo $this->_label ?></h3><input type="text" class="fw-text-input" data-id="email" name="<?php echo strtolower(preg_replace("/[^A-Za-z?!]/",'_',$this->_label)); ?>"><span class="fa fa-envelope form-control-feedback" aria-hidden="true"></span>
      </div>
      <div class="fw-clearfix"></div>
      <?php
    }

    public function as_aa() {
        return array(
            'type' => 'email',
            'label' => $this->_label,
            'required' => $this->_required
        );
    }

    public static function from_aa( $aa , $current_version, $serialized_version ) {
        $label = $aa['label'];
        $required = $aa['required'];
        return new Mondula_Form_Wizard_Block_Email( $label, $required );
    }
}
