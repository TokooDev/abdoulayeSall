//Wizard
jQuery(document).ready(function() {

			jQuery('.form-wizard-wrapper').find('.form-wizard-link').click(function(){
				jQuery('.form-wizard-link').removeClass('active');
				var innerWidth = jQuery(this).innerWidth();
				jQuery(this).addClass('active');
				var position = jQuery(this).position();
				jQuery('.form-wizardmove-active').css({"left": position.left, "width": innerWidth});
				var attr = jQuery(this).attr('data-attr');
				jQuery('.form-wizard-content').each(function(){
					if (jQuery(this).attr('data-tab-content') == attr) {
						jQuery(this).addClass('show');
					}else{
						jQuery(this).removeClass('show');
					}
				});
			});
			jQuery('.form-wizard-next-btn').click(function() {
				var next = jQuery(this);
				next.parents('.form-wizard-content').removeClass('show');
				next.parents('.form-wizard-content').next('.form-wizard-content').addClass('show');
				jQuery(document).find('.form-wizard-content').each(function(){
					if(jQuery(this).hasClass('show')){
						var formAtrr = jQuery(this).attr('data-tab-content');
						jQuery(document).find('.form-wizard-wrapper li a').each(function(){
							if(jQuery(this).attr('data-attr') == formAtrr){
								jQuery(this).addClass('active');
								var innerWidth = jQuery(this).innerWidth();
								var position = jQuery(this).position();
								jQuery(document).find('.form-wizardmove-active').css({"left": position.left, "width": innerWidth});
							}else{
								jQuery(this).removeClass('active');
							}
						});
					}
				});
			});
			jQuery('.form-wizard-previous-btn').click(function() {
				var prev =jQuery(this);
				prev.parents('.form-wizard-content').removeClass('show');
				prev.parents('.form-wizard-content').prev('.form-wizard-content').addClass('show');
				jQuery(document).find('.form-wizard-content').each(function(){
					if(jQuery(this).hasClass('show')){
						var formAtrr = jQuery(this).attr('data-tab-content');
						jQuery(document).find('.form-wizard-wrapper li a').each(function(){
							if(jQuery(this).attr('data-attr') == formAtrr){
								jQuery(this).addClass('active');
								var innerWidth = jQuery(this).innerWidth();
								var position = jQuery(this).position();
								jQuery(document).find('.form-wizardmove-active').css({"left": position.left, "width": innerWidth});
							}else{
								jQuery(this).removeClass('active');
							}
						});
					}
				});
			});
		});
//Delete inputs
function deleteInput(){
    let nbChampsAjout = document.getElementById('number_reponse').value;
    for (let i = 1 ; i <= nbChampsAjout; i++){
        let log = document.getElementById("btnDelete"+i);
        log.addEventListener('click', function (){
            let label = document.getElementById("label"+i);
            let checkbox = document.getElementById("c"+i);
            let input = document.getElementById("reponse"+i);
            label.remove();
            input.remove();
            checkbox.remove();
            log.remove(); 
        });
    }
}
//Generate inputs
var nbrCheckbox = 0; 
function ajoutCheckbox(){
    var nbChampsAjout = document.getElementById('number_reponse').value;
    var DivToLoad = document.getElementById('conteneur');
        tempInput = "";
        for(let i = 1 ; i <= nbChampsAjout; i++){
            nbrCheckbox++;
            tempInput+= '<p class="create-question-section"><label id="label'+i+'" for="reponse'+i+'" class="reponse-label">Réponse n°'+i+'</label><input type="text" name="reponse'+i+'" error="error'+i+'" class="create-question-input-generated"  id="reponse'+i+'"/><span class="reponse-icones"><input class="multipleCheckbox"  type="checkbox" name="c'+i+'" id="c'+i+'"/><a href="#"  onclick="deleteInput();" id="btnDelete'+i+'"><img  src="images/icones/ic-supprimer.png" class="img-delete"/></a></span></p>' +
                '<p class="input-validation" id="error'+i+'"></p>';
        }
        DivToLoad.innerHTML = tempInput;
}
var nbrRadio = 0; 
function ajoutRadio(){
    var nbChampsAjout = document.getElementById('number_reponse').value;
    var DivToLoad = document.getElementById('conteneur');
        tempInput = "";
        for(let i = 1 ; i <= nbChampsAjout; i++){
            nbrRadio++;
            tempInput+= '<p class="create-question-section"><label id="label'+i+'" for="reponse'+i+'" class="reponse-label">Réponse n°'+i+'</label><input type="text" name="reponse'+i+'" error="error'+i+'" class="create-question-input-generated"  id="reponse'+i+'"/><span class="reponse-icones"><input class="multipleCheckbox"  type="radio" name="c'+i+'" id="c'+i+'"/><a href="#"  onclick="deleteInput();" id="btnDelete'+i+'"><img  src="images/icones/ic-supprimer.png" class="img-delete"/></a></span></p>' +
                '<p class="input-validation" id="error'+i+'"></p>';
        }
        DivToLoad.innerHTML = tempInput;
}

