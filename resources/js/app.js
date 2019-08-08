
import $ from 'jquery';
window.$ = window.jQuery = $;
require('./bootstrap');

function triTag(tags) {
    var tagArray = tags.split(',').map( function(tag) {
        tag = tag.trim();
        return tag.substr(0,1).toUpperCase()+ tag.substr(1,tag.length).toLowerCase();
    });

    tagArray = tagArray.filter( function(val){return val !== '' } );

    var result = [];
    tagArray.forEach(function(item) {
        if(result.indexOf(item) < 0) {
            result.push(item);
        }
    });
    tagArray = result;

    tagArray.sort(function (a, b) {
        return a.toLowerCase().localeCompare(b.toLowerCase());
    });

    tags = tagArray.join(', ');

    return tags;
};

$('.clicTag').click(function(event){
    event.preventDefault();
    var inputTag = $('#inputTag');
    var tags = inputTag.val();
    var tag = $(this).data('value')
    tags = tags + ', ' + tag;
    inputTag.val(triTag(tags));
    $('.clicTag').blur();
});

$('#inputTag').keypress(function(e){
    if (e.key === ','){
        var inputTag = $('#inputTag');
        var tags = inputTag.val();
        inputTag.val(triTag(tags));
    }
});

