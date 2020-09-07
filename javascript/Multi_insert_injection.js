$(document).ready(function(){

    function injectin_check(ijtext){
        if(ijtext == "" || ijtext.trim() === "" || ijtext.length === 0 || ijtext.includes("'") || ijtext.includes("*") || ijtext.includes(";") || ijtext.includes("<") || ijtext.includes(">") || ijtext.includes(",")){
            return false;
        }
        else { return true; }

    }
    $(document).on("keyup",".atypein",function(){
        var a = $(this).val().trim();
        var e = injectin_check(q);
        if(e == false){
            $(this).css("border","solid red 1px");

        }
    })
    

})