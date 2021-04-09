// General
$(document).ready(function () {

    myFunctions.splash();

    myFunctions.anchor();

    myFunctions.toolsBar();

});

$('.collapse-parent-next').click(function (e) {

    var $that = $(this);

    if ($that.hasClass('la-angle-down')) {
        $that.removeClass('la-angle-down');
        $that.addClass('la-angle-up');
    } else if ($that.hasClass('la-angle-up')) {
        $that.removeClass('la-angle-up');
        $that.addClass('la-angle-down');
    }

    myFunctions.collapseParentNext(e.target.parentElement);

});

$('#go-top button').click(function () {

    myFunctions.goTop();

});

// Login
/*$('#login-client').submit(function(e) {

    e.preventDefault();

    var testMode = true;
    var data = $(this).serialize();
    var method = $(this).attr('method');
    var action = $(this).attr('action');
    var $button = $(this).find('button[type=submit]');

    if (myFunctions.ajax(data, method, action, $button, testMode)) {
        window.location.href = '/';
    } else {
        // TODO: Show error

    }

});*/

// Results.html
$('#select-option-location li').click(function (e) {

    var $that = $(this);
    selectcustom.close(e.target.offsetParent);
    window.location.href = $that.data('link');

});

// Signup.html
$('#signup-client').submit(function (e) {

    e.preventDefault();

    let hasError = false;

    // Validates
    if (!$('.job-category button.active').length) {
        hasError = true;
        $('#signup-validation-modal').find('.modal-body p').text('Por favor, selecciona donde trabajas');
    }

    if (!hasError && !$('.job-type button.active').length) {
        hasError = true;
        $('#signup-validation-modal').find('.modal-body p').text('Por favor, selecciona el tipo de trabajo');
    }

    // ###

    if (hasError) {
        $('#signup-validation-modal').modal('show');
    } else {
        $('#signup-validation-modal').modal('hide');
        $('#signup-validation-modal').find('.modal-body p').text('');

        var testMode = false;
        var data = $(this).serializeArray();
        var method = $(this).attr('method');
        var action = $(this).attr('action');
        var $button = $(this).find('button[type=submit]');

        // Aditional data
        data.push({name: 'operator_job_id', value: $('.job-category button.active').data('id')});
        data.push({name: 'operator_job_tag_id', value: $('.job-type button.active').data('id')});

        var beforeButtonText = $button.text();

        // Spinner ON
        $button.prop("disabled", true);
        $button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');

        $.ajax({
            data: data,
            type: method,
            url: action,
            success: function (data) {
                // Spinner OFF
                $button.html(beforeButtonText);

                if (data.status == 200) {
                    $('#signup-modal-done').modal("show");
                } else if (data.status == 500) {
                    $('#signup-modal-error').find('.modal-body p').text(data.message);
                    $('#signup-modal-error').modal("show");
                    $button.prop("disabled", false);
                }
            },
            error: function (a, b, c) {
                // Spinner OFF
                $button.prop("disabled", false);
                $button.html(beforeButtonText);

                $('#signup-modal-error').modal("show");
            }
        });
    }

});

$('#signup-provider').submit(function (e) {

    e.preventDefault();

    let hasError = false;

    // Validates
    if (!$('.categories button.active').length) {
        hasError = true;
        $('#signup-validation-modal').find('.modal-body p').text('Por favor, selecciona el producto o servicio que ofreces');
    }

    // ###

    if (hasError) {
        $('#signup-validation-modal').modal('show');
    } else {
        $('#signup-validation-modal').modal('hide');
        $('#signup-validation-modal').find('.modal-body p').text('');

        var data = $(this).serializeArray();
        var method = $(this).attr('method');
        var action = $(this).attr('action');
        var $button = $(this).find('button[type=submit]');

        // Aditional data
        data.push({name: 'provider_category_id', value: $('.categories button.active').data('id')});

        var beforeButtonText = $button.text();

        // Spinner ON
        $button.prop("disabled", true);
        $button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');

        $.ajax({
            data: data,
            type: method,
            url: action,
            success: function (data) {
                // Spinner OFF
                $button.html(beforeButtonText);

                if (data.status == 200) {
                    $('#signup-modal-done').modal("show");
                } else if (data.status == 500) {
                    $('#signup-modal-error').find('.modal-body p').text(data.message);
                    $('#signup-modal-error').modal("show");
                    $button.prop("disabled", false);
                }
            },
            error: function (a, b, c) {
                // Spinner OFF
                $button.prop("disabled", false);
                $button.html(beforeButtonText);

                $('#signup-modal-error').modal("show");
            }
        });
    }

});

