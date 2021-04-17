var pngAlpha = 1;
var ua = navigator.userAgent.toLowerCase();

this.isIE = ((ua.indexOf('msie') != -1) && !(ua.indexOf('opera') != -1) && (ua.indexOf('webtv') == -1));
this.versionMinor = parseFloat(navigator.appVersion);
this.versionMajor = parseInt(navigator.appVersion);

if(this.isIE && this.versionMinor >= 4) this.versionMinor = parseFloat(ua.substring(ua.indexOf('msie ')+5));
if(this.isIE && parseInt(this.versionMinor)<7) pngAlpha = 0;

function PNGImage(img,png,w,h)
{
       if(!pngAlpha) return '<img src="http://'+img_host+'/'+img+'" width="'+w+'" height="'+h+'" border="0" style="FILTER: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'http://'+img_host+'/'+png+'\')">';
       else return '<img src="http://'+img_host+'/'+img+'" width="'+w+'" height="'+h+'" border="0" style="background-image: url(\'http://'+img_host+'/'+png+'\');">';
}