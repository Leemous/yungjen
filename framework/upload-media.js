
var widget_form;
 
jQuery('.upload_multiple_image_button').live('click', function( event ){

    var file_frame;
 
    widget_form = jQuery(this).parent().parent().parent().parent();
    event.preventDefault();
 
    if ( file_frame ) {
      file_frame.open();
      return;
    }

    file_frame = wp.media.frames.file_frame = wp.media({
        title: jQuery( this ).data( 'uploader_title' ),
        button: {
            text: jQuery( this ).data( 'uploader_button_text' ),
        },
        multiple: true,
        library: {
            type: 'image'
        }
    });
 
    file_frame.on( 'select', function() {
        
        var list = widget_form.find("ul.img-preview");
        var urls_input = widget_form.find("input.img_urls");
        var captions_input = widget_form.find("input.img_captions");
        var selection = file_frame.state().get('selection');
        var urls = "";
        var captions = "";
        list.empty();
        selection.map( function( attachment ) {
            attachment = attachment.toJSON();
            li = jQuery("<li></li>");
            img = jQuery("<img/>");
            img.attr("src",attachment.url);
            urls = urls + attachment.url + ";";
            captions = captions + attachment.title + ";";
            img.appendTo(li);
            li.appendTo(list);
        });
        urls_input.val(urls);
        captions_input.val(captions);
      });
 
    // Finally, open the modal
    file_frame.open();
});

jQuery('.upload_image_button').live('click', function( event ){

    var file_frame;
 
    widget_form = jQuery(this).parent().parent().parent().parent();
    event.preventDefault();
 
    if ( file_frame ) {
      file_frame.open();
      return;
    }

    file_frame = wp.media.frames.file_frame = wp.media({
        title: jQuery( this ).data( 'uploader_title' ),
        button: {
            text: jQuery( this ).data( 'uploader_button_text' ),
        },
        multiple: false,
        library: {
            type: 'image'
        }
    });
 
    file_frame.on( 'select', function() {
        
        var img = widget_form.find("img.banner");
        var url_input = widget_form.find("input.img_url");
        
        var selection = file_frame.state().get('selection');
        var url = "";
        selection.map( function( attachment ) {
            attachment = attachment.toJSON();
            if (img.length == 0) {
                img = jQuery("<img class='banner' />");
            };
            img.attr("src",attachment.url);
            url = attachment.url;
        });
        url_input.val(url);
        widget_form.find(".widget-content").append(img);
      });
 
    // Finally, open the modal
    file_frame.open();
});


jQuery('.post_meta_gallery_upload').live('click', function( event ){

    var file_frame;

    input = jQuery(this).next();
    event.preventDefault();

    var val = input.val().replace("http://", "");
    //var ids = JSON.parse("[" + val + "]");
    attr = {};
    attr.include = val;

    var shortcode = new wp.shortcode({
         tag:     'gallery',
         attrs:   attr
    });
    var attachments, selection,
    defaultPostId = wp.media.gallery.defaults.id;

    if ( _.isUndefined( shortcode.get('id') ) && ! _.isUndefined( defaultPostId ) )
        shortcode.set( 'id', defaultPostId  );
 
    attachments = wp.media.gallery.attachments( shortcode );
    selection = new wp.media.model.Selection( attachments.models, {
        props:    attachments.props.toJSON(),
        multiple: true
    });
     
    selection.gallery = attachments.gallery;
 
    // Fetch the query's attachments, and then break ties from the
    // query to allow for sorting.
    selection.more().done( function() {
        // Break ties with the query.
        selection.props.set({ query: false });
        selection.unmirror();
        selection.props.unset('orderby');
    });
 
    if ( file_frame ) {
      file_frame.open();
      return;
    }

    file_frame = wp.media.frames.file_frame = wp.media({
        //title: jQuery( this ).data( 'uploader_title' ),
        button: {
            text: jQuery( this ).data( 'uploader_button_text' ),
        },
        frame:      'post',
        state:      'gallery-edit',
        title:      wp.media.view.l10n.editGalleryTitle,
        editing:    true,
        multiple: true,
        selection:  selection,
        library: {
            type: 'image'
        }
    });

    file_frame.on( 'update', function() {
        var controller = file_frame.states.get('gallery-edit');
        var library = controller.get('library');
        // Need to get all the attachment ids for gallery
        var ids = library.pluck('id');
        input.val(ids.toString());
    });
 
    // Finally, open the modal
    file_frame.open();
});

jQuery('.post_meta_image_upload').live('click', function( event ){

    var file_frame;

    input = jQuery(this).next();
    event.preventDefault();
 
    if ( file_frame ) {
      file_frame.open();
      return;
    }

    file_frame = wp.media.frames.file_frame = wp.media({
        title: jQuery( this ).data( 'uploader_title' ),
        button: {
            text: jQuery( this ).data( 'uploader_button_text' ),
        },
        multiple: false,
        library: {
            type: 'image'
        }
    });
 
    file_frame.on( 'select', function() {
        var url = "";
        var selection = file_frame.state().get('selection');
        selection.map( function( attachment ) {
            attachment = attachment.toJSON();
            if (input.attr( 'id' ) == 'favicon') {
                input.val(attachment.url);
                input.next().attr('src',attachment.url);
            }else{
                 input.val(attachment.url);
            }
           
        });
        
      });
 
    // Finally, open the modal
    file_frame.open();
});

jQuery('.post_meta_audio_upload').live('click', function( event ){

    var file_frame;

    input = jQuery(this).parent().parent().parent().find("textarea");
    event.preventDefault();
 
    if ( file_frame ) {
      file_frame.open();
      return;
    }

    file_frame = wp.media.frames.file_frame = wp.media({
        title: jQuery( this ).data( 'uploader_title' ),
        button: {
            text: jQuery( this ).data( 'uploader_button_text' ),
        },
        multiple: false,
        library: {
            type: 'audio'
         }
    });
 
    file_frame.on( 'select', function() {
        var url = "";
        var selection = file_frame.state().get('selection');
        selection.map( function( attachment ) {
            attachment = attachment.toJSON();
            input.html(attachment.url);
        });
        
      });
 
    // Finally, open the modal
    file_frame.open();
});




