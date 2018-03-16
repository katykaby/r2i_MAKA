/*
 *  Document   : base_forms_wizard.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Form Wizard Page
 */

var BaseFormWizard = function() {
    // Init simple wizard, for more examples you can check out http://vadimg.com/twitter-bootstrap-wizard-example/
    var initWizardSimple = function(){
        jQuery('.js-wizard-simple').bootstrapWizard({
            'tabClass': '',
            'firstSelector': '.wizard-first',
            'previousSelector': '.wizard-prev',
            'nextSelector': '.wizard-next',
            'lastSelector': '.wizard-last',
            'onTabShow': function($tab, $navigation, $index) {
        var $total      = $navigation.find('li').length;
        var $current    = $index + 1;
        var $percent    = ($current/$total) * 100;

                // Get vital wizard elements
                var $wizard     = $navigation.parents('.block');
                var $progress   = $wizard.find('.wizard-progress > .progress-bar');
                var $btnPrev    = $wizard.find('.wizard-prev');
                var $btnNext    = $wizard.find('.wizard-next');
                var $btnFinish  = $wizard.find('.wizard-finish');

                // Update progress bar if there is one
        if ($progress) {
                    $progress.css({ width: $percent + '%' });
                }

        // If it's the last tab then hide the last button and show the finish instead
        if($current >= $total) {
                    $btnNext.hide();
                    $btnFinish.show();
        } else {
                    $btnNext.show();
                    $btnFinish.hide();
        }
            }
        });
    };

    // Init wizards with validation, for more examples you can check out http://vadimg.com/twitter-bootstrap-wizard-example/
    var initWizardValidation = function(){
        // Get forms
        var $form1 = jQuery('.js-form1');
        var $form2 = jQuery('.js-form2');

        // Prevent forms from submitting on enter key press
        $form1.add($form2).on('keyup keypress', function (e) {
            var code = e.keyCode || e.which;

            if (code === 13) {
                e.preventDefault();
                return false;
            }
        });

        // Init form validation on classic wizard form
        var $validator1 = $form1.validate({
            errorClass: 'help-block animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'validation-classic-ville': {
                    required: true,
                    minlength: 2
                }
            },
            messages: {
                'validation-classic-ville': {
                    required: 'Please enter a ville'
                   
                }
            }
        });

        // Init form validation on the other wizard form
        var $validator2 = $form2.validate({
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group .form-material').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'ville': {
                    required: true
                    
                },
                 'dep': {
                    required: true
                    
                },
                'tridept':{
                    required: true,
                    minlength: 3,
                    maxlength:3
                    
                },
                'id_nro': {
                    required: true
                    
                },
                'taille': {
                    required: true
                    
                },
                'date_mad_site_origine':{
                    required: true
                }
                
            },
            messages: {
                 'tridept': {
                    required: 'Veillez saisir le trigramme département',
                    minlength: 'le trigramme doit contenir 3 nombres',
                    maxlength: 'le trigramme doit contenir 3 nombres'
                    
                },
                'ville': 'Veillez choisir la ville',
                'dep': 'Veillez choisir le département',
                'id_nro': 'Veillez choisir le nro',
                'taille': 'Veillez saisir la taille',
                'date_mad_site_origine':'La Date Mise à disposition site Origine est obligatoire'
               
            }
        });

        // Init classic wizard with validation
        jQuery('.js-wizard-classic-validation').bootstrapWizard({
            'tabClass': '',
            'previousSelector': '.wizard-prev',
            'nextSelector': '.wizard-next',
            'onTabShow': function($tab, $nav, $index) {
        var $total      = $nav.find('li').length;
        var $current    = $index + 1;

                // Get vital wizard elements
                var $wizard     = $nav.parents('.block');
                var $btnNext    = $wizard.find('.wizard-next');
                var $btnFinish  = $wizard.find('.wizard-finish');

        // If it's the last tab then hide the last button and show the finish instead
        if($current >= $total) {
                    $btnNext.hide();
                    $btnFinish.show();
        } else {
                    $btnNext.show();
                    $btnFinish.hide();
        }
            },
            'onNext': function($tab, $navigation, $index) {
                var $valid = $form1.valid();

                if(!$valid) {
                    $validator1.focusInvalid();

                    return false;
                }
            },
            onTabClick: function($tab, $navigation, $index) {
        return false;
            }
        });

        // Init wizard with validation
        jQuery('.js-wizard-validation').bootstrapWizard({
            'tabClass': '',
            'previousSelector': '.wizard-prev',
            'nextSelector': '.wizard-next',
            'onTabShow': function($tab, $nav, $index) {
        var $total      = $nav.find('li').length;
        var $current    = $index + 1;

                // Get vital wizard elements
                var $wizard     = $nav.parents('.block');
                var $btnNext    = $wizard.find('.wizard-next');
                var $btnFinish  = $wizard.find('.wizard-finish');

        // If it's the last tab then hide the last button and show the finish instead
        if($current >= $total) {
                    $btnNext.hide();
                    $btnFinish.show();
        } else {
                    $btnNext.show();
                    $btnFinish.hide();
        }
            },
            'onNext': function($tab, $navigation, $index) {
                var $valid = $form2.valid();

                if(!$valid) {
                    $validator2.focusInvalid();

                    return false;
                }else{
                  var ville = $("input#ville").val();  
                  var dep = $("select#dep").val();  
                  var tridept = $("input#tridept").val();  
                  var id_nro = $("select#id_nro").val();  
                  var type_site_origine = $("select#type_site_origine").val();  
                  var taille = $("input#taille").val();  
                  var etat_site_origine = $("select#etat_site_origine").val();  
                  var date_mad_site_origine = $("input#date_mad_site_origine").val(); 
                  var trigramme_dept="PLA"+dep+"_"+tridept; 
             
                 $.ajax({
        url:   "/r2i/projets/insert",
        type : "POST",
        dataType : "json",
        data : { 
            ville : ville,
            dep:dep,
            tridept:tridept,
            id_nro:id_nro,
            type_site_origine:type_site_origine,
            taille:taille,
            etat_site_origine:etat_site_origine,
            date_mad_site_origine:date_mad_site_origine,
            trigramme_dept:trigramme_dept
        },
        success : function(data) {
            // do something
            //alert(ville+"-"+dep+"-"+tridept+"-"+id_nro+"-"+type_site_origine+"-"+taille+"-"+etat_site_origine+"-"+date_mad_site_origine+"-"+trigramme_dept);
           
        },
        error : function(data) {
            // do something
           // alert("erreur");
        }
    });
                }
            },
            onTabClick: function($tab, $navigation, $index) {
        return false;
            }
        });
    };

    return {
        init: function () {
            // Init simple wizard
            initWizardSimple();

            // Init wizards with validation
            initWizardValidation();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BaseFormWizard.init(); });