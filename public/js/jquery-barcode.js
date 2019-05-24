/*!
 *  BarCode Coder Library (BCC Library)
 *  BCCL Version 2.0
 *    
 *  Porting : jQuery barcode plugin 
 *  Version : 2.0.3
 *   
 *  Date    : 2013-01-06
 *  Author  : DEMONTE Jean-Baptiste <jbdemonte@gmail.com>
 *            HOUREZ Jonathan
 *             
 *  Web site: http://barcode-coder.com/
 *  dual licence :  http://www.cecill.info/licences/Licence_CeCILL_V2-fr.html
 *                  http://www.gnu.org/licenses/gpl.html
 */
(function(b){var a={settings:{barWidth:1,barHeight:50,moduleSize:5,showHRI:true,addQuietZone:true,marginHRI:5,bgColor:"#FFFFFF",color:"#000000",fontSize:10,output:"css",posX:0,posY:0},intval:function(d){var c=typeof(d);if(c=="string"){d=d.replace(/[^0-9-.]/g,"");d=parseInt(d*1,10);return isNaN(d)||!isFinite(d)?0:d}return c=="number"&&isFinite(d)?Math.floor(d):0},i25:{encoding:["NNWWN","WNNNW","NWNNW","WWNNN","NNWNW","WNWNN","NWWNN","NNNWW","WNNWN","NWNWN"],compute:function(g,j,f){if(!j){if(g.length%2!=0){g="0"+g}}else{if((f=="int25")&&(g.length%2==0)){g="0"+g}var h=true,c,e=0;for(var d=g.length-1;d>-1;d--){c=a.intval(g.charAt(d));if(isNaN(c)){return("")}e+=h?3*c:c;h=!h}g+=((10-e%10)%10).toString()}return(g)},getDigit:function(k,l,h){k=this.compute(k,l,h);if(k==""){return("")}result="";var f,d;if(h=="int25"){result+="1010";var g,e;for(f=0;f<k.length/2;f++){g=k.charAt(2*f);e=k.charAt(2*f+1);for(d=0;d<5;d++){result+="1";if(this.encoding[g].charAt(d)=="W"){result+="1"}result+="0";if(this.encoding[e].charAt(d)=="W"){result+="0"}}}result+="1101"}else{if(h=="std25"){result+="11011010";var m;for(f=0;f<k.length;f++){m=k.charAt(f);for(d=0;d<5;d++){result+="1";if(this.encoding[m].charAt(d)=="W"){result+="11"}result+="0"}}result+="11010110"}}return(result)}},ean:{encoding:[["0001101","0100111","1110010"],["0011001","0110011","1100110"],["0010011","0011011","1101100"],["0111101","0100001","1000010"],["0100011","0011101","1011100"],["0110001","0111001","1001110"],["0101111","0000101","1010000"],["0111011","0010001","1000100"],["0110111","0001001","1001000"],["0001011","0010111","1110100"]],first:["000000","001011","001101","001110","010011","011001","011100","010101","010110","011010"],getDigit:function(j,h){var e=h=="ean8"?7:12;j=j.substring(0,e);if(j.length!=e){return("")}var k;for(var g=0;g<j.length;g++){k=j.charAt(g);if((k<"0")||(k>"9")){return("")}}j=this.compute(j,h);var d="101";if(h=="ean8"){for(var g=0;g<4;g++){d+=this.encoding[a.intval(j.charAt(g))][0]}d+="01010";for(var g=4;g<8;g++){d+=this.encoding[a.intval(j.charAt(g))][2]}}else{var f=this.first[a.intval(j.charAt(0))];for(var g=1;g<7;g++){d+=this.encoding[a.intval(j.charAt(g))][a.intval(f.charAt(g-1))]}d+="01010";for(var g=7;g<13;g++){d+=this.encoding[a.intval(j.charAt(g))][2]}}d+="101";return(d)},compute:function(f,e){var c=e=="ean13"?12:7;f=f.substring(0,c);var d=0,g=true;for(i=f.length-1;i>-1;i--){d+=(g?3:1)*a.intval(f.charAt(i));g=!g}return(f+((10-d%10)%10).toString())}},upc:{getDigit:function(c){if(c.length<12){c="0"+c}return a.ean.getDigit(c,"ean13")},compute:function(c){if(c.length<12){c="0"+c}return a.ean.compute(c,"ean13").substr(1)}},msi:{encoding:["100100100100","100100100110","100100110100","100100110110","100110100100","100110100110","100110110100","100110110110","110100100100","110100100110"],compute:function(c,d){if(typeof(d)=="object"){if(d.crc1=="mod10"){c=this.computeMod10(c)}else{if(d.crc1=="mod11"){c=this.computeMod11(c)}}if(d.crc2=="mod10"){c=this.computeMod10(c)}else{if(d.crc2=="mod11"){c=this.computeMod11(c)}}}else{if(typeof(d)=="boolean"){if(d){c=this.computeMod10(c)}}}return(c)},computeMod10:function(h){var e,c=h.length%2;var g=0,f=0;for(e=0;e<h.length;e++){if(c){g=10*g+a.intval(h.charAt(e))}else{f+=a.intval(h.charAt(e))}c=!c}var d=(2*g).toString();for(e=0;e<d.length;e++){f+=a.intval(d.charAt(e))}return(h+((10-f%10)%10).toString())},computeMod11:function(e){var d=0,f=2;for(var c=e.length-1;c>=0;c--){d+=f*a.intval(e.charAt(c));f=f==7?2:f+1}return(e+((11-d%11)%11).toString())},getDigit:function(f,g){var e="0123456789";var d=0;var c="";f=this.compute(f,false);c="110";for(i=0;i<f.length;i++){d=e.indexOf(f.charAt(i));if(d<0){return("")}c+=this.encoding[d]}c+="1001";return(c)}},code11:{encoding:["101011","1101011","1001011","1100101","1011011","1101101","1001101","1010011","1101001","110101","101101"],getDigit:function(e){var p="0123456789-";var j,m,q="",f="0";q="1011001"+f;for(j=0;j<e.length;j++){m=p.indexOf(e.charAt(j));if(m<0){return("")}q+=this.encoding[m]+f}var o=0,h=0,l=1,d=0;for(j=e.length-1;j>=0;j--){o=o==10?1:o+1;l=l==10?1:l+1;m=p.indexOf(e.charAt(j));h+=o*m;d+=l*m}var n=h%11;d+=n;var g=d%11;q+=this.encoding[n]+f;if(e.length>=10){q+=this.encoding[g]+f}q+="1011001";return(q)}},code39:{encoding:["101001101101","110100101011","101100101011","110110010101","101001101011","110100110101","101100110101","101001011011","110100101101","101100101101","110101001011","101101001011","110110100101","101011001011","110101100101","101101100101","101010011011","110101001101","101101001101","101011001101","110101010011","101101010011","110110101001","101011010011","110101101001","101101101001","101010110011","110101011001","101101011001","101011011001","110010101011","100110101011","110011010101","100101101011","110010110101","100110110101","100101011011","110010101101","100110101101","100100100101","100100101001","100101001001","101001001001","100101101101"],getDigit:function(h){var g="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ-. $/+%*";var f,e,d="",c="0";if(h.indexOf("*")>=0){return("")}h=("*"+h+"*").toUpperCase();for(f=0;f<h.length;f++){e=g.indexOf(h.charAt(f));if(e<0){return("")}if(f>0){d+=c}d+=this.encoding[e]}return(d)}},code93:{encoding:["100010100","101001000","101000100","101000010","100101000","100100100","100100010","101010000","100010010","100001010","110101000","110100100","110100010","110010100","110010010","110001010","101101000","101100100","101100010","100110100","100011010","101011000","101001100","101000110","100101100","100010110","110110100","110110010","110101100","110100110","110010110","110011010","101101100","101100110","100110110","100111010","100101110","111010100","111010010","111001010","101101110","101110110","110101110","100100110","111011010","111010110","100110010","101011110"],getDigit:function(e,j){var n="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ-. $/+%____*",l,o="";if(e.indexOf("*")>=0){return("")}e=e.toUpperCase();o+=this.encoding[47];for(i=0;i<e.length;i++){l=e.charAt(i);index=n.indexOf(l);if((l=="_")||(index<0)){return("")}o+=this.encoding[index]}if(j){var m=0,g=0,h=1,d=0;for(i=e.length-1;i>=0;i--){m=m==20?1:m+1;h=h==15?1:h+1;index=n.indexOf(e.charAt(i));g+=m*index;d+=h*index}var l=g%47;d+=l;var f=d%47;o+=this.encoding[l];o+=this.encoding[f]}o+=this.encoding[47];o+="1";return(o)}},code128:{encoding:["11011001100","11001101100","11001100110","10010011000","10010001100","10001001100","10011001000","10011000100","10001100100","11001001000","11001000100","11000100100","10110011100","10011011100","10011001110","10111001100","10011101100","10011100110","11001110010","11001011100","11001001110","11011100100","11001110100","11101101110","11101001100","11100101100","11100100110","11101100100","11100110100","11100110010","11011011000","11011000110","11000110110","10100011000","10001011000","10001000110","10110001000","10001101000","10001100010","11010001000","11000101000","11000100010","10110111000","10110001110","10001101110","10111011000","10111000110","10001110110","11101110110","11010001110","11000101110","11011101000","11011100010","11011101110","11101011000","11101000110","11100010110","11101101000","11101100010","11100011010","11101111010","11001000010","11110001010","10100110000","10100001100","10010110000","10010000110","10000101100","10000100110","10110010000","10110000100","10011010000","10011000010","10000110100","10000110010","11000010010","11001010000","11110111010","11000010100","10001111010","10100111100","10010111100","10010011110","10111100100","10011110100","10011110010","11110100100","11110010100","11110010010","11011011110","11011110110","11110110110","10101111000","10100011110","10001011110","10111101000","10111100010","11110101000","11110100010","10111011110","10111101110","11101011110","11110101110","11010000100","11010010000","11010011100","11000111010"],getDigit:function(e){var d=" !\"#$%&'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\\]^_`abcdefghijklmnopqrstuvwxyz{|}~";var o="";var l=0;var f=0;var k=0;var h=0;var n=0;for(k=0;k<e.length;k++){if(d.indexOf(e.charAt(k))==-1){return("")}}var g=e.length>1;var m="";for(k=0;k<3&&k<e.length;k++){m=e.charAt(k);g&=m>="0"&&m<="9"}l=g?105:104;o=this.encoding[l];k=0;while(k<e.length){if(!g){h=0;while((k+h<e.length)&&(e.charAt(k+h)>="0")&&(e.charAt(k+h)<="9")){h++}g=(h>5)||((k+h-1==e.length)&&(h>3));if(g){o+=this.encoding[99];l+=++f*99}}else{if((k==e.length)||(e.charAt(k)<"0")||(e.charAt(k)>"9")||(e.charAt(k+1)<"0")||(e.charAt(k+1)>"9")){g=false;o+=this.encoding[100];l+=++f*100}}if(g){n=a.intval(e.charAt(k)+e.charAt(k+1));k+=2}else{n=d.indexOf(e.charAt(k));k+=1}o+=this.encoding[n];l+=++f*n}o+=this.encoding[l%103];o+=this.encoding[106];o+="11";return(o)}},codabar:{encoding:["101010011","101011001","101001011","110010101","101101001","110101001","100101011","100101101","100110101","110100101","101001101","101100101","1101011011","1101101011","1101101101","1011011011","1011001001","1010010011","1001001011","1010011001"],getDigit:function(h){var g="0123456789-$:/.+";var f,e,d="",c="0";d+=this.encoding[16]+c;for(f=0;f<h.length;f++){e=g.indexOf(h.charAt(f));if(e<0){return("")}d+=this.encoding[e]+c}d+=this.encoding[16];return(d)}},datamatrix:{lengthRows:[10,12,14,16,18,20,22,24,26,32,36,40,44,48,52,64,72,80,88,96,104,120,132,144,8,8,12,12,16,16],lengthCols:[10,12,14,16,18,20,22,24,26,32,36,40,44,48,52,64,72,80,88,96,104,120,132,144,18,32,26,36,36,48],dataCWCount:[3,5,8,12,18,22,30,36,44,62,86,114,144,174,204,280,368,456,576,696,816,1050,1304,1558,5,10,16,22,32,49],solomonCWCount:[5,7,10,12,14,18,20,24,28,36,42,48,56,68,84,112,144,192,224,272,336,408,496,620,7,11,14,18,24,28],dataRegionRows:[8,10,12,14,16,18,20,22,24,14,16,18,20,22,24,14,16,18,20,22,24,18,20,22,6,6,10,10,14,14],dataRegionCols:[8,10,12,14,16,18,20,22,24,14,16,18,20,22,24,14,16,18,20,22,24,18,20,22,16,14,24,16,16,22],regionRows:[1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,4,4,4,4,4,4,6,6,6,1,1,1,1,1,1],regionCols:[1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,4,4,4,4,4,4,6,6,6,1,2,1,2,2,2],interleavedBlocks:[1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,2,4,4,4,4,6,6,8,8,1,1,1,1,1,1],logTab:[-255,255,1,240,2,225,241,53,3,38,226,133,242,43,54,210,4,195,39,114,227,106,134,28,243,140,44,23,55,118,211,234,5,219,196,96,40,222,115,103,228,78,107,125,135,8,29,162,244,186,141,180,45,99,24,49,56,13,119,153,212,199,235,91,6,76,220,217,197,11,97,184,41,36,223,253,116,138,104,193,229,86,79,171,108,165,126,145,136,34,9,74,30,32,163,84,245,173,187,204,142,81,181,190,46,88,100,159,25,231,50,207,57,147,14,67,120,128,154,248,213,167,200,63,236,110,92,176,7,161,77,124,221,102,218,95,198,90,12,152,98,48,185,179,42,209,37,132,224,52,254,239,117,233,139,22,105,27,194,113,230,206,87,158,80,189,172,203,109,175,166,62,127,247,146,66,137,192,35,252,10,183,75,216,31,83,33,73,164,144,85,170,246,65,174,61,188,202,205,157,143,169,82,72,182,215,191,251,47,178,89,151,101,94,160,123,26,112,232,21,51,238,208,131,58,69,148,18,15,16,68,17,121,149,129,19,155,59,249,70,214,250,168,71,201,156,64,60,237,130,111,20,93,122,177,150],aLogTab:[1,2,4,8,16,32,64,128,45,90,180,69,138,57,114,228,229,231,227,235,251,219,155,27,54,108,216,157,23,46,92,184,93,186,89,178,73,146,9,18,36,72,144,13,26,52,104,208,141,55,110,220,149,7,14,28,56,112,224,237,247,195,171,123,246,193,175,115,230,225,239,243,203,187,91,182,65,130,41,82,164,101,202,185,95,190,81,162,105,210,137,63,126,252,213,135,35,70,140,53,106,212,133,39,78,156,21,42,84,168,125,250,217,159,19,38,76,152,29,58,116,232,253,215,131,43,86,172,117,234,249,223,147,11,22,44,88,176,77,154,25,50,100,200,189,87,174,113,226,233,255,211,139,59,118,236,245,199,163,107,214,129,47,94,188,85,170,121,242,201,191,83,166,97,194,169,127,254,209,143,51,102,204,181,71,142,49,98,196,165,103,206,177,79,158,17,34,68,136,61,122,244,197,167,99,198,161,111,222,145,15,30,60,120,240,205,183,67,134,33,66,132,37,74,148,5,10,20,40,80,160,109,218,153,31,62,124,248,221,151,3,6,12,24,48,96,192,173,119,238,241,207,179,75,150,1],champGaloisMult:function(d,c){if(!d||!c){return 0}return this.aLogTab[(this.logTab[d]+this.logTab[c])%255]},champGaloisDoub:function(d,c){if(!d){return 0}if(!c){return d}return this.aLogTab[(this.logTab[d]+c)%255]},champGaloisSum:function(d,c){return d^c},selectIndex:function(d,c){if((d<1||d>1558)&&!c){return -1}if((d<1||d>49)&&c){return -1}var e=0;if(c){e=24}while(this.dataCWCount[e]<d){e++}return e},encodeDataCodeWordsASCII:function(f){var e=new Array();var h=0,d,g;for(d=0;d<f.length;d++){g=f.charCodeAt(d);if(g>127){e[h]=235;g=g-127;h++}else{if((g>=48&&g<=57)&&(d+1<f.length)&&(f.charCodeAt(d+1)>=48&&f.charCodeAt(d+1)<=57)){g=((g-48)*10)+((f.charCodeAt(d+1))-48);g+=130;d++}else{g++}}e[h]=g;h++}return e},addPadCW:function(d,g,f){if(g>=f){return}d[g]=129;var e,c;for(c=g+1;c<f;c++){e=((149*(c+1))%253)+1;d[c]=(129+e)%254}},calculSolFactorTable:function(c){var f=new Array();var e,d;for(e=0;e<=c;e++){f[e]=1}for(e=1;e<=c;e++){for(d=e-1;d>=0;d--){f[d]=this.champGaloisDoub(f[d],e);if(d>0){f[d]=this.champGaloisSum(f[d],f[d-1])}}}return f},addReedSolomonCW:function(e,d,n,m,c){var p=0;var o=e/c;var l=new Array();var h,g,f;for(f=0;f<c;f++){for(h=0;h<o;h++){l[h]=0}for(h=f;h<n;h=h+c){p=this.champGaloisSum(m[h],l[o-1]);for(g=o-1;g>=0;g--){if(!p){l[g]=0}else{l[g]=this.champGaloisMult(p,d[g])}if(g>0){l[g]=this.champGaloisSum(l[g-1],l[g])}}}g=n+f;for(h=o-1;h>=0;h--){m[g]=l[h];g=g+c}}return m},getBits:function(c){var e=new Array();for(var d=0;d<8;d++){e[d]=c&(128>>d)?1:0}return e},next:function(h,j,f,k,e,g){var d=0;var l=4;var c=0;do{if((l==j)&&(c==0)){this.patternShapeSpecial1(e,g,k[d],j,f);d++}else{if((h<3)&&(l==j-2)&&(c==0)&&(f%4!=0)){this.patternShapeSpecial2(e,g,k[d],j,f);d++}else{if((l==j-2)&&(c==0)&&(f%8==4)){this.patternShapeSpecial3(e,g,k[d],j,f);d++}else{if((l==j+4)&&(c==2)&&(f%8==0)){this.patternShapeSpecial4(e,g,k[d],j,f);d++}}}}do{if((l<j)&&(c>=0)&&(g[l][c]!=1)){this.patternShapeStandard(e,g,k[d],l,c,j,f);d++}l-=2;c+=2}while((l>=0)&&(c<f));l+=1;c+=3;do{if((l>=0)&&(c<f)&&(g[l][c]!=1)){this.patternShapeStandard(e,g,k[d],l,c,j,f);d++}l+=2;c-=2}while((l<j)&&(c>=0));l+=3;c+=1}while((l<j)||(c<f))},patternShapeStandard:function(g,d,h,j,c,e,f){this.placeBitInDatamatrix(g,d,h[0],j-2,c-2,e,f);this.placeBitInDatamatrix(g,d,h[1],j-2,c-1,e,f);this.placeBitInDatamatrix(g,d,h[2],j-1,c-2,e,f);this.placeBitInDatamatrix(g,d,h[3],j-1,c-1,e,f);this.placeBitInDatamatrix(g,d,h[4],j-1,c,e,f);this.placeBitInDatamatrix(g,d,h[5],j,c-2,e,f);this.placeBitInDatamatrix(g,d,h[6],j,c-1,e,f);this.placeBitInDatamatrix(g,d,h[7],j,c,e,f)},patternShapeSpecial1:function(f,c,g,d,e){this.placeBitInDatamatrix(f,c,g[0],d-1,0,d,e);this.placeBitInDatamatrix(f,c,g[1],d-1,1,d,e);this.placeBitInDatamatrix(f,c,g[2],d-1,2,d,e);this.placeBitInDatamatrix(f,c,g[3],0,e-2,d,e);this.placeBitInDatamatrix(f,c,g[4],0,e-1,d,e);this.placeBitInDatamatrix(f,c,g[5],1,e-1,d,e);this.placeBitInDatamatrix(f,c,g[6],2,e-1,d,e);this.placeBitInDatamatrix(f,c,g[7],3,e-1,d,e)},patternShapeSpecial2:function(f,c,g,d,e){this.placeBitInDatamatrix(f,c,g[0],d-3,0,d,e);this.placeBitInDatamatrix(f,c,g[1],d-2,0,d,e);this.placeBitInDatamatrix(f,c,g[2],d-1,0,d,e);this.placeBitInDatamatrix(f,c,g[3],0,e-4,d,e);this.placeBitInDatamatrix(f,c,g[4],0,e-3,d,e);this.placeBitInDatamatrix(f,c,g[5],0,e-2,d,e);this.placeBitInDatamatrix(f,c,g[6],0,e-1,d,e);this.placeBitInDatamatrix(f,c,g[7],1,e-1,d,e)},patternShapeSpecial3:function(f,c,g,d,e){this.placeBitInDatamatrix(f,c,g[0],d-3,0,d,e);this.placeBitInDatamatrix(f,c,g[1],d-2,0,d,e);this.placeBitInDatamatrix(f,c,g[2],d-1,0,d,e);this.placeBitInDatamatrix(f,c,g[3],0,e-2,d,e);this.placeBitInDatamatrix(f,c,g[4],0,e-1,d,e);this.placeBitInDatamatrix(f,c,g[5],1,e-1,d,e);this.placeBitInDatamatrix(f,c,g[6],2,e-1,d,e);this.placeBitInDatamatrix(f,c,g[7],3,e-1,d,e)},patternShapeSpecial4:function(f,c,g,d,e){this.placeBitInDatamatrix(f,c,g[0],d-1,0,d,e);this.placeBitInDatamatrix(f,c,g[1],d-1,e-1,d,e);this.placeBitInDatamatrix(f,c,g[2],0,e-3,d,e);this.placeBitInDatamatrix(f,c,g[3],0,e-2,d,e);this.placeBitInDatamatrix(f,c,g[4],0,e-1,d,e);this.placeBitInDatamatrix(f,c,g[5],1,e-3,d,e);this.placeBitInDatamatrix(f,c,g[6],1,e-2,d,e);this.placeBitInDatamatrix(f,c,g[7],1,e-1,d,e)},placeBitInDatamatrix:function(g,d,j,h,c,e,f){if(h<0){h+=e;c+=4-((e+4)%8)}if(c<0){c+=f;h+=4-((f+4)%8)}if(d[h][c]!=1){g[h][c]=j;d[h][c]=1}},addFinderPattern:function(k,m,h,l,c){var n=(l+2)*m;var d=(c+2)*h;var e=new Array();e[0]=new Array();for(var f=0;f<d+2;f++){e[0][f]=0}for(var g=0;g<n;g++){e[g+1]=new Array();e[g+1][0]=0;e[g+1][d+1]=0;for(var f=0;f<d;f++){if(g%(l+2)==0){if(f%2==0){e[g+1][f+1]=1}else{e[g+1][f+1]=0}}else{if(g%(l+2)==l+1){e[g+1][f+1]=1}else{if(f%(c+2)==c+1){if(g%2==0){e[g+1][f+1]=0}else{e[g+1][f+1]=1}}else{if(f%(c+2)==0){e[g+1][f+1]=1}else{e[g+1][f+1]=0;e[g+1][f+1]=k[g-1-(2*(parseInt(g/(l+2))))][f-1-(2*(parseInt(f/(c+2))))]}}}}}}e[n+1]=new Array();for(var f=0;f<d+2;f++){e[n+1][f]=0}return e},getDigit:function(l,q){var p=this.encodeDataCodeWordsASCII(l);var j=p.length;var f=this.selectIndex(j,q);var m=this.dataCWCount[f];var x=this.solomonCWCount[f];var c=m+x;var y=this.lengthRows[f];var z=this.lengthCols[f];var e=this.regionRows[f];var d=this.regionCols[f];var k=this.dataRegionRows[f];var w=this.dataRegionCols[f];var t=y-2*e;var h=z-2*d;var u=this.interleavedBlocks[f];var s=(x/u);this.addPadCW(p,j,m);var r=this.calculSolFactorTable(s);this.addReedSolomonCW(x,r,m,p,u);var o=new Array();for(var n=0;n<c;n++){o[n]=this.getBits(p[n])}var A=new Array();var v=new Array();for(var n=0;n<h;n++){A[n]=new Array();v[n]=new Array()}if(((t*h)%8)==4){A[t-2][h-2]=1;A[t-1][h-1]=1;A[t-1][h-2]=0;A[t-2][h-1]=0;v[t-2][h-2]=1;v[t-1][h-1]=1;v[t-1][h-2]=1;v[t-2][h-1]=1}this.next(0,t,h,o,A,v);A=this.addFinderPattern(A,e,d,k,w);return A}},lec:{cInt:function(e,f){var d="";for(var c=0;c<f;c++){d+=String.fromCharCode(e&255);e=e>>8}return d},cRgb:function(e,d,c){return String.fromCharCode(c)+String.fromCharCode(d)+String.fromCharCode(e)},cHexColor:function(h){var d=parseInt("0x"+h.substr(1));var c=d&255;d=d>>8;var f=d&255;var e=d>>8;return(this.cRgb(e,f,c))}},hexToRGB:function(h){var d=parseInt("0x"+h.substr(1));var c=d&255;d=d>>8;var f=d&255;var e=d>>8;return({r:e,g:f,b:c})},isHexColor:function(d){var c=new RegExp("#[0-91-F]","gi");return d.match(c)},base64Encode:function(o){var c="",h,f,e,n,m,l,j;var d="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";var g=0;while(g<o.length){h=o.charCodeAt(g++);f=o.charCodeAt(g++);e=o.charCodeAt(g++);n=h>>2;m=((h&3)<<4)|(f>>4);l=((f&15)<<2)|(e>>6);j=e&63;if(isNaN(f)){l=j=64}else{if(isNaN(e)){j=64}}c+=d.charAt(n)+d.charAt(m)+d.charAt(l)+d.charAt(j)}return c},bitStringTo2DArray:function(f){var e=[];e[0]=[];for(var c=0;c<f.length;c++){e[0][c]=f.charAt(c)}return(e)},resize:function(d,c){d.css("padding","0px").css("overflow","auto").css("width",c+"px").html("");return d},digitToBmpRenderer:function(t,v,o,g,n,z){var e=o.length;var f=o[0].length;var u=0;var r=this.isHexColor(v.bgColor)?this.lec.cHexColor(v.bgColor):this.lec.cRgb(255,255,255);var q=this.isHexColor(v.color)?this.lec.cHexColor(v.color):this.lec.cRgb(0,0,0);var d="";var c="";for(u=0;u<n;u++){d+=r;c+=q}var p="";var m=(4-((n*f*3)%4))%4;var C=(n*f+m)*z*e;var w="";for(u=0;u<m;u++){w+="\0"}var A="BM"+this.lec.cInt(54+C,4)+"\0\0\0\0"+this.lec.cInt(54,4)+this.lec.cInt(40,4)+this.lec.cInt(n*f,4)+this.lec.cInt(z*e,4)+this.lec.cInt(1,2)+this.lec.cInt(24,2)+"\0\0\0\0"+this.lec.cInt(C,4)+this.lec.cInt(2835,4)+this.lec.cInt(2835,4)+this.lec.cInt(0,4)+this.lec.cInt(0,4);for(var h=e-1;h>=0;h--){var l="";for(var j=0;j<f;j++){l+=o[h][j]=="0"?d:c}l+=w;for(var s=0;s<z;s++){A+=l}}var B=document.createElement("object");B.setAttribute("type","image/bmp");B.setAttribute("data","data:image/bmp;base64,"+this.base64Encode(A));this.resize(t,n*f+m).append(B)},digitToBmp:function(g,f,j,d){var c=a.intval(f.barWidth);var e=a.intval(f.barHeight);this.digitToBmpRenderer(g,f,this.bitStringTo2DArray(j),d,c,e)},digitToBmp2D:function(f,e,g,c){var d=a.intval(e.moduleSize);this.digitToBmpRenderer(f,e,g,c,d,d)},digitToCssRenderer:function(q,c,m,e,p,g){var r=m.length;var d=m[0].length;var j="";var o='<div style="float: left; font-size: 0px; background-color: '+c.bgColor+"; height: "+g+'px; width: &Wpx"></div>';var l='<div style="float: left; font-size: 0px; width:0; border-left: &Wpx solid '+c.color+"; height: "+g+'px;"></div>';var f,h;for(var k=0;k<r;k++){f=0;h=m[k][0];for(var n=0;n<d;n++){if(h==m[k][n]){f++}else{j+=(h=="0"?o:l).replace("&W",f*p);h=m[k][n];f=1}}if(f>0){j+=(h=="0"?o:l).replace("&W",f*p)}}if(c.showHRI){j+='<div style="clear:both; width: 100%; background-color: '+c.bgColor+"; color: "+c.color+"; text-align: center; font-size: "+c.fontSize+"px; margin-top: "+c.marginHRI+'px;">'+e+"</div>"}this.resize(q,p*d).html(j)},digitToCss:function(g,f,j,d){var c=a.intval(f.barWidth);var e=a.intval(f.barHeight);this.digitToCssRenderer(g,f,this.bitStringTo2DArray(j),d,c,e)},digitToCss2D:function(f,e,g,c){var d=a.intval(e.moduleSize);this.digitToCssRenderer(f,e,g,c,d,d)},digitToSvgRenderer:function(q,s,m,f,k,t){var d=m.length;var e=m[0].length;var p=k*e;var l=t*d;if(s.showHRI){var g=a.intval(s.fontSize);l+=a.intval(s.marginHRI)+g}var n='<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="'+p+'" height="'+l+'">';n+='<rect width="'+p+'" height="'+l+'" x="0" y="0" fill="'+s.bgColor+'" />';var c='<rect width="&W" height="'+t+'" x="&X" y="&Y" fill="'+s.color+'" />';var r,o;for(var h=0;h<d;h++){r=0;o=m[h][0];for(var j=0;j<e;j++){if(o==m[h][j]){r++}else{if(o=="1"){n+=c.replace("&W",r*k).replace("&X",(j-r)*k).replace("&Y",h*t)}o=m[h][j];r=1}}if((r>0)&&(o=="1")){n+=c.replace("&W",r*k).replace("&X",(e-r)*k).replace("&Y",h*t)}}if(s.showHRI){n+='<g transform="translate('+Math.floor(p/2)+' 0)">';n+='<text y="'+(l-Math.floor(g/2))+'" text-anchor="middle" style="font-family: Arial; font-size: '+g+'px;" fill="'+s.color+'">'+f+"</text>";n+="</g>"}n+="</svg>";var u=document.createElement("object");u.setAttribute("type","image/svg+xml");u.setAttribute("data","data:image/svg+xml,"+n);this.resize(q,p).append(u)},digitToSvg:function(g,f,j,d){var c=a.intval(f.barWidth);var e=a.intval(f.barHeight);this.digitToSvgRenderer(g,f,this.bitStringTo2DArray(j),d,c,e)},digitToSvg2D:function(f,e,g,c){var d=a.intval(e.moduleSize);this.digitToSvgRenderer(f,e,g,c,d,d)},digitToCanvasRenderer:function(s,e,o,g,m,f,q,k){var c=s.get(0);if(!c||!c.getContext){return}var t=o.length;var d=o[0].length;var r=c.getContext("2d");r.lineWidth=1;r.lineCap="butt";r.fillStyle=e.bgColor;r.fillRect(m,f,d*q,t*k);r.fillStyle=e.color;for(var n=0;n<t;n++){var j=0;var l=o[n][0];for(var p=0;p<d;p++){if(l==o[n][p]){j++}else{if(l=="1"){r.fillRect(m+(p-j)*q,f+n*k,q*j,k)}l=o[n][p];j=1}}if((j>0)&&(l=="1")){r.fillRect(m+(d-j)*q,f+n*k,q*j,k)}}if(e.showHRI){var h=r.measureText(g);r.fillText(g,m+Math.floor((d*q-h.width)/2),f+t*k+e.fontSize+e.marginHRI)}},digitToCanvas:function(j,g,l,e){var d=a.intval(g.barWidth);var f=a.intval(g.barHeight);var c=a.intval(g.posX);var k=a.intval(g.posY);this.digitToCanvasRenderer(j,g,this.bitStringTo2DArray(l),e,c,k,d,f)},digitToCanvas2D:function(g,f,j,d){var e=a.intval(f.moduleSize);var c=a.intval(f.posX);var h=a.intval(f.posY);this.digitToCanvasRenderer(g,f,j,d,c,h,e,e)}};b.fn.extend({barcode:function(h,m,f){var n="",g="",d="",k=true,o=false,j=false;if(typeof(h)=="string"){d=h}else{if(typeof(h)=="object"){d=typeof(h.code)=="string"?h.code:"";k=typeof(h.crc)!="undefined"?h.crc:true;o=typeof(h.rect)!="undefined"?h.rect:false}}if(d==""){return(false)}if(typeof(f)=="undefined"){f=[]}for(var c in a.settings){if(f[c]==undefined){f[c]=a.settings[c]}}switch(m){case"std25":case"int25":n=a.i25.getDigit(d,k,m);g=a.i25.compute(d,k,m);break;case"ean8":case"ean13":n=a.ean.getDigit(d,m);g=a.ean.compute(d,m);break;case"upc":n=a.upc.getDigit(d);g=a.upc.compute(d);break;case"code11":n=a.code11.getDigit(d);g=d;break;case"code39":n=a.code39.getDigit(d);g=d;break;case"code93":n=a.code93.getDigit(d,k);g=d;break;case"code128":n=a.code128.getDigit(d);g=d;break;case"codabar":n=a.codabar.getDigit(d);g=d;break;case"msi":n=a.msi.getDigit(d,k);g=a.msi.compute(d,k);break;case"datamatrix":n=a.datamatrix.getDigit(d,o);g=d;j=true;break}if(n.length==0){return(b(this))}if(!j&&f.addQuietZone){n="0000000000"+n+"0000000000"}var l=b(this);var e="digitTo"+f.output.charAt(0).toUpperCase()+f.output.substr(1)+(j?"2D":"");if(typeof(a[e])=="function"){a[e](l,f,n,g)}return(l)}})}(jQuery));