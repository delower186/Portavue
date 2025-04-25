<?php 
/**
 * Contact Form 7
 */

 function portavue_create_cf7_form() {
    if (class_exists('WPCF7_ContactForm')) {
        $form_title = 'Portavue_Contact_Form';

        // Check if the form already exists
        $existing_form = get_page_by_title($form_title, OBJECT, 'wpcf7_contact_form');

        if (!$existing_form) {
            // Define the form content
            $form_content = '<div class="row gy-4">

  <div class="col-12">
    [text* your-name class:form-control placeholder "Your Name"]
  </div>

  <div class="col-12">
    [email* your-email class:form-control placeholder "Your Email"]
  </div>

  <div class="col-12">
    [text* your-subject class:form-control placeholder "Subject"]
  </div>

  <div class="col-12">
    [textarea* your-message class:form-control rows:6 placeholder "Message"]
  </div>

  <div class="col-12 text-center">
    [submit class:btn class:btn-submit class:w-100 "Submit Message"]
  </div>

</div>';

            // Create a new form template
            $cf7 = WPCF7_ContactForm::get_template();
            $cf7->set_title($form_title);
            $cf7->set_properties([
                'form' => $form_content
            ]);
            $cf7->save();
        }
    }
}
add_action('after_switch_theme', 'portavue_create_cf7_form');
?>
