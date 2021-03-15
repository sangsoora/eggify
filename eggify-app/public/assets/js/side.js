var sidenav = {
    
    open: function() {
        
        document.getElementById('sidenav').style.left = "0";
        document.getElementById('overlay').style.display = "block";
        
    },
    
    close: function() {
        
        document.getElementById('sidenav').style.left = "-340px";
        document.getElementById('overlay').style.display = "none";
        
    }
    
}

var sidepopup = {
    
    open: function() {
        
        document.getElementById('sidepopup').style.left = "0";
        
    },
    
    close: function() {
        
        document.getElementById('sidepopup').style.left = "100%";
        
    }
    
}

var sidepopuplogin = {
    
    open: function() {
        
        document.getElementById('sidepopup-login').style.left = "0";
        
    },
    
    close: function() {
        
        document.getElementById('sidepopup-login').style.left = "100%";
        
    }
    
}

var selectcustomHeight = 0;
var selectcustom = {
    
    toggle: function(el) {
        
        var target = $(el).data('target');
        
        if (selectcustomHeight == 0) {
            selectcustomHeight = $(`#${target}`).height();
            $(`#${target}`).height(0);
            $(`#${target}`).show();
        }
        
        if ($(`#${target}`).is(':visible') && $(`#${target}`).height() > 0) {
            $(`#${target}`).height(0);
        } else {
            $(`#${target}`).height(selectcustomHeight);
        }
        
    },
    
    close: function(el) {
        
        $(el).height(0);
        
    }

}