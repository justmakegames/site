(function(c){var d=function(b){var a=b.targetURL;var f={level1:{labelcolor:"green",review:COM_JREALTIME_VERYFAST,lowerlimit:0,upperlimit:1,percentage:80,direction:COM_JREALTIME_SLOWER},level2:{labelcolor:"green",review:COM_JREALTIME_FAST,lowerlimit:1,upperlimit:2,percentage:60,direction:COM_JREALTIME_SLOWER},level3:{labelcolor:"green",review:COM_JREALTIME_AVERAGE,lowerlimit:2,upperlimit:3,percentage:50,direction:COM_JREALTIME_FASTER},level4:{labelcolor:"yellow",review:COM_JREALTIME_AVERAGE,lowerlimit:3,upperlimit:4,percentage:60,direction:COM_JREALTIME_FASTER},level5:{labelcolor:"yellow",review:COM_JREALTIME_SLOW,lowerlimit:4,upperlimit:6,percentage:80,direction:COM_JREALTIME_FASTER},level6:{labelcolor:"red",review:COM_JREALTIME_VERYSLOW,lowerlimit:6,upperlimit:99999,percentage:null,direction:COM_JREALTIME_SPEEDTEST_ADVICE}};this.getData=function(e){var m=a;if(b.useNoCache){m=m+"?time="+(new Date().getTime())}var p={};var l=new Date();var n=l.getTime();var o=c.ajax({type:"GET",async:true,url:m,dataType:"html"});o.always(function(){var i=new Date();var h=i.getTime();var g=(h-n)/1000;c.each(f,function(k,j){if(g>j.lowerlimit&&g<j.upperlimit){p.review=j.review+j.direction.replace("{percentage}",j.percentage);p.labelcolor=j.labelcolor;return false}});p.timeSpeed={label:COM_JREALTIME_PAGELOADED_TIME.replace("{seconds}",g),floatvalue:g};e.fire(p)})}};window.JRealtimeModelSitespeed=d})(jQuery);