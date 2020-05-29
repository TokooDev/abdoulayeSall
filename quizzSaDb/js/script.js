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
  