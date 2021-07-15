function tambah(id1, id2, id3,dosen){
    var judul = document.getElementById('juduls').value;
    var dos = dosen.toString() + judul.toString();
    penguji(id1,id2,id3,dos);
}
function penguji(id1, id2, id3,dosen){
    // diganti dengan class nantinya
    var dos = document.getElementById(dosen);
    var dos1 = document.getElementById(id1);
    var dos2 = document.getElementById(id2);
    var dos3 = document.getElementById(id3);
    var sel1=dos1.value;
    var sel2=dos2.value;
    var sel3=dos3.value;
    var lend=dos.options.length;
    var lend1=dos1.options.length;
    var lend2=dos2.options.length;
    var lend3=dos3.options.length;

    var penguji=[dos1,dos2,dos3];
    var leng=[lend1,lend2,lend3];
    var sel=[sel1,sel2,sel3];
    for (p=0;p<leng.length;p++){
        for (i=0;i<leng[p];i++){penguji[p].options[0]=null;}
        for (i=1;i<lend;i++){
            var opt = document.createElement('option');
            opt.appendChild(document.createTextNode(dos.options[i].text));
            opt.value=dos.options[i].value;
            penguji[p].appendChild(opt);
            if(dos.options[i].value==sel[p]){
                penguji[p].selectedIndex=i-1;
            }
        }
    }

    for (x=0;x<penguji.length;x++){
        for (y=0;y<penguji.length;y++){
            if (penguji[y]!=penguji[x]){
                lend=penguji[y].options.length;
                for (i=0;i<lend;i++){
                    if (penguji[y].options[i].value==penguji[x].value){
                        penguji[y].options[i]=null;
                        break;
                    }
                }
            }
        }
    }
}