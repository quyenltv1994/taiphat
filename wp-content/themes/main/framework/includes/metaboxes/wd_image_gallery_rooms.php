<?php
    global $post;
?>

    <div id="gallery_images_container">

        <ul class="gallery_images">
            <?php

    $image_gallery 	= get_post_meta( $post->ID, '_easy_image_gallery', true );
    $attachments 	= array_filter( explode( ',', $image_gallery ) );

    if ( $attachments )
        foreach ( $attachments as $attachment_id ) {
            echo '<li class="image attachment details" data-attachment_id="' . $attachment_id . '"><div class="attachment-preview"><div class="thumbnail">
                            ' . wp_get_attachment_image( $attachment_id, 'thumbnail' ) . '</div>
                            <a href="#" class="delete check" title="' . __( 'Remove image', 'easy-image-gallery' ) . '"><div class="media-modal-icon"></div></a>
                           
                        </div></li>';
        }
?>
        </ul>


        <input type="hidden" id="image_gallery" name="image_gallery" value="<?php echo esc_attr( $image_gallery ); ?>" />
        <?php wp_nonce_field( 'easy_image_gallery', 'easy_image_gallery' ); ?>

    </div>
    <p class="add_gallery_images hide-if-no-js">
    <a href="#"><?php _e( 'Add gallery images', 'easy-image-gallery' ); ?></a>
    </p>
    <?php

    // options don't exist yet, set to checked by default
    if ( ! get_post_meta( get_the_ID(), '_easy_image_gallery_link_images', true ) )
        $checked = ' checked="checked"';
    else
        $checked = easy_image_gallery_has_linked_images() ? checked( get_post_meta( get_the_ID(), '_easy_image_gallery_link_images', true ), 'on', false ) : '';

?>
 <p>
        <label for="easy_image_gallery_link_images">
            <input type="checkbox" id="easy_image_gallery_link_images" value="on" name="easy_image_gallery_link_images"<?php echo $checked; ?> /> <?php _e( 'Link images to larger sizes', 'easy-image-gallery' )?>
        </label>
    </p>
    <?php
    /**
     * Props to WooCommerce for the following JS code
     */
?>
    <script type="text/javascript">
        jQuery(document).ready(function($){

            // Uploading files
            var image_gallery_frame;
            var $image_gallery_ids = $('#image_gallery');
            var $gallery_images = $('#gallery_images_container ul.gallery_images');

            jQuery('.add_gallery_images').on( 'click', 'a', function( event ) {

                var $el = $(this);
                var attachment_ids = $image_gallery_ids.val();

                event.preventDefault();

                // If the media frame already exists, reopen it.
                if ( image_gallery_frame ) {
                    image_gallery_frame.open();
                    return;
                }

                // Create the media frame.
                image_gallery_frame = wp.media.frames.downloadable_file = wp.media({
                    // Set the title of the modal.
                    title: '<?php _e( 'Add Images to Gallery', 'easy-image-gallery' ); ?>',
                    button: {
                        text: '<?php _e( 'Add to gallery', 'easy-image-gallery' ); ?>',
                    },
                    multiple: true
                });

                // When an image is selected, run a callback.
                image_gallery_frame.on( 'select', function() {

                    var selection = image_gallery_frame.state().get('selection');

                    selection.map( function( attachment ) {

                        attachment = attachment.toJSON();

                        if ( attachment.id ) {
                            attachment_ids = attachment_ids ? attachment_ids + "," + attachment.id : attachment.id;

                             $gallery_images.append('\
                                <li class="image attachment details" data-attachment_id="' + attachment.id + '">\
                                    <div class="attachment-preview">\
                                        <div class="thumbnail">\
                                            <img src="' + attachment.url + '" />\
                                        </div>\
                                       <a href="#" class="delete check" title="<?php _e( 'Remove image', 'easy-image-gallery' ); ?>"><div class="media-modal-icon"></div></a>\
                                    </div>\
                                </li>');

                        }

                    } );

                    $image_gallery_ids.val( attachment_ids );
                });

                // Finally, open the modal.
                image_gallery_frame.open();
            });

            // Image ordering
            $gallery_images.sortable({
                items: 'li.image',
                cursor: 'move',
                scrollSensitivity:40,
                forcePlaceholderSize: true,
                forceHelperSize: false,
                helper: 'clone',
                opacity: 0.65,
                placeholder: 'eig-metabox-sortable-placeholder',
                start:function(event,ui){
                    ui.item.css('background-color','#f6f6f6');
                },
                stop:function(event,ui){
                    ui.item.removeAttr('style');
                },
                update: function(event, ui) {
                    var attachment_ids = '';

                    $('#gallery_images_container ul li.image').css('cursor','default').each(function() {
                        var attachment_id = jQuery(this).attr( 'data-attachment_id' );
                        attachment_ids = attachment_ids + attachment_id + ',';
                    });

                    $image_gallery_ids.val( attachment_ids );
                }
            });

            // Remove images
            $('#gallery_images_container').on( 'click', 'a.delete', function() {

                $(this).closest('li.image').remove();

                var attachment_ids = '';

                $('#gallery_images_container ul li.image').css('cursor','default').each(function() {
                    var attachment_id = jQuery(this).attr( 'data-attachment_id' );
                    attachment_ids = attachment_ids + attachment_id + ',';
                });

                $image_gallery_ids.val( attachment_ids );

                return false;
            } );

        });
    </script>