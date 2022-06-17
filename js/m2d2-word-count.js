jQuery(document).ready(function () {
    //run code after page load
    // Look at the form and count each keyup or keydown on field with included class
        jQuery(document).on('keyup' , '.m2d2-check-word-count textarea', (updateCount));//this targets the textarea with the custom class added.
        jQuery(document).on('keydown' , '.m2d2-check-word-count textarea', (updateCount));

        function updateCount() {
            var cs = jQuery.trim(this.value).length ? this.value.match(/\S+/g).length + " words used of 800 word limit." : 0;
            // Update the word count inside the HTML form field description
            jQuery('.m2d2-check-word-count .gfield_description').text(cs);
        }
    }
);
    