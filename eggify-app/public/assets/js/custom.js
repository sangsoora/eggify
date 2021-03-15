$('#select-option-location li').click(function(e) {
    var $that = $(this);
    selectcustom.close(e.target.offsetParent);
});