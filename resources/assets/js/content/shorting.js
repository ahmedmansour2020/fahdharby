$(document).ready(function() {
    var title = 70;
    var desc = 100;
    $('.shorting-title').each(function(e) {
        var str = $(this).text();
        if (str.length > title) {
            $(this).text(str.substring(0, title) + "...")
        }
    })
    $('.shorting-desc').each(function(e) {
        var str = $(this).text();
        if (str.length > desc) {
            $(this).text(str.substring(0, desc) + "...")
        }
    })

})