$('#edit-operator').submit(function (e) {

    e.preventDefault();

    let hasError = false;

    // Validates
    if (!$('#company-employees button.active').length) {
        hasError = true;
        $('#validation-modal').find('.modal-body p').text('Por favor, selecciona la cantidad de empleados de tu compañía');
    }

    if (!hasError && !$('#jobs button.active').length) {
        hasError = true;
        $('#validation-modal').find('.modal-body p').text('Por favor, selecciona donde trabajas');
    }

    if (!hasError && !$('.job-type button.active').length) {
        hasError = true;
        $('#validation-modal').find('.modal-body p').text('Por favor, selecciona el tipo de trabajo');
    }
    // ###

    if (hasError) {
        $('#validation-modal').modal('show');
    } else {
        $('#validation-modal').modal('hide');
        $('#validation-modal').find('.modal-body p').text('');

        //var fd = new FormData($(this)[0]);
        //var fd = new FormData();
        var fd = new FormData($(this)[0]);
        var method = $(this).attr('method');
        var action = $(this).attr('action');
        var $button = $(this).find('button[type=submit]');

        // Aditional data
        fd.append('operator_employees_id', $('#company-employees button.active').data('id'));
        fd.append('operator_job_id', $('#jobs button.active').data('id'));
        fd.append('operator_job_tag_id', $('.job-type button.active').data('id'));
        var beforeButtonText = $button.text();

        console.log(Object.fromEntries(fd));


        // Spinner ON
        $button.prop("disabled", true);
        $button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');

        $.ajax({
            data: fd,
            type: method,
            url: action,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            processData: false,
            contentType: false,
            success: function (data) {
                // Spinner OFF
                $button.html(beforeButtonText);

                if (data.status == 200) {
                    $('#signup-modal-done').modal("show");
                } else if (data.status == 500) {
                    $('#signup-modal-error').find('.modal-body p').text(data.message);
                    $('#signup-modal-error').modal("show");
                    $button.prop("disabled", false);
                }
            },
            error: function (a, b, c) {
                // Spinner OFF
                $button.prop("disabled", false);
                $button.html(beforeButtonText);

                $('#signup-modal-error').modal("show");
            }
        });
    }


});

$('#edit-provider-showcase').submit(function (e) {

    e.preventDefault();

    var fd = new FormData($(this)[0]);
    var method = $(this).attr('method');
    var action = $(this).attr('action');
    var $button = $(this).find('button[type=submit]');

    var beforeButtonText = $button.text();

    // Spinner ON
    $button.prop("disabled", true);
    $button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');

    $.ajax({
        data: fd,
        type: method,
        url: action,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        processData: false,
        contentType: false,
        success: function (data) {
            // Spinner OFF
            $button.html(beforeButtonText);

            if (data.status == 200) {
                $('#signup-modal-done').modal("show");
            } else if (data.status == 500) {
                $('#signup-modal-error').find('.modal-body p').text(data.message);
                $('#signup-modal-error').modal("show");
                $button.prop("disabled", false);
            }
        },
        error: function (a, b, c) {
            // Spinner OFF
            $button.prop("disabled", false);
            $button.html(beforeButtonText);

            if (a.status == 422) {
                $('#signup-modal-error').find('.modal-body p').text("Revisa las descripciones, hay palabras vulgares!");
                $('#signup-modal-error').modal("show");
                $button.prop("disabled", false);
            } else {
                $('#signup-modal-error').modal("show");
            }
        }
    });

});

$('#edit-provider').submit(function (e) {

    e.preventDefault();

    let hasError = false;

    // Validates
    if (!$('.provider-category button.active').length) {
        hasError = true;
        $('#validation-modal').find('.modal-body p').text('Por favor, selecciona el producto o servicio');
    }

    if (!$('.employee button.active').length) {
        hasError = true;
        $('#validation-modal').find('.modal-body p').text('Por favor, selecciona la cantidad de empleados de tu compañía');
    }
    // ###

    if (hasError) {
        $('#validation-modal').modal('show');
    } else {
        $('#validation-modal').modal('hide');
        $('#validation-modal').find('.modal-body p').text('');

        var fd = new FormData($(this)[0]);
        var method = $(this).attr('method');
        var action = $(this).attr('action');
        var $button = $(this).find('button[type=submit]');

        // Aditional data
        fd.append('provider_category_id', $('.provider-category button.active').data('id'));
        fd.append('provider_employees_id', $('.employee button.active').data('id'));

        var beforeButtonText = $button.text();

        // Spinner ON
        $button.prop("disabled", true);
        $button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');

        $.ajax({
            data: fd,
            method: method,
            url: action,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            processData: false,
            contentType: false,
            success: function (data) {
                // Spinner OFF
                $button.html(beforeButtonText);

                if (data.status == 200) {
                    $('#signup-modal-done').modal("show");
                } else if (data.status == 500) {
                    $('#signup-modal-error').find('.modal-body p').text(data.message);
                    $('#signup-modal-error').modal("show");
                    $button.prop("disabled", false);
                }
            },
            error: function (a, b, c) {
                // Spinner OFF
                $button.prop("disabled", false);
                $button.html(beforeButtonText);

                $('#signup-modal-error').modal("show");
            }
        });
    }


});

