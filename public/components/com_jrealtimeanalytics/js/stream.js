(function(a){var b=function(){var f=this;var e=null;var c=false;var d=2000;this.showDebugMsgs=function(h,g){if(c){if(!a("div#jrealtime_msg").length){a("<div/>").attr("id","jrealtime_msg").prependTo("body").append('<div id="jrealtime_msgtitle">'+h+"</div>").append('<div id="jrealtime_msgtext">'+g+"</div>").css("margin-top",0).animate({"margin-top":"-150px"},300,"linear")}}};this.dispatch=function(i){var g=jrealtimeBaseURI+"index.php?option=com_jrealtimeanalytics&format=json";var h={};h.task="stream.display";h.nowpage=a(location).attr("href");h.initialize=i;h.module_available=parseInt(a("#jes_mod").length);a.ajax({url:g,data:h,type:"post",cache:false,dataType:"json",success:function(j,l,k){if(j){if(j.configparams){d=j.configparams.daemonrefresh*1000;c=!!parseInt(j.configparams.enable_debug)}if(j.storing&&j.storing.length){a.each(j.storing,function(m,n){f.showDebugMsgs(n.corefile,n.details)})}else{setTimeout(function(){f.dispatch()},d)}if(j.loading&&j.loading.length){a.each(j.loading,function(m,n){f.showDebugMsgs(n.corefile,n.details)})}else{if(j["data-bind"]){a.each(j["data-bind"],function(m,n){a("#jes_mod span.badge[data-bind="+m+"]").text(n)})}}if(typeof(JRealtimeHeatmap)!=="undefined"&&!e){e=new JRealtimeHeatmap(j.configparams,f);e.startListening()}}},error:function(k,l,j){text=COM_JREALTIME_NETWORK_ERROR+j;f.showDebugMsgs("Client side stream",text)}})}};window.JRealtimeStream=b;a(function(){var c=new JRealtimeStream();c.dispatch(true)})})(jQuery);