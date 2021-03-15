var myFunctions = {
    
    goTop: function() {
    
        $('html, body').animate({
            scrollTop: 0
        }, 800, function(){
            // Action on done scrolling
        });

    },
    
    splash: function() {
        
        setTimeout(function(){
            $('#splash').fadeOut();
        }, 2000);
        
    },
    
    anchor: function() {
        
        $('a').on('click', function(event) {
            var hash = this.hash;
            
            if (hash) {
                event.preventDefault();
                
                var $that = $(this);
                var $closest = $that.parent();

                $closest.find('a').removeClass('active');
                $that.addClass('active');

                $('html, body').animate({
                  scrollTop: $(hash).offset().top - $('header').outerHeight()
                }, 800, function(){
                    //window.location.hash = hash;
                });
            
            }
        });
        
    },
    
    collapseParentNext: function(el) {
        
        $(el).next().toggle('blind');
        
    },

    toolsBar: function() {
        
        if ($('body').hasClass('loged-provider')) {
            $('#tools-bar-provider').css('display', 'flex');
        } else {
            $('#tools-bar-general').css('display', 'flex');
        }
        
    },
    
    imagePreview: function(input) {
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var $that = $(input);
            var $preview = $that.parent();
            var $buttonUpload = $that.next();
            var $buttonTrash = $preview.find('button');
            
            reader.onload = function(e) {
                $preview.css('background', `url('${e.target.result}') center / cover no-repeat`);
                $preview.hide();
                $preview.fadeIn(500);
            }
            
            reader.readAsDataURL(input.files[0]);
            
            $buttonUpload.hide();
            $buttonTrash.show();
        }
        
    },
    
    imageTrash: function(el) {
        var $that = $(el);
        var $preview = $that.parent();
        var $input = $preview.find('input');
        var $buttonUpload = $input.next('label');
        var $buttonTrash = $preview.find('button');
        
        $preview.css('background', '');
        $input.val('');
        $buttonUpload.show();
        $buttonTrash.hide();
    },
    
    imageAdd: function(el) {
        var $that = $(el);
        var $wp = $that.closest('wp');
        
        // Add other img preview whith trash button
        
        // Trigger input file select image
        
    },
    
    imageRemove: function(el) {
        var $that = $(el);
        var $wp = $that.closest('wp');
        
        // 
        
    },
    
    ajax: function (data, method, action, $button, testMode = false) {

        var beforeButtonText = $button.text();

        // Spinner ON
        $button.prop("disabled", true);
        $button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');
        
        if (testMode) {
            setTimeout(function() {
                // Spinner OFF
                $button.html(beforeButtonText);
            }, 2000);
            
            return true;
        } else {

            $.ajax({
                data: data,
                type: method,
                url: action,
                success: function (data) {
                    // Spinner OFF
                    $button.html(beforeButtonText);

                    if (data.status == 200) {
                        return true;
                    } else if (data.status == 500) {
                        return false;
                    }
                },
                error: function (a, b, c) {
                    // Spinner OFF
                    $button.prop("disabled", false);
                    $button.html(beforeButtonText);

                    return false;
                }
            });
            
        }

    }
    
}