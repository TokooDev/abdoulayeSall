//Load avatar
var avatarSection=document.getElementById("avatarSection");
	function affichageAvatar(){
		var avatar=document.getElementById("avatar");
		var lireAvatar= new FileReader();
		lireAvatar.readAsDataURL(avatar.files[0]);
		lireAvatar.onloadend=function(e){
			avatarSection.innerHTML='<img class="signup-avatar" src="'+e.target.result+'" alt="">'
		}
}
//Admins
// Add Admin
$(document).ready(function(e){
    // Submit form data via Ajax
    $("#addAdmin-form").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'functions/addAdmin.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            success: function(response){ //console.log(response);
                $('.statusMsg').html('');
                if(response.status == 1){
                    $('#addAdmin-form')[0].reset();
                    $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
                }else{
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                readAdmins();
            }
        });
    });
});
// avatar type validation
$("#avatar").change(function() {
    var file = this.files[0];
    var fileType = file.type;
    var match = ['image/jpeg', 'image/png', 'image/jpg'];
    if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]))){
        alert('Désolé, seuls les formats JPG, JPEG, & PNG sont autorisés.');
        $("#avatar").val('');
        return false;
    }
});

// READ
function readAdmins() {
    $.get("functions/readAdmin.php", {}, function (data, status) {
        $(".admins_data").html(data);
    });
}

//Delete
function DeleteAdmin(idUser) {
    var conf = confirm("Etes-vous sûr de vouloir supprimer cet admin?");
    if (conf == true) {
        $.post("functions/deleteAdmin.php", {
			idUser: idUser
            },
            function (data, status) {
                readAdmins();
            }
        );
    }
}
//Update
function GetAdminDetails(idUser) {
    $("#hidden_idUser").val(idUser);
    $.post("data/adminDetails.php", {
            idUser: idUser
        },
        function (data, status) {
            var admin = JSON.parse(data);
            $("#update_prenom").val(admin.prenom);
            $("#update_nom").val(admin.nom);
			$("#update_login").val(admin.login);
			$("#update_mdp1").val(admin.mdp1);
        }
    );
    $("#editAdmin").modal("show");
}
function UpdateAdmin() {
    var prenom = $("#update_prenom").val();
    var nom = $("#update_nom").val();
	var login = $("#update_login").val();
	var mdp1 = $("#update_mdp1").val();
    var idUser = $("#hidden_idUser").val();
    $.post("functions/updateAdmin.php", {
            idUser: idUser,
            prenom: prenom,
            nom: nom,
			login: login,
			mdp1: mdp1
        },
        function (data, status) {
            $("#editAdmin").modal("hide");
            readAdmins();
        }
    );
}
$(document).ready(function () {
    readAdmins();
});

$(document).ready(function(){
    var totalPage = parseInt($('#totalPages').val());    
    console.log("==totalPage=="+totalPage);
    var pag = $('#admins_data').simplePaginator({
        totalPages: totalPage,
        maxButtonsVisible: 5,
        currentPage: 1,
        nextLabel: 'Suivant',
        prevLabel: 'Précédent',
        firstLabel: 'Premier',
        lastLabel: 'Dernier',
        clickCurrentPage: true,
        pageChange: function(page) {            
            $("#content").html('<tr><td colspan="6"><strong>Chargement des données en cours...</strong></td></tr>');
            $.ajax({
                url:"./data/admins.php",
                method:"POST",
                dataType: "json",        
                data:{page:    page},
                success:function(responseData){
                    $('#content').html(responseData.html);
                }
            });
        }
    });
});
//Players
// READ
function readPlayers() {
    $.get("./functions/readPlayer.php", {}, function (data, status) {
        $(".players_data").html(data);
    });
}
function blockPlayer(idUser) {
    var conf = confirm("Etes-vous sûr de vouloir bloquer ce joueur?");
    if (conf == true) {
        $.post("./functions/blockPlayer.php", {
			idUser: idUser
            },
            function (data, status) {
                readPlayers();
            }
        );
    }
}
function deblockPlayer(idUser) {
    var conf = confirm("Etes-vous sûr de vouloir débloquer ce joueur?");
    if (conf == true) {
        $.post("./functions/deblockPlayer.php", {
			idUser: idUser
            },
            function (data, status) {
                readPlayers();
            }
        );
    }
}

$(document).ready(function () {
    readPlayers();
});


