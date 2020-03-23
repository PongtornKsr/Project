window.onload = function(){
    document.getElementById('hint1').style.display='none';
    document.getElementById('hint2').style.display='none';
    document.getElementById('submit').disable = true;
};

function passcount(){
    var x = document.getElementById('password').value.length;
    if(x < 8){
        document.getElementById('hint1').style.display='block';
        document.getElementById('submit').disable = true;
    }else if(x >= 8 ){
        document.getElementById('hint1').style.display='none';
        document.getElementById('submit').disable = false;
    }

}

function passcheck(){
    var x = document.getElementById('password').value;
    var y = document.getElementById('confirm_password').value;
    
    if(x != y){
        document.getElementById('hint2').style.display='block';
        document.getElementById('submit').disable = true;
    }
    else if(x==y){
        document.getElementById('hint2').style.display='none';
        document.getElementById('submit').disable = false;
    }

}