$('#option-add').submit(function (e) {

    e.preventDefault();

    let hasError = false;

    // Validates
    if (!$('.recommended button.active').length) {
        hasError = true;
        $('#validation-modal').find('.modal-body p').text('Por favor, selecciona si recomiendas el proveedor');
    }
    // ###

    if (hasError) {
        $('#validation-modal').modal('show');
    } else {
        $('#validation-modal').modal('hide');
        $('#validation-modal').find('.modal-body p').text('');

        var fd = new FormData($(this)[0]);
        var method = $(this).attr('method');
        var action = $(this).attr('action');
        var $button = $(this).find('button[type=submit]');

        // Aditional data
        fd.append('recommended', $('.recommended button.active').data('value'));

        $('.rating-criteria').each(function (index) {
            let id = $(this).attr('data-id');
            let num = $(this).find('.stars span.checked').last().attr('data-num');

            fd.append('ratings_criteria[]', [id, num]);
        });
        // ###

        var beforeButtonText = $button.text();

        // Spinner ON
        $button.prop("disabled", true);
        $button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');

        $.ajax({
            data: fd,
            method: method,
            url: action,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            processData: false,
            contentType: false,
            success: function (data) {
                // Spinner OFF
                $button.html(beforeButtonText);

                if (data.status == 200) {
                    $('#modal-done').modal("show");
                } else if (data.status == 500) {
                    $('#modal-error').find('.modal-body p').text(data.message);
                    $('#modal-error').modal("show");
                    $button.prop("disabled", false);
                }
            },
            error: function (a, b, c) {
                // Spinner OFF
                $button.prop("disabled", false);
                $button.html(beforeButtonText);

                $('#modal-error').modal("show");
            }
        });
    }

});

$('#message-add').submit(function (e) {

    e.preventDefault();

    var fd = new FormData($(this)[0]);
    var method = $(this).attr('method');
    var action = $(this).attr('action');
    var $button = $(this).find('button[type=submit]');

    var beforeButtonText = $button.text();

    // Spinner ON
    $button.prop("disabled", true);
    $button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');

    $.ajax({
        data: fd,
        method: method,
        url: action,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        processData: false,
        contentType: false,
        success: function (data) {
            // Spinner OFF
            $button.html(beforeButtonText);

            if (data.status == 200) {
                $('#modal-done').modal("show");
            } else if (data.status == 500) {
                $('#modal-error').find('.modal-body p').text(data.message);
                $('#modal-error').modal("show");
                $button.prop("disabled", false);
            }
        },
        error: function (a, b, c) {
            // Spinner OFF
            $button.prop("disabled", false);
            $button.html(beforeButtonText);

            $('#modal-error').modal("show");
        }
    });

});

$('#login-client').submit(function (e) {

    e.preventDefault();

    var fd = new FormData($(this)[0]);
    var method = $(this).attr('method');
    var action = $(this).attr('action');
    var $button = $(this).find('button[type=submit]');
    var beforeButtonText = 'Acceder';

    // Spinner ON
    $button.prop("disabled", true);
    $button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');

    $.ajax({
        data: fd,
        method: method,
        url: action,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        processData: false,
        contentType: false,
        success: function (data) {
            if (data.status == 200) {
                window.location.href = data.link;
            } else if (data.status == 500) {
                // Spinner OFF
                $button.html(data.message);
                $button.prop("disabled", false);
            }
        },
        error: function (a, b, c) {
            // Spinner OFF
            $button.html('Error!');
            $button.prop("disabled", false);
        }
    });

});

// Profile
$(".img-input").change(function () {
    myFunctions.imagePreview(this);
});

// Images
$(".img-input-gallery").change(function () {
    myFunctions.imageGalleryPreview(this);
});