$(document).ready(function(){
	var totalPage = parseInt($('#totalPages').val());	
	console.log("==totalPage=="+totalPage);
	var pag = $('#players_data').simplePaginator({
		totalPages: totalPage,
		maxButtonsVisible: 5,
		currentPage: 1,
		nextLabel: 'Suivant',
		prevLabel: 'Précédent',
		firstLabel: 'Premier',
		lastLabel: 'Dernier',
		clickCurrentPage: true,
		pageChange: function(page) {			
			$("#content").html('<tr><td colspan="6"><strong>Chargement des données en cours...</strong></td></tr>');
            $.ajax({
				url:"./data/players.php",
				method:"POST",
				dataType: "json",		
				data:{page:	page},
				success:function(responseData){
					$('#content').html(responseData.html);
				}
			});
		}
	});
});

//Questions

//Ajouter de champs 

$(document).ready(function () {
    $(this).on("click", " .fa-plus-circle ", function (){
        var nombreReponse = $("input[name = nombre-reponse]").val();
        for (var i=1; i<=nombreReponse; i++) {
            var html = '<div class="form-group row">' +
                '\n' +
'                            <div class="col-12">\n' +
'                             ' +
'                                    <div class="row" >\n' +
'                                     <label for="reponse" class="col-3 mt-lg-1">Reponse '+i+'</label>' +
'                                        <div class="col-7">\n' +
'                                        <div class="input-group mb-3">\n' +
'                                            <div class="input-group-prepend">\n' +
'                                                <div class="input-group-text">\n' +
'                                                    <input type="checkbox" name="checkreponse'+i+'" value="" aria-label="Checkbox for following text input">\n' +
'                                                </div>\n' +
'                                            </div>\n' +
'                                            <input type="text" class="form-control" name="reponse'+i+'"  aria-label="Text input with checkbox">\n' +
'                                        </div>\n' +
'                                    </div>\n' +
'                                   \n' +
'                                     <a class="remove mt-1 text-danger"><i class="fas fa-2x fa-trash-alt"></i></a>\n' +
'                                    \n' +
'                                </div>\n' +
'                            </div>' +
                '</div>'
            $(".reponses").append(html);
        }
    });
//Supprimer le champ
$(this).on('click', '.remove', function () {
        var target_input = $(this).parent();
        target_input.remove();
    })
$(this).on("click", " .enregistrer", function () {
})

})
//Traitements 
$(document).ready(function () {
$("#submitQuestion").click(function (event) {
    event.preventDefault();
    var formQuestion = $('#formulaireCreation')[0];
    var dataQuestion = new FormData(formQuestion);
    $.ajax({
        type: "POST",
        url: './data/createQuestion.php',
        data: dataQuestion,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (data) {
            $(".error-return").html(data);
            readQuestions();
            $('#formulaireCreation')[0].reset();
        },
        error: function (data) {
            $(".error-return").html(data);
        }
    });
});
});
 //Affichage

 function readQuestions() {
    $.get("functions/readQuestion.php", {}, function (data, status) {
        $(".questions_data").html(data);
    });
}
$(document).ready(function () {
    readQuestions();
});

 $(document).ready(function(){
    var totalPage = parseInt($('#totalPages').val());    
    console.log("==totalPage=="+totalPage);
    var pag = $('#questions_data').simplePaginator({
        totalPages: totalPage,
        maxButtonsVisible: 5,
        currentPage: 1,
        nextLabel: 'Suivant',
        prevLabel: 'Précédent',
        firstLabel: 'Premier',
        lastLabel: 'Dernier',
        clickCurrentPage: true,
        pageChange: function(page) {            
            $("#questionContent").html('<tr><td colspan="6"><strong>Chargement des données en cours...</strong></td></tr>');
            $.ajax({
                url:"./data/questions.php",
                method:"POST",
                dataType: "json",        
                data:{page:    page},
                success:function(responseData){
                    $('#questionContent').html(responseData.html);
                }
            });
        }
    });
});

//Edit
function GetQuestionDetails(id) {
    $("#hidden_id").val(id);
    $.post("data/questionDetails.php", {
            id: id
        },
        function (data, status) {
            var question = JSON.parse(data);
            $("#update_question").val(question.question);
            $("#update_score").val(question.score);
            $("#update_type").val(question.type);
        }
    );
    $("#editQuestion").modal("show");
}

function UpdateQuestion() {
    var question = $("#update_question").val();
    var score = $("#update_score").val();
    var type = $("#update_type").val();
    var id = $("#hidden_id").val();
    $.post("functions/UpdateQuestion.php", {
            id: id,
            question: question,
            score: score,
            type: type
        },
        function (data, status) {
            $("#editQuestion").modal("hide");
            readQuestions();
        }
    );
}

//Delete
function DeleteQuestion(id) {
    var conf = confirm("Etes-vous sûr de vouloir supprimer cette question?");
    if (conf == true) {
        $.post("functions/deleteQuestion.php", {
            id: id
            },
            function (data, status) {
                readQuestions();
            }
        );
    }
}