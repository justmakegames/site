(function(c){var d=function(){var b={textPlaceHolder:"#placeholder_textstats",piePlaceholder:"#placeholder_chartpie",barPlaceholder:"#placeholder_chartbar",usersPlaceHolder:"#placeholder_text",perpagePlaceHolder:"#placeholder_perpage"};var h;var j;var i=jrealtimeIntervalRealStats*1000;this.getModel=function(){modelInstance=new JRealtimeModelRealtimestats(b);return modelInstance};this.getView=function(){viewInstance=new JRealtimeViewRealtimestats(b);return viewInstance};(function a(){h=this.getModel();j=this.getView();setTimeout(function(){j.renderCharts(false);var g=h.doPoll();if(!Array.isArray(g)){j.renderErrorMessages(g);clearInterval(e);return}j.renderTextData(g);j.renderUserlistStats(g);j.renderPerPagesStats(g);j.renderMap(g)},100);setTimeout(function(){c("text").filter(function(g){return c(this).text()=="NaN"}).hide();c(".preview").fancybox({width:"85%",height:"90%",autoScale:false,transitionOut:"none",type:"iframe"})},101);var e=setInterval(function f(){var g=h.doPoll();if(g.length>1){j.renderTextData(g);j.renderCharts(g);c("text").filter(function(l){return c(this).text()=="NaN"}).hide()}j.renderUserlistStats(g);j.renderPerPagesStats(g);j.renderMap(g);c(".preview").fancybox({width:"85%",height:"90%",autoScale:false,transitionOut:"none",type:"iframe"})},i);c(window).on("resize",function(){j.redrawCharts()})}).call(this)};window.JRealtimeControllerRealtimestats=d})(jQuery);