window.onload = function(){
    document.getElementById('hint1').style.display='none';
    document.getElementById('hint2').style.display='none';
};

function passcount(){
    var x = document.getElementById('password').value.length;
    if(x < 8){
        document.getElementById('hint1').style.display='block';
    }else if(x >= 8 ){
        document.getElementById('hint1').style.display='none';
    }

}

function passcheck(){
    var x = document.getElementById('password').value;
    var y = document.getElementById('confirm_password').value;
    
    if(x != y){
        document.getElementById('hint2').style.display='block';
    }
    else if(x==y){
        document.getElementById('hint2').style.display='none';
    }

}