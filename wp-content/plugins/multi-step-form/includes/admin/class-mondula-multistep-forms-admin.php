<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of class-mondula-multistep-forms-admin
 *
 * @author Gull Ocean
 */
class Mondula_Form_Wizard_Admin {

    private $_wizard_service;

    private $_token;

    private $_assets_url;

    private $_script_suffix;

    private $_version;

    private $_text_domain;

    public function __construct ( Mondula_Form_Wizard_Wizard_Service $wizard_service, $token, $assets_url, $script_suffix, $version, $text_domain ) {
        $this->_wizard_service = $wizard_service;
        $this->_token = $token;
        $this->_assets_url = $assets_url;
        $this->_script_suffix = $script_suffix;
        $this->_version = $version;
        $this->_text_domain = $text_domain;
        $this->init();
    }

    private function init () {
        add_action( 'admin_menu', array( $this, 'setup_menu' ) );

        add_action( 'wp_ajax_fw_wizard_save', array( $this, 'save' ) );
        add_action( 'wp_ajax_nopriv_fw_wizard_save', array( $this, 'save' ) );
    }

    public function setup_menu () {
        $all = add_menu_page( 'Multi Step Form', 'Multi Step Form', 'manage_options', 'mondula-multistep-forms', array( $this, 'menu' ), 'dashicons-feedback', '35' );
        $add = add_submenu_page( 'mondula-multistep-forms', 'Mondula List Table', 'Add New', 'manage_options', 'mondula-multistep-forms&edit', array( $this, 'menu' ));
        add_action( 'admin_print_styles-' . $all, array( $this, 'admin_js' ) );
        add_action( 'admin_print_styles-' . $add, array( $this, 'admin_js' ) );
    }

    public function admin_js() {
        $edit = isset( $_GET['edit'] );

        if ( $edit ) {
            $id = isset( $_GET['edit'] ) ? $_GET['edit'] : '';
            $json = $this->_wizard_service->get_as_json( $id );
            $i18n = array(
                'title' => __( 'Step Title', $this->_text_domain ),
                'headline' => __( 'Step Headline', $this->_text_domain ),
                'copyText' => __( 'Step description', $this->_text_domain  ),
                'partTitle' => __( 'Section Title', $this->_text_domain ),
                'radioHeader' => __( 'Header', $this->_text_domain ),
                'radioHeading' => __( 'Radio/Checkbox', $this->_text_domain)
            );
            wp_register_script( $this->_token . '-backend', esc_url( $this->_assets_url ) . 'backend' . $this->_script_suffix . '.js', array( 'postbox', 'jquery-ui-dialog', 'jquery-ui-sortable', 'jquery-ui-draggable', 'jquery-ui-droppable', 'jquery-ui-tooltip', 'jquery' ), $this->_version );
            $ajax = array(
                'i18n' => $i18n,
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'id' => $id,
                'nonce' => wp_create_nonce( $this->_token . $id ),
                'json' => $json
            );
            wp_localize_script( $this->_token . '-backend', 'wizard', $ajax ); // array( 'i18n' => $i18n, 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'json' => $json ) );
            wp_enqueue_script( $this->_token . '-backend');

            wp_register_style( $this->_token . '-backend', esc_url( $this->_assets_url ) . 'backend'. $this->_script_suffix. '.css', array(), $this->_version );
            wp_enqueue_style( $this->_token . '-backend' );
        }
    }

    public function menu () {
        $edit_url = esc_url( add_query_arg( array('edit' => '')) );
        $edit = isset($_GET['edit']);
        $delete = isset( $_GET['delete'] );

        if ($edit) {
            $this->edit( $_GET['edit'] );
        } else if ($delete) {
            $this->delete( $_GET['delete'] );
        } else {
//            $this->wizard_list();
            $this->table();
        }
    }

    public function delete( $id ) {
        $this->_wizard_service->delete( $id );
        $this->table();
    }

    public function table ( ) {
        $table = new Mondula_Form_Wizard_List_Table( $this->_wizard_service, $this->_text_domain );
        $table->prepare_items();
        $edit_url = esc_url( add_query_arg( array( 'edit' => '' )));
        ?>
        <div class="wrap">
            <div id="icon-users" class="icon32"></div>
            <h2>Multi Step Forms<a href="<?php echo $edit_url ?>" class="page-title-action"><?php _e( 'Add New', $this->_text_domain ) ?></a></h2>
            <form id="fw-wizard-table" method="get">
                <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
            <?php $table->display(); ?>
            </form>
        </div>
        <?php
    }

    public function wizard_list() {
        $edit_url = esc_url( add_query_arg( array('edit' => '')) );
        ?>
        <div class="wrap">
            <h2>Wizard <a class="add-new-h2" href="<?php echo $edit_url; ?>">Add new</a></h2>
            <ul class="subsubsub"></ul>
            <form>

                <div class="tablenav top"></div>
                <table class="wp-list-table widefat fixed striped posts">
                    <thead>
                        <tr>
                            <th scope="col">Titel</th>
                            <th scope="col">Shortcode</th>
                            <th scope="col">Datum</th>
                        </tr>
                    </thead>
                    <?php

                    ?>
                </table>
            </form>
        </div>
        <?php
    }

