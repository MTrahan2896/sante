<div id="modal_code" class="modal">
  <div class="modal-content">
    <div class="entete-modal" style="text-align:center;margin-bottom: 15px;">
      <img src="http://www.cegeptr.qc.ca/wp-content/uploads/2013/01/defi-sante-300x251.png" id="imgDef" style="height:150px;width:150px;">
    </div>
    <div class="contenu-modal">
      <div class="row">
        <form class="col s12">
          <div class="row" style="margin-bottom:0px">
            <div class="input-field col s12" style="margin-top:15px">
              <i class="material-icons prefix">vpn_key</i>
              <input id="code_acces" name="code_acces" onkeypress="return RestrictSpaceSpecial(event)"  maxlength="5" type="text" class="validate">
              <label for="code_acces">Code d'accès</label>
            </div>
            
            <div class="col s12" style="margin-top:15px">
              <button class="btn waves-effect waves-light col s12 l12" type="button" onclick="confirmerCode()" name="code_confirm">Confirmer le code</button>
            </div>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<script>
  

  function confirmerCode(){
    if(hasWhiteSpace($("#code_acces").val()) || verif_caracter("#code_access") ){
      alert ("Le code contient un de ces caractères ~`!#$%^&*+=-[]\\\';,/{}|\":<>? \nCes caractères ne sont pas permit\n");
    }else{
    $.ajax({
            type: "POST",
            url: "php_scripts/validerCode.php",
            data: {'code': $("#code_acces").val()}, 
            success: function (data) {
                  if(data != "fail"){
                console.log("DATA: "+data);
                     if (data=='Groupe'){
                    $('#nePasAfficher').attr('hidden','true');
                    $('#modal_code').modal('close');
                    $('#modal_ins').modal('open');
                  }else if (data == 'SansGroupe'){
                    $('#nePasAfficher').removeAttr('hidden');
                    $('#modal_code').modal('close');
                    $('#modal_ins').modal('open');
                  
                  }else alert("Code Invalide");
                  };

               
                 
                 
                
        },
            error: function (req) {
                alert("erreur");
            }
        });
      }
}    

function RestrictSpaceSpecial(e) {
    var k;
    document.all ? k = e.keyCode : k = e.which;
    return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || (k >= 48 && k <= 57));

};
function hasWhiteSpace(s) {

  return /\s/g.test(s);
}
function verif_caracter(s){
var iChars = "~`!#$%^&*+=-[]\\\';,/{}|\":<>?";
var x = true;
for (var i = 0; i < s.length; i++)
{
  if (iChars.indexOf(s.charAt(i)) != -1)
  {
     
     x =  false;
  }
}
return x
}


</script>