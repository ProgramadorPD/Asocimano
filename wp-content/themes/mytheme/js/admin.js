var customUploader;

function addMediaButton( that ) {
 
    if ( customUploader ) {
        customUploader.open();
        return( false );
    }

    customUploader = wp.media.frames.file_frame = wp.media( {
        title: 'Choose Image',
        button: {
            text: 'Choose Image'
        },
        multiple: false
    } );

    customUploader.on( 'select' , function() {
        attachment = customUploader.state().get( 'selection' ).first().toJSON();
        that.parent().find( 'input[data-id="image-input"]' ).val( attachment.url );
    } );

    customUploader.open();
    return( false );
}