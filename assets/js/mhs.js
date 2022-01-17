window.onload = function() {
    dosbingX();
  };
function dosbingX(){
    var dos = document.getElementById("dosbing");
    var dos1 = document.getElementById("dosbing1");
    var dos2 = document.getElementById("dosbing2");
    var sel1=dos1.value;
    var sel2=dos2.value;
    var lend=dos.options.length;
    var lend1=dos1.options.length;
    var lend2=dos2.options.length;

    var dosbing=[dos1,dos2];
    var leng=[lend1,lend2];
    var sel=[sel1,sel2];
    for (p=0;p<leng.length;p++){
        for (i=0;i<leng[p];i++){dosbing[p].options[0]=null;}
        for (i=1;i<lend;i++){
            var opt = document.createElement('option');
            opt.appendChild(document.createTextNode(dos.options[i].text));
            opt.value=dos.options[i].value;
            dosbing[p].appendChild(opt);
            if(dos.options[i].value==sel[p]){
                dosbing[p].selectedIndex=i-1;
            }
        }
    }

    for (x=0;x<dosbing.length;x++){
        for (y=0;y<dosbing.length;y++){
            if (dosbing[y]!=dosbing[x]){
                lend=dosbing[y].options.length;
                for (i=0;i<lend;i++){
                    if (dosbing[y].options[i].value==dosbing[x].value){
                        dosbing[y].options[i]=null;
                        break;
                    }
                }
            }
        }
    }
}