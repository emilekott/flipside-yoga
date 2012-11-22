jQuery(document).ready(function() {
    chooseDisplay(jQuery("select#ait-sliderType").val());

    jQuery("select#ait-sliderType").click(function(){
        chooseDisplay(jQuery("select#ait-sliderType").val());
    });
});

function chooseDisplay(value){
    switch(value){
        case "anything":
	        hideMetabox('#ait-sliderAliases-option');
	        hideMetabox('#ait-sliderAlternative-option');
	        showMetabox('#ait-sliderCategory-option');
            showMetabox('#ait-sliderAnimTime-option');
            showMetabox('#ait-sliderDelayTime-option');
            showMetabox('#ait-sliderImageHeight-option');
        break;
        case "revolution":
	        showMetabox('#ait-sliderAliases-option');
	        showMetabox('#ait-sliderAlternative-option');
	        hideMetabox('#ait-sliderCategory-option');
            hideMetabox('#ait-sliderAnimTime-option');
            hideMetabox('#ait-sliderDelayTime-option');
            hideMetabox('#ait-sliderImageHeight-option');
        break;
    }
}

function hideMetabox(id){
    jQuery(id).hide();
}

function showMetabox(id){
    jQuery(id).show();
}