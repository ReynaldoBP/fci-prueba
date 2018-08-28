
/*
 * SmartWizard 3.3.1 plugin
 * jQuery Wizard control Plugin
 * by Dipu
 *
 * Refactored and extended:
 * https://github.com/mstratman/jQuery-Smart-Wizard
 *
 * Original URLs:
 * http://www.techlaboratory.net
 * http://tech-laboratory.blogspot.com
 */

 /*Ejemplo extendido y modificado por 
 Andres Almendariz,
 Universidad de Guayaquil
 LessTraffic 2018*/

function SmartWizard_reg_us(target, options) {
    this.target       = target;
    this.options      = options;
    this.curStepIdx   = options.selected;
    this.steps        = $(target).children("ul").children("li").children("a"); // Get all anchors
    this.contentWidth = 0;
    this.msgBox = $('<div class="msgBox"><div class="content"></div><a href="#" class="close">X</a></div>');
    this.elmStepContainer = $('<div></div>').addClass("stepContainer");
    this.loader = $('<div>Loading</div>').addClass("loader");
    this.buttons = {
        next : $('<a>'+options.labelNext+'</a>').attr("href","#").addClass("buttonNext"),
        previous : $('<a>'+options.labelPrevious+'</a>').attr("href","#").addClass("buttonPrevious"),
        finish  : $('<a>'+options.labelFinish+'</a>').attr("href","#").addClass("buttonFinish")
    };

    /*
     * Private functions
     */

/*
  *  FUNCIONES DE VALIDACION - HAY QUE TRNSFERIRLAS DE SER NECESARIO A OTRO JS
*/
function isValidEmailAddress(emailAddress) {
      var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
      return pattern.test(emailAddress);
} 

function step1_validation()
{

     /*RESUMEN: valida los campos necesarios
    DESCRIPCION: compara la longitud de cada campo en calidad de "necesario"
    esta funcion es manual, no valida que campo es necesario aplicar la validacion.
    AUTOR: Andres Almendariz
    FECHA: 16/6/2018
    HORA: 19.00*/
    $con=0;
    if ($('#id_us').val().length == 0) {
        $con++;
    document.getElementById('invalid_id').style.display = 'block';
    }else {document.getElementById('invalid_id').style.display = 'none';}
     if ($('#nombres_us').val().length == 0) {
        $con++;
        document.getElementById('invalid_nombres').style.display = 'block';
    }else {document.getElementById('invalid_nombres').style.display = 'none';}
     if ($('#apellido_us').val().length == 0) {
        $con++;
        document.getElementById('invalid_apellido').style.display = 'block';
    }else {document.getElementById('invalid_apellido').style.display = 'none';}
     if ($('#email').val().length == 0 ) {
        $con++;
        document.getElementById('invalid_email').style.display = 'block';
    }else {document.getElementById('invalid_email').style.display = 'none';}
    if (isValidEmailAddress($('#email').val()) == false) {
        $con++;
        document.getElementById('invalid_email').style.display = 'block';
    }else {document.getElementById('invalid_email').style.display = 'none'; con=0;}  



  if($con == 0)
    {return true;}
 else{return false;}

}



 



function validateSteps_____(stepnumber){
        var isStepValid = true;
        // validate step 1
        if(stepnumber == 1){
            var validacion = step1_validation()
            if(validacion == true)
            {

                //Paso a Inputs ocultos
                $('#IDL').val($('#id_us').val());
                $('#nombresl').val($('#nombres_us').val());
                $('#apellidosl').val($('#apellido_us').val());
                $('#emaill').val($('#email').val());
/*
                if($('#cargo_us').val().length == 0){
                    $('##cargo.l').val('Cargo no Asignado');
                }else{  
                    $('#cargo.l').val($('#cargo_us').val())
                }

                if($('#Dep_us').val().length == 0){
                    $('#staticdep').val('Departamento no Asignado');
                }
                else{ 
                    $('#departamento.l').val($('#Dep_us').val())
                }*/
                     
                    if($('#ra_g_femenino').prop('checked'))
                    {
                        $('#generol').val("f");

                    }else if ($('#ra_g_masculino').prop('checked'))
                    {
                        $('#generol').val("m");
                    }else{
                        $('#generol').val('No seleccionado');
                    }


            

                //Paso a inputs readonly visibles y validaciones de escrituraro
                $('#staticId').val($('#id_us').val());
                $('#staticnombre').val($('#nombres_us').val());
                $('#staticapellido').val($('#apellido_us').val());
               /* if($('#cargo_us').val().length == 0){
                    $('#staticcargo').val('Cargo no Asignado');
                }else{  
                    $('#staticcargo').val($('#cargo_us').val());
                }

                if($('#Dep_us').val().length == 0){
                    $('#staticdep').val('Departamento no Asignado');
                }
                else{ 
                    $('#staticdep').val($('#Dep_us').val());
                }*/
                    $('#staticemail').val($('#email').val())  

                    if($('#ra_g_femenino').prop('checked'))
                    {
                        $('#staticgenero').val($('#ra_g_femenino').val());

                    }else if ($('#ra_g_masculino').prop('checked'))
                    {
                        $('#staticgenero').val($('#ra_g_masculino').val());
                    }else{
                        $('#staticgenero').val('No seleccionado');
                    }
            }else 
            { 
                isStepValid=false; 
            }
        }
        if(stepnumber == 2){
            
            // Your step validation logic
            // set isStepValid = false if has errors
        }
return isStepValid;
}




/*
  *  FIN DE FUNCIONES DE VALIDACION
*/

    var _init = function($this) {
        var elmActionBar = $('<div></div>').addClass("actionBar");
        elmActionBar.append($this.msgBox);
        $('.close',$this.msgBox).click(function() {
            $this.msgBox.fadeOut("normal");
            return false;
        });

        var allDivs = $this.target.children('div');
        $this.target.children('ul').addClass("anchor");
        allDivs.addClass("content");

        // highlight steps with errors
        if($this.options.errorSteps && $this.options.errorSteps.length>0){
            $.each($this.options.errorSteps, function(i, n){
                $this.setError({ stepnum: n, iserror:true });
            });
        }

        $this.elmStepContainer.append(allDivs);
        elmActionBar.append($this.loader);
        $this.target.append($this.elmStepContainer);
        elmActionBar .append($this.buttons.previous)
                     .append($this.buttons.next)
                     .append($this.buttons.finish);
        $this.target.append(elmActionBar);
        this.contentWidth = $this.elmStepContainer.width();

        $($this.buttons.next).click(function() {

              
            $this.goForward_reg_us();            
            return false;

        });
        $($this.buttons.previous).click(function() {
            $this.goBackward_reg_us();
            return false;
        });
        $($this.buttons.finish).click(function() {
            //Seccion del boton Finalizar /////////
           var ActualStep = this.curStepIdx + 1;
            // Comprueba que estamos en el paso 2
           if ($this.curStepIdx + 1 == "2" )
           {
               $('#step-1').submit();
               alert("f");

           }else 
           {alert("Error!, pulsa Siguente hasta estar en el paso 2");}
               
            if(!$(this).hasClass('buttonDisabled')){
                if($.isFunction($this.options.onFinish)) {
                    var context = { fromStep: $this.curStepIdx + 1 };
                    if(!$this.options.onFinish.call(this,$($this.steps), context)){
                    
                        return false;
                    }
                }else{
                    var frm = $this.target.parents('#step-1');
                    if(frm && frm.length){
                        alert("Usuario Registrado!1");
                        //frm.submit();
                    }
                }
            }
            return false;
        });

        $($this.steps).bind("click", function(e){
            if($this.steps.index(this) == $this.curStepIdx){
                return false;
            }
            var nextStepIdx = $this.steps.index(this);
            var isDone = $this.steps.eq(nextStepIdx).attr("isDone") - 0;
            if(isDone == 1){
                _loadContent($this, nextStepIdx);
            }
            return false;
        });

        // Enable keyboard navigation
        if($this.options.keyNavigation){
            $(document).keyup(function(e){
                if(e.which==39){ // Right Arrow
                    $this.goForward_reg_us();
                }else if(e.which==37){ // Left Arrow
                    $this.goBackward_reg_us();
                }
            });
        }
        //  Prepare the steps
        _prepareSteps($this);
        // Show the first slected step
        _loadContent($this, $this.curStepIdx);
    };

    var _prepareSteps = function($this) {
        if(! $this.options.enableAllSteps){
            $($this.steps, $this.target).removeClass("selected").removeClass("done").addClass("disabled");
            $($this.steps, $this.target).attr("isDone",0);
        }else{
            $($this.steps, $this.target).removeClass("selected").removeClass("disabled").addClass("done");
            $($this.steps, $this.target).attr("isDone",1);
        }

        $($this.steps, $this.target).each(function(i){
            $($(this).attr("href").replace(/^.+#/, '#'), $this.target).hide();
            $(this).attr("rel",i+1);
        });
    };

    var _step = function ($this, selStep) {
        return $(
            $(selStep, $this.target).attr("href").replace(/^.+#/, '#'),
            $this.target
        );
    };

    var _loadContent = function($this, stepIdx) {
        var selStep = $this.steps.eq(stepIdx);
        var ajaxurl = $this.options.contentURL;
        var ajaxurl_data = $this.options.contentURLData;
        var hasContent = selStep.data('hasContent');
        var stepNum = stepIdx+1;
        if (ajaxurl && ajaxurl.length>0) {
            if ($this.options.contentCache && hasContent) {
                _showStep($this, stepIdx);
            } else {
                var ajax_args = {
                    url: ajaxurl,
                    type: "POST",
                    data: ({step_number : stepNum}),
                    dataType: "text",
                    beforeSend: function(){
                        $this.loader.show();
                    },
                    error: function(){
                        $this.loader.hide();
                    },
                    success: function(res){
                        $this.loader.hide();
                        if(res && res.length>0){
                            selStep.data('hasContent',true);
                            _step($this, selStep).html(res);
                            _showStep($this, stepIdx);
                        }
                    }
                };
                if (ajaxurl_data) {
                    ajax_args = $.extend(ajax_args, ajaxurl_data(stepNum));
                }
                $.ajax(ajax_args);
            }
        }else{
            _showStep($this,stepIdx);
        }
    };

    var _showStep = function($this, stepIdx) {
        var selStep = $this.steps.eq(stepIdx);
        var curStep = $this.steps.eq($this.curStepIdx);
        if(stepIdx != $this.curStepIdx){
            if($.isFunction($this.options.onLeaveStep)) {
                var context = { fromStep: $this.curStepIdx+1, toStep: stepIdx+1 };
                if (! $this.options.onLeaveStep.call($this,$(curStep), context)){
                    return false;
                }
            }
        }
        $this.elmStepContainer.height(_step($this, selStep)/*.outerHeight()´´éliminado porque daba un espacio exajerado al final del form*/);
        var prevCurStepIdx = $this.curStepIdx;
        $this.curStepIdx =  stepIdx;
        if ($this.options.transitionEffect == 'slide'){
            _step($this, curStep).slideUp("fast",function(e){
                _step($this, selStep).slideDown("fast");
                _setupStep($this,curStep,selStep);
            });
        } else if ($this.options.transitionEffect == 'fade'){
            _step($this, curStep).fadeOut("fast",function(e){
                _step($this, selStep).fadeIn("fast");
                _setupStep($this,curStep,selStep);
            });
        } else if ($this.options.transitionEffect == 'slideleft'){
            var nextElmLeft = 0;
            var nextElmLeft1 = null;
            var nextElmLeft = null;
            var curElementLeft = 0;
            if(stepIdx > prevCurStepIdx){
                nextElmLeft1 = $this.contentWidth + 10;
                nextElmLeft2 = 0;
                curElementLeft = 0 - _step($this, curStep).outerWidth();
            } else {
                nextElmLeft1 = 0 - _step($this, selStep).outerWidth() + 20;
                nextElmLeft2 = 0;
                curElementLeft = 10 + _step($this, curStep).outerWidth();
            }
            if (stepIdx == prevCurStepIdx) {
                nextElmLeft1 = $($(selStep, $this.target).attr("href"), $this.target).outerWidth() + 20;
                nextElmLeft2 = 0;
                curElementLeft = 0 - $($(curStep, $this.target).attr("href"), $this.target).outerWidth();
            } else {
                $($(curStep, $this.target).attr("href"), $this.target).animate({left:curElementLeft},"fast",function(e){
                    $($(curStep, $this.target).attr("href"), $this.target).hide();
                });
            }

            _step($this, selStep).css("left",nextElmLeft1).show().animate({left:nextElmLeft2},"fast",function(e){
                _setupStep($this,curStep,selStep);
            });
        } else {
            _step($this, curStep).hide();
            _step($this, selStep).show();
            _setupStep($this,curStep,selStep);
        }
        return true;
    };

    var _setupStep = function($this, curStep, selStep) {
        $(curStep, $this.target).removeClass("selected");
        $(curStep, $this.target).addClass("done");

        $(selStep, $this.target).removeClass("disabled");
        $(selStep, $this.target).removeClass("done");
        $(selStep, $this.target).addClass("selected");

        $(selStep, $this.target).attr("isDone",1);

        _adjustButton($this);

        if($.isFunction($this.options.onShowStep)) {
            var context = { fromStep: parseInt($(curStep).attr('rel')), toStep: parseInt($(selStep).attr('rel')) };
            if(! $this.options.onShowStep.call(this,$(selStep),context)){
                return false;
            }
        }
        if ($this.options.noForwardJumping) {
            // +2 == +1 (for index to step num) +1 (for next step)
            for (var i = $this.curStepIdx + 2; i <= $this.steps.length; i++) {
                $this.disableStep(i);
            }
        }
    };

    var _adjustButton = function($this) {
        if (! $this.options.cycleSteps){
            if (0 >= $this.curStepIdx) {
                $($this.buttons.previous).addClass("buttonDisabled");
                if ($this.options.hideButtonsOnDisabled) {
                    $($this.buttons.previous).hide();
                }
            }else{
                $($this.buttons.previous).removeClass("buttonDisabled");
                if ($this.options.hideButtonsOnDisabled) {
                    $($this.buttons.previous).show();
                }
            }
            if (($this.steps.length-1) <= $this.curStepIdx){
                $($this.buttons.next).addClass("buttonDisabled");
                if ($this.options.hideButtonsOnDisabled) {
                    $($this.buttons.next).hide();
                }
            }else{
                $($this.buttons.next).removeClass("buttonDisabled");
                if ($this.options.hideButtonsOnDisabled) {
                    $($this.buttons.next).show();
                }
            }
        }
        // Finish Button
        if (! $this.steps.hasClass('disabled') || $this.options.enableFinishButton){
            $($this.buttons.finish).removeClass("buttonDisabled");
            if ($this.options.hideButtonsOnDisabled) {
                $($this.buttons.finish).show();
            }
        }else{
            $($this.buttons.finish).addClass("buttonDisabled");
            if ($this.options.hideButtonsOnDisabled) {
                $($this.buttons.finish).hide();
            }
        }
    };

    /*
     * Public methods
     */

    SmartWizard_reg_us.prototype.goForward_reg_us = function(){

    /*RESUMEN: Modificacion de Funcion prototipo
    DESCRIPCION:se agrego codigo complementario validacion en funcion validateSteps____
    AUTOR: Andres Almendariz
    FECHA: 16/6/2018
    HORA: 19.00*/
    var nextStepIdx = this.curStepIdx + 1;
        if (this.steps.length <= nextStepIdx){
            if (! this.options.cycleSteps){
                return false;
            }
            nextStepIdx = 0;
        }
       
        if(validateSteps_____(this.curStepIdx + 1))
        {
           _loadContent(this, nextStepIdx); 
        }
    };

    SmartWizard_reg_us.prototype.goBackward_reg_us = function(){
        var nextStepIdx = this.curStepIdx-1;
  
      if (0 > nextStepIdx){
            if (! this.options.cycleSteps){
                return false;
            }
            nextStepIdx = this.steps.length - 1;
        }
        _loadContent(this, nextStepIdx);
    };

    SmartWizard_reg_us.prototype.goToStep = function(stepNum){
        var stepIdx = stepNum - 1;
        if (stepIdx >= 0 && stepIdx < this.steps.length) {
            _loadContent(this, stepIdx);
        }
    };
    SmartWizard_reg_us.prototype.enableStep = function(stepNum) {
        var stepIdx = stepNum - 1;
        if (stepIdx == this.curStepIdx || stepIdx < 0 || stepIdx >= this.steps.length) {
            return false;
        }
        var step = this.steps.eq(stepIdx);
        $(step, this.target).attr("isDone",1);
        $(step, this.target).removeClass("disabled").removeClass("selected").addClass("done");
    }
    SmartWizard_reg_us.prototype.disableStep = function(stepNum) {
        var stepIdx = stepNum - 1;
        if (stepIdx == this.curStepIdx || stepIdx < 0 || stepIdx >= this.steps.length) {
            return false;
        }
        var step = this.steps.eq(stepIdx);
        $(step, this.target).attr("isDone",0);
        $(step, this.target).removeClass("done").removeClass("selected").addClass("disabled");
    }
    SmartWizard_reg_us.prototype.currentStep = function() {
        return this.curStepIdx + 1;
    }

    SmartWizard_reg_us.prototype.showMessage = function (msg) {
        $('.content', this.msgBox).html(msg);
        this.msgBox.show();
    }
    SmartWizard_reg_us.prototype.hideMessage = function () {
        this.msgBox.fadeOut("normal");
    }
    SmartWizard_reg_us.prototype.showError = function(stepnum) {
        this.setError(stepnum, true);
    }
    SmartWizard_reg_us.prototype.hideError = function(stepnum) {
        this.setError(stepnum, false);
    }
    SmartWizard_reg_us.prototype.setError = function(stepnum,iserror) {
        if (typeof stepnum == "object") {
            iserror = stepnum.iserror;
            stepnum = stepnum.stepnum;
        }

        if (iserror){
            $(this.steps.eq(stepnum-1), this.target).addClass('error')
        }else{
            $(this.steps.eq(stepnum-1), this.target).removeClass("error");
        }
    }

    SmartWizard_reg_us.prototype.fixHeight = function(){
        var height = 0;

        var selStep = this.steps.eq(this.curStepIdx);
        var stepContainer = _step(this, selStep);
        stepContainer.children().each(function() {
            height += $(this).outerHeight();
        });

        // These values (5 and 20) are experimentally chosen.
        stepContainer.height(height + 5);
        this.elmStepContainer.height(height + 20);
    }

    _init(this);
};



(function($){

$.fn.smartWizard_reg_us = function(method) {
    var args = arguments;
    var rv = undefined;
    var allObjs = this.each(function() {
        var wiz = $(this).data('smartWizard_reg_us');
        if (typeof method == 'object' || ! method || ! wiz) {
            var options = $.extend({}, $.fn.smartWizard_reg_us.defaults, method || {});
            if (! wiz) {
                wiz = new SmartWizard_reg_us($(this), options);
                $(this).data('smartWizard_reg_us', wiz);
            }
        } else {
            if (typeof SmartWizard_reg_us.prototype[method] == "function") {
                rv = SmartWizard_reg_us.prototype[method].apply(wiz, Array.prototype.slice.call(args, 1));
                return rv;
            } else {
                $.error('Method ' + method + ' does not exist on reg_us.js');
            }
        }
    });
    if (rv === undefined) {
        return allObjs;
    } else {
        return rv;
    }
};

// Default Properties and Events
$.fn.smartWizard_reg_us.defaults = {
    selected: 0,  // Selected Step, 0 = first step
    keyNavigation: true, // Enable/Disable key navigation(left and right keys are used if enabled)
    enableAllSteps: false,
    transitionEffect: 'fade', // Effect on navigation, none/fade/slide/slideleft
    contentURL:null, // content url, Enables Ajax content loading
    contentCache:true, // cache step contents, if false content is fetched always from ajax url
    cycleSteps: false, // cycle step navigation
    enableFinishButton: true, // make finish button enabled always
    hideButtonsOnDisabled: false, // when the previous/next/finish buttons are disabled, hide them instead?
    errorSteps:[],    // Array Steps with errors
    labelNext:'Siguiente',
    labelPrevious:'Anterior',
    labelFinish:'Finalizar y guardar',
    noForwardJumping: false,
    onLeaveStep: null, // triggers when leaving a step
    onShowStep: null,  // triggers when showing a step
    onFinish:null 
     /*function () { alert("Finish Clicked!");
        $.post("/admin/usuarios/registroj", function(htmlexterno){
   $("#carga_externa").html(htmlexterno);
        }); ;
     }  // triggers when Finish button is clicked*/
};




})(jQuery);


$(document).ready(function() {
if( typeof ($.fn.smartWizard) === 'undefined'){ return; }
console.log('SmartWizard');
$('#js_reg_us').smartWizard_reg_us();

 $('.buttonNext').addClass('btn btn-success');
 $('.buttonPrevious').addClass('btn btn-primary');
 $('.buttonFinish').addClass('btn btn-default');

 /*var Myform=$('#step-1');
    $(document).on('click','.btn-finish',function(e){
        $('#step-1')[0].submit();
    });*/

});