EasySocial.module("story/quickpost", function($){

	var module = this;

	EasySocial.require()
		.done(function(){

			EasySocial.Controller("Story.Quickpost",
				{
					defaultOptions: {
						"{submitButton}" : "[data-quickpost-submit]",
						"{content}" : "[data-quickpost-content]",
						"{message}" : "[data-quickpost-message]",
						"{privacyButton}": "[data-story-privacy]"

						
					}
				},
				function(self)
				{
					return {

					init: function()
					{
					},

					"{submitButton} click": function(el)
					{ 
						id = el.data('quickpost-userid');
			            content = self.content().val();
			            
			            EasySocial.ajax('site/controllers/story/simpleCreate', {
			                'target': id,
			                'privacy': 'public',
			                'content': content
			            })
			            .done(function(html, id) {
			            	self.message().html('Your story has been posted.');
			            	self.message().addClass('alert fade in alert-success');

			            	// Clear the textfield.
			            	self.content().val('');
			            	
			                self.trigger("create", [html, id]);
			            })
			            .fail(function(result) {
			                self.message().html(result.message);
			                self.message().addClass('alert fade in alert-warning');
			                
			            });
					},
					"{privacyButton} click": function(el) {
						
						setTimeout(function(){
							var isActive = el.find("[data-es-privacy-container]").hasClass("active");
							// self.footer().toggleClass("allow-overflow", isActive);
						}, 1);
					}
				}}
			);

			// Resolve module
			module.resolve();

		});
});
