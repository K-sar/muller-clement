import $ from 'jquery';
window.$ = window.jQuery = $;

function triTag(tags) {
    var tagArray = tags.split(',').map( function(tag) {
        return tag.trim();
    });

    tagArray = tagArray.filter( function(val){return val !== '' } );

    tagArray.forEach(function (value, index) {
        tagArray[index] = value.substr(0,1).toUpperCase()+	value.substr(1,value.length).toLowerCase();
    });

    tagArray.sort();

    tagArray = jQuery.unique(tagArray);

    tags = tagArray.join(', ');

    return tags;
};

$('.clicTag').click(function(){
    var inputTag = $('#inputTag');
    var tags = inputTag.val();
    var tag = $(this).data('value')
    tags = tags + ', ' + tag;
    inputTag.val(triTag(tags));
});

$('#inputTag').keypress(function(e){
    if (e.which === 44){
        var inputTag = $('#inputTag');
        var tags = inputTag.val();
        inputTag.val(triTag(tags));
    }
});