    public function edit( $id ) {
        add_thickbox();
        ?>
        <div id="fw-alert">
          Success. Wizard saved.
        </div>
        <div class="wrap">
            <!--<pre>
                <?php //var_dump( $_GET ); var_dump( empty($id ) ); ?>
            </pre> -->
            <!--<button type="button" class="fw-button-save">Save</button>-->
            <h2 class="nav-tab-wrapper">
                <a class="nav-tab nav-tab-active" id="fw-nav-steps">Steps</a>
                <a class="nav-tab" id="fw-nav-settings">Form settings</a>
            </h2>
            <div class="fw-mail-settings-container" style="display:none;">
              <div class="wrap">
                <h1>General settings</h1>
                <table class="form-table">
                    <tr valign="top">
                    <th scope="row">"Thank you"-page:</th>
                    <td>
                      <input type="text" class="fw-settings-thankyou"/>
                      <p class="description">Users will be redirected to this URL after form submit. Leave blank if you don't need one.</p>
                    </td>
                    </tr>
                </table>
                <h1>Mail settings</h1>
                <table class="form-table">
                    <tr valign="top">
                    <th scope="row">Send To:</th>
                    <td>
                      <input type="text" class="fw-mail-to"/>
                      <p class="description">Email address to which the mails are sent</p>
                    </td>
                    </tr>
                    <!-- <tr valign="top">
                    <th scope="row">Send From Email:</th>
                    <td>
                      <input type="text" class="fw-mail-from-mail"/>
                      <p class="description">Email address and name from which the emails are sent. Leave blank for default admin email.</p>
                    </td>
                    </tr> -->
                    <tr valign="top">
                    <th scope="row">Send From Name:</th>
                    <td>
                      <input type="text" class="fw-mail-from-name"/>
                    </td>
                    </tr>
                    <tr valign="top">
                    <th scope="row">Subject:</th>
                    <td>
                      <input type="text" class="fw-mail-subject"/>
                    </td>
                    </tr>

                    <!-- <tr valign="top">
                    <th scope="row">Email Header:</th>
                    <td>
                      <textarea rows="5" cols="55" class="fw-mail-header"></textarea>
                      <p class="description">Introductory text for email</p>
                    </td>
                    </tr> -->
                </table>
                <h1>API Settings</h1>
                <table class="form-table">
                    <tr valign="top">
                    <th scope="row">wl_leadsource:</th>
                    <td>
                      <input type="text" class="fw-wl-leadsource"/>
                    </td>
                    </tr>
                    <tr valign="top">
                    <th scope="row">lp_Comments:</th>
                    <td>
                      <input type="text" class="fw-lp-comments"/>
                    </td>
                    </tr>
                </table>
                <button class="fw-button-save"><?php _e( 'Save' ) ?></button>
              </div>
            </div>
            <div id="fw-elements-container" class="fw-elements-container">
                <div class="postbox-container">
                    <div class="metabox-holder">
                        <div class="postbox">
                            <h3>Multi Step Form</h3>
                            <div class="inside">
                                <div class="fw-elements">
                                    <input type="text" class="fw-wizard-title" value="Form Wizard" placeholder="Form Title">
                                    <a class="fw-element-step"><i class="fa fa-plus"></i> <?php _e( 'Add Step' ) ?></a>
                                </div>
                                <div class="fw-actions">
                                    <button class="fw-button-save"><?php _e( 'Save' ) ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="fw-wizard-container" class="fw-wizard-container"></div>
            <div id="fw-elements-modal">
                <p>Content!</p>
            </div>
            <div id="fw-thickbox-content" style="display:none;">
              <div id="fw-thickbox-radio">Radio/Checkbox</div>
              <!-- <div id="fw-thickbox-select">Select/Dropdown</div> -->
              <div id="fw-thickbox-text">Text field</div>
              <div id="fw-thickbox-email">Email</div>
              <!-- <div id="fw-thickbox-fileupload">File Upload</div> -->
              <!-- <div id="fw-thickbox-textarea">Textarea</div> -->
              <!-- <div id="fw-thickbox-date">Date</div> -->
              <!-- <div id="fw-thickbox-paragraph">Paragraph</div> -->
            </div>

        </div>
        <?php
    }

    public function save() {
        $_POST = stripslashes_deep( $_POST );
        $id = isset( $_POST['id'] ) ? $_POST['id'] : '';
        $nonce = isset( $_POST['nonce'] ) ? $_POST['nonce'] : '';
        $data = isset( $_POST['data'] ) ? $_POST['data'] : array();

        if ( wp_verify_nonce( $nonce, $this->_token . $id ) ) {
           if ( ! empty( $data ) ) {
               $this->_wizard_service->save( $id, $data );
               $response['msg'] = "Success! Wizard saved.";
               wp_send_json_success($response);
           } else {
               wp_send_json_error( array( "errorMsg" => "Data is empty." ) );
           }
        } else {
            wp_send_json_error( array( "errorMsg" => "Nonce failed to verify." ) );
        }

        wp_send_json_error( array( "errorMsg" => 'error' ) );
    }
}
