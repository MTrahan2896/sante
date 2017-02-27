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
              <input id="code_acces" name="code_acces" onkeydown="return alpha(event)"  maxlength="5" type="text" class="validate">
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
                  
                  }
                  };

               
                 
                 
                
        },
            error: function (req) {
                alert("erreur");
            }
        });
}    
function alpha(e) {
    var k;
    document.all ? k = e.keyCode : k = e.which;
    if(k == 32){
      return false;
    }
    else if((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8|| (k >= 48 && k <= 57)){
      return true;
    }else return false;
};



</script>