function type_questions(){
    var type_question = document.getElementById('type_question');
    var type_reponse = document.getElementById('ajout_type_reponse');
    var titre = document.getElementById("titre");
    var select_type = type_question[type_question.selectedIndex].value;
    if(select_type === '3'){
        titre.innerHTML = '<div class="create-question-section"><label class="create-question-label">Nbre réponses</label>\n' +
                '        <input type="number" error="error-11" class="create-question-input-generated" name="number_reponse" placeholder="Tapez le nombre de réponses Ex:3" id="number_reponse">\n' +
                '<a class="create-question-plus" href="#" name="ajoutchamp"  onclick="ajoutRadio()"><img src="Images/icones/ic-ajout-réponse.png" width="45" height="43"></a>'+
                '<p class="input-validation" id="error-11"></p></div>'

                ;
            titre.body.appendChild(titre);
        
    }else{
        if(select_type === '1'){
            titre.innerHTML = '<div class="create-question-section"><label  for="reponse" class="reponse-label">Réponse</label><input type="text" error="error-10" class="create-question-input-question" id="reponse"  name="reponse_simple"</div>'+
                                '<p class="input-validation" id="error-10"></p>';
            titre.body.appendChild(titre);
        }
        else{
            if(select_type=='2'){
                titre.innerHTML = '<div class="create-question-section"><label class="create-question-label">Nbre réponses</label>\n' +
                '        <input type="number" error="error-11" class="create-question-input-generated" name="number_reponse" placeholder="Tapez le nombre de réponses Ex:3" id="number_reponse">\n' +
                '<a class="create-question-plus" href="#" name="ajoutchamp"  onclick="ajoutCheckbox()"><img src="Images/icones/ic-ajout-réponse.png" width="45" height="43"></a>'+
                '<p class="input-validation" id="error-11"></p></div>'

                ;
            titre.body.appendChild(titre);
        }else{
            titre.innerHTML='<p class="input-validation">Veuillez séléctionner le type de réponses svp</p>';
            titre.body.appendChild(titre);
        }
        }
    }
}
//Form validation
document.getElementById("form-validation").addEventListener("submit",function(e){
	const inputs= document.getElementsByTagName("input");
	var error=false;
	for(input of inputs){
	    if(input.hasAttribute("error")){
	        var idDivError=input.getAttribute("error");
	    if(!input.value){
	        document.getElementById(idDivError).innerText="Ce champ est obligatoire"
	        error=true;
	        }
	        
	    }
	}
	if(error){
	    e.preventDefault();
	    return false;
	}
	})
	const inputs= document.getElementsByTagName("input");
	for(input of inputs){
	input.addEventListener("keyup",function(e){
	    if (e.target.hasAttribute("error")){
	        var idDivError=e.target.getAttribute("error");
	        document.getElementById(idDivError).innerText=""
	    }
	})
}
//Load avatar
var avatarSection=document.getElementById("avatarSection");
	function affichageAvatar(){
		var avatar=document.getElementById("avatar");
		var lireAvatar= new FileReader();
		lireAvatar.readAsDataURL(avatar.files[0]);
		lireAvatar.onloadend=function(e){
			avatarSection.innerHTML='<img class="signup-avatar" id="avatar" src="'+e.target.result+'" alt="">'
		}
}