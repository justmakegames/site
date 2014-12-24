FD40.installer("EasySocial", "resources", function($){
$.require.template.loader({"easysocial\/site\/loading\/small":"<div class=\"fd-loading\"><span>Loading ...<\/span><\/div>\r\n","easysocial\/site\/uploader\/queue.item":"<div id=\"[%= file.id %]\" class=\"queue-item is-queue\" data-uploaderQueue-item>\n\t<div class=\"media\">\n\t\t<div class=\"media-body\">\n\t\t\t<div class=\"queue-item-info\">\n\t\t\t\t<span class=\"queue-item-name\">[%= file.name %]<\/span>\n\t\t\t\t<span class=\"queue-item-size\">[%= file.size %] kb<\/span>\n\t\t\t\t<span class=\"queue-item-status\" data-uploaderQueue-status>In Queue<\/span>\n\t\t\t<\/div>\n\n\t\t\t<div class=\"progress progress-success progress-striped\" data-uploaderQueue-progress>\n\t\t\t\t<div class=\"bar\" style=\"width: 0%\" data-uploaderQueue-progressBar><\/div>\n\t\t\t<\/div>\n\n\t\t\t<a href=\"javascript:void(0);\" class=\"attach-remove btn btn-notext pull-right\" data-uploaderQueue-remove>x<\/a>\n\t\t<\/div>\n\t<\/div>\n\t[% if( temporaryUpload ){ %]\n\t\t<input type=\"hidden\" name=\"upload-id[]\" data-uploaderQueue-id \/>\n\t[% } %]\n<\/div>\n","easysocial\/admin\/profiles\/form.fields.editorItem":"<div id=\"[%= uid %]\">Loading field<\/div>\n","easysocial\/admin\/profiles\/form.fields.stepItem":"<!-- duplicate php @ \/profiles\/form.fields.php -->\n<li data-fields-step-item data-fields-step-item-[%= uid %] data-id=\"[%= uid %]\">\n\t<a href=\"#formStep_[%= uid %]\" data-fields-step-item-link data-fields-step-item-link-[%= uid %] data-id=\"[%= uid %]\" data-bs-toggle=\"pill\" data-original-title=\"Set a description\" data-es-provide=\"tooltip\">Set a title<\/a>\n<\/li>\n","easysocial\/admin\/profiles\/form.fields.editorPage":"<!-- duplicate php @ \/profiles\/form.fields.editor.page.php -->\n<div id=\"formStep_[%= uid %]\" class=\"custom-fields tab-pane\" data-fields-editor-page data-fields-editor-page-[%= uid %] data-id=[%= uid %]>\n\n\t<div class=\"fields-editor-page-info-action widget\" data-fields-editor-page-header>\n\t\t<div class=\"wbody wbody-padding\">\n\t\t\t<h3>\n\t\t\t\t<span data-fields-editor-page-title>Set a title<\/span>\n\t\t\t\t<a href=\"javascript:void(0);\" class=\"pull-right btn btn-sm btn-es-danger\" data-fields-editor-page-delete>Delete<\/a>\n\t\t\t\t<a href=\"javascript:void(0);\" class=\"pull-right btn btn-sm btn-es mr-5\" data-fields-editor-page-edit>Edit<\/a>\n\t\t\t<\/h3>\n\t\t\t<hr \/>\n\t\t\t<span data-fields-editor-page-description>Set a description<\/span>\n\t\t<\/div>\n\t<\/div>\n\n\t<div class=\"widget\">\n\t\t<div class=\"wbody wbody-padding\">\n\t\t<fieldset data-fields-editor-page-items data-fields-editor-page-items-[%= uid %] class=\"fields-editor-page-items\">\n\t\t<\/fieldset>\n\t\t<\/div>\n\t<\/div>\n\n<\/div>\n","easysocial\/admin\/profiles\/form.fields.config":"<div class=\"profile-field-config\" data-fields-config>\n\t<h3 data-fields-config-header><\/h3>\n\t<hr \/>\n\t<div class=\"profile-field-close close\" data-fields-config-close>\u00d7<\/div>\n\t<div data-fields-config-form>\n\t<\/div>\n<\/div>\n","easysocial\/admin\/profiles\/dialog.move.field":"<dialog>\n\t<width>400<\/width>\n\t<height>150<\/height>\n\t<title>Move field to page<\/title>\n\t<content>\n\t\t[% if(pages.length === 0) { %]\n\t\t<p>No available page to move this field to. Please create new pages for fields to move to.<\/p>\n\t\t[% } else { %]\n\t\t<p>Select a page to move this field to.<\/p>\n\t\t<div>\n\t\t\t<select data-move-selection>\n\t\t\t\t[% $.each(pages, function(i, page) { %]\n\t\t\t\t<option value=\"[%= page.uid %]\">[%= page.title %]<\/option>\n\t\t\t\t[% }); %]\n\t\t\t<\/select>\n\t\t<\/div>\n\t\t[% } %]\n\t<\/content>\n\t[% if(pages.length > 0) { %]\n\t<buttons>\n\t\t<button data-move-cancel type=\"button\" class=\"btn btn-es btn-sm\">Cancel<\/button>\n\t\t<button data-move-confirm type=\"button\" class=\"btn btn-es-success btn-sm\">Move<\/button>\n\t<\/buttons>\n\t[% } %]\n<\/dialog>\n","easysocial\/admin\/profiles\/dialog.delete.profileavatar":"<dialog>\n\t<width>450<\/width>\n\t<height>150<\/height>\n\t<selectors type=\"json\">\n\t{\n\t\t\"{deleteButton}\"  : \"[data-delete-button]\",\n\t\t\"{cancelButton}\"  : \"[data-cancel-button]\"\n\t}\n\t<\/selectors>\n\t<bindings type=\"javascript\">\n\t{\n\t\t\"{cancelButton} click\" : function()\n\t\t{\n\t\t\tthis.parent.close();\n\t\t}\n\t}\n\t<\/bindings>\n\t<title>Delete Profile Avatar<\/title>\n\t<content>\n\t\t<p>This action is irreversble. Are you sure you want to delete this profile's avatar?<\/p>\n\n\t<\/content>\n\t<buttons>\n\t\t<button data-cancel-button type=\"button\" class=\"btn btn-es btn-sm\">Cancel<\/button>\n\t\t<button data-delete-button type=\"button\" class=\"btn btn-es-danger btn-sm\">Delete<\/button>\n\t<\/buttons>\n<\/dialog>\n","easysocial\/site\/albums\/browser.list.item":"<li data-album-list-item class=\"\">\n\t<a href=\"javascript: void(0);\"><i data-album-list-item-cover><\/i> <span data-album-list-item-title>New Album<\/span> <b data-album-list-item-count>0<\/b><\/a>\n<\/li>","easysocial\/site\/albums\/upload.item":"<div id=\"[%== file.id %]\" data-photo-upload-item class=\"es-photo-upload-item es-photo-item\">\n\t<table>\n\t\t<tr class=\"upload-status\">\n\t\t\t<td>\n\t\t\t\t<div class=\"upload-title\">\n\t\t\t\t\t<span class=\"upload-title-pending\">Pending<\/span>\n\t\t\t\t\t<span class=\"upload-title-preparing\">Preparing to upload...<\/span>\n\t\t\t\t\t<span class=\"upload-title-uploading\">Uploading...<\/span>\n\t\t\t\t\t<span class=\"upload-title-failed\">Upload failed. <span class=\"upload-details-button\" data-popbox data-popbox-type=\"upload\" data-popbox-toggle=\"click\" data-popbox-id=\"fd\" data-popbox-position=\"top\" data-popbox-component=\"es\">(see details)<\/span><\/span>\n\t\t\t\t\t<span class=\"upload-title-done\">Upload completed.<\/span>\n\t\t\t\t<\/div>\n\n\t\t\t\t<div class=\"upload-filename\">[%= file.name %]<\/div>\n\n\t\t\t\t<div class=\"upload-progress progress progress-striped active\">\n\t\t\t\t\t<div class=\"upload-progress-bar bar progress-bar-info\" style=\"width: 0%\"><span class=\"upload-percentage\"><\/span><\/div>\n\t\t\t\t<\/div>\n\n\t\t\t\t<div class=\"upload-filesize\"><span class=\"upload-filesize-total\"><\/span> (<span class=\"upload-filesize-left\"><\/span> left)<\/div>\n\n\t\t\t\t<div class=\"upload-remove-button\"><i class=\"ies-cancel-2\"><\/i><\/div>\n\t\t\t<\/td>\n\t\t<\/tr>\n\t<\/table>\n<\/div>\n","easysocial\/site\/friends\/suggest.item":"[% if (item.avatar) { %]<img src=\"[%== item.avatar %]\" width=\"16\" height=\"16\" \/> [% } %][%== item.screenName %]\r\n<input type=\"hidden\" name=\"[%= name %]\" value=\"[%= item.id %]\" \/>\r\n","easysocial\/site\/friends\/suggest.hint.search":"<span class=\"mentions-autocomplete-search-hint\">Type a name of your friend.<\/span>","easysocial\/site\/friends\/suggest.hint.empty":"<span class=\"mentions-autocomplete-empty-text\">No friends found.<\/span>","easysocial\/site\/hashtags\/suggest.item":"[%== item.title %]\r\n","easysocial\/site\/hashtags\/suggest.hint.search":"<span class=\"mentions-autocomplete-search-hint\">Type a hashtag to search.<\/span>","easysocial\/site\/hashtags\/suggest.hint.empty":"<span class=\"mentions-autocomplete-empty-text\">There are no existing hashtag by that keyword.<\/span>","easysocial\/site\/dialog\/default":"<div class=\"es modal es-dialog\" id=\"fd\">\n\t<div class=\"dialog-wrap\">\n\t\t<div class=\"in\">\n\t\t\t<div class=\"dialog-loader\"><div class=\"loader-img\"><\/div><\/div>\n\t\t\t<div class=\"dialog-head modal-header\">\n\t\t\t\t<button class=\"close dialog-closeButton\" type=\"button\">\u00d7<\/button>\n\t\t\t\t<span class=\"dialog-title\"><\/span>\n\t\t\t<\/div>\n\n\t\t\t<div class=\"dialog-body dialog-content modal-body\">\n\t\t\t<\/div>\n\n\t\t\t<div class=\"dialog-footer modal-footer\">\n\t\t\t\t<div class=\"dialog-loading\"><\/div>\n\t\t\t\t<div class=\"dialog-buttons\"><\/div>\n\t\t\t<\/div>\n\t\t<\/div>\n\t<\/div>\n<\/div>\n","easysocial\/site\/photos\/popup":"<div id=\"fd\" class=\"es es-photo-popup es-responsive\" data-photo-popup>\n\t<div class=\"es-popup-viewport es-media-browser\" data-popup-viewport><\/div>\n\t<div class=\"fd-loading\"><span><\/span><\/div>\n<\/div>\n","easysocial\/site\/location\/story.suggestion":"<div class=\"es-story-location-suggestion\" data-story-location-suggestion>\n\t<span class=\"formatted_address\">[%= location.formatted_address %]<\/span>\n<\/div>","easysocial\/site\/photos\/tags.item":"<div data-photo-tag-item\n     data-photo-tag-position\n     class=\"es-photo-tag-item layout-form\">\n\n\t<div class=\"es-photo-tag-title\"><span data-photo-tag-title><\/span><\/div>\n\n\t<div class=\"es-photo-tag-form\">\n\t\t<i><\/i>\n\t\t<div>\n\t\t\t<fieldset>\n\t\t\t\t<input data-photo-tag-input type=\"text\"\n\t\t\t\t       class=\"form-control input-sm es-photo-tag-input es-photo-tag-input\"\n\t\t\t\t       placeholder=\"Who is this?\" \/>\n\t\t\t\t<a data-photo-tag-remove-button\n\t\t\t\t     class=\"es-photo-tag-remove-button\"><i class=\"ies-cancel-2\"><\/i><\/a>\n\t\t\t<\/fieldset>\n\t\t\t<div class=\"es-photo-tag-menu\" data-photo-tag-menu><\/div>\n\t\t<\/div>\n\t<\/div>\n<\/div>\n","easysocial\/site\/photos\/tags.menu.item":"<div class=\"es-photo-tag-menu-item\" data-photo-tag-menu-item>\n<div class=\"es-photo-tag-menu-name\">\n<img src=\"[%= item.avatar %]\" \/>[%= item.screenName %]\n<\/div>\n<\/div>\n","easysocial\/admin\/profiles\/form.privacy.custom.item":"<li>\n\t<span><a href=\"javascript:void(0);\" class=\"userDeleteButton\">delete<\/a> - <\/span>\n\t<span>[%= userName %]<\/span>\n\t<input type=\"hidden\" name=\"[%= eleName %][]\" value=\"[%= userId %]\"\/>\n<\/li>\n","easysocial\/site\/explorer\/popup":"<div id=\"fd\" class=\"es es-explorer-popup\" data-explorer-popup>\n\t<div class=\"es-popup-viewport\" data-popup-viewport><\/div>\n\t<div class=\"fd-loading\"><span><\/span><\/div>\n<\/div>\n","easysocial\/site\/friends\/default.empty":"<div class=\"empty center mt-20\" data-friends-items>\r\n\t<div>\r\n\t\tYou do not have any friends in this list.\t<\/div>\r\n\r\n\t<div class=\"mt-20\">\r\n\t\t<a href=\"javascript:void(0);\" class=\"btn btn-es btn-medium\" data-friends-add>\r\n\t\t\t<i class=\"icon-es-create\"><\/i> Add Friends\t\t<\/a>\r\n\t<\/div>\r\n<\/div>\r\n","easysocial\/site\/friends\/list.assign":"\n","easysocial\/site\/registration\/dialog.error":"<p>\r\n\tSorry, some information is missing or incomplete. Please check and try again.<\/p>\r\n","easysocial\/site\/advancedsearch\/noresult":"","easysocial\/site\/notifications\/system.empty":"<li class=\"requestItem empty center\">\n\t<div class=\"mt-20 pl-10 pr-10 fd-small\">\n\t\t<i class=\"ies-info ies-small mr-5\"><\/i> No unread notifications\t<\/div>\n<\/li>\n","easysocial\/site\/users\/button.following":"<a href=\"javascript:void(0);\" class=\"btn btn-es-primary btn-sm\"><i class=\"ies-checkmark ies-small mr-5\"><\/i> Following<\/a>\n","easysocial\/apps\/user\/links\/story\/attachment.item":"","easysocial\/apps\/group\/tasks\/story\/attachment.item":"","easysocial\/site\/likes\/item":"<div>\n\t<b>[%= likeCount %]<\/b> Likes.\n\t<span class=\"likeText\"><\/span>\n<\/div>\n","easysocial\/site\/uploader\/preview":"<img src=\"[%= uri %]\" alt=\"[%= title %]\" \/>\n"});
$.require.language.loader({"COM_EASYSOCIAL_SCAN_COMPLETED":"Scan Completed","COM_EASYSOCIAL_INDEXER_REINDEX_PROCESSING":"Processing...","COM_EASYSOCIAL_INDEXER_REINDEX_FINISHED":"Indexing process finished.","COM_EASYSOCIAL_INDEXER_REINDEX_RESTART":"Restart Indexing","COM_EASYSOCIAL_PROFILES_FORM_FIELDS_ITEM_CONFIG_LOADING":"Loading configuration","COM_EASYSOCIAL_PROFILES_FORM_FIELDS_DELETE_PAGE_DIALOG_TITLE":"Delete page","COM_EASYSOCIAL_PROFILES_FORM_FIELDS_DELETE_PAGE_DIALOG_CONFIRMATION":"Are you sure you want to delete this page? Please take note that any unsaved settings will be destroyed.","COM_EASYSOCIAL_PROFILES_FORM_FIELDS_DELETE_PAGE_DIALOG_CONFIRM":"Delete","COM_EASYSOCIAL_PROFILES_FORM_FIELDS_DELETE_PAGE_DIALOG_CANCEL":"Cancel","COM_EASYSOCIAL_PROFILES_FORM_FIELDS_DELETE_PAGE_DIALOG_DELETING":"Deleting","COM_EASYSOCIAL_PROFILES_FORM_FIELDS_DELETE_ITEM_DIALOG_TITLE":"Delete field","COM_EASYSOCIAL_PROFILES_FORM_FIELDS_DELETE_ITEM_DIALOG_CONFIRMATION":"Are you sure you want to delete this item? Please take note that any unsaved settings will be destroyed.","COM_EASYSOCIAL_PROFILES_FORM_FIELDS_DELETE_ITEM_DIALOG_CONFIRM":"Delete","COM_EASYSOCIAL_PROFILES_FORM_FIELDS_DELETE_ITEM_DIALOG_CANCEL":"Cancel","COM_EASYSOCIAL_PROFILES_FORM_FIELDS_DELETE_ITEM_DIALOG_DELETING":"Deleting","COM_EASYSOCIAL_PROFILES_FORM_FIELDS_PARAMS_CORE_UNIQUE_KEY_SAVE_FIRST":"Please save the form first to generate a system unique key.","COM_EASYSOCIAL_PROFILES_FORM_FIELDS_CONFIGURE_PAGE":"Page configuration","COM_EASYSOCIAL_PROFILES_FORM_FIELDS_CONFIGURE_FIELD":"Field configuration","COM_EASYSOCIAL_FIELDS_REQUIRE_MANDATORY_FIELDS":"All mandatory fields are required. Please check and make sure that all mandatory fields has been added to the profile.","COM_EASYSOCIAL_FIELDS_UNSAVED_CHANGES":"There are unsaved changes on custom fields.","COM_EASYSOCIAL_FIELDS_INVALID_VALUES":"There are some invalid configuration values. Please check and correct the field configuration values.","COM_EASYSOCIAL_CANCEL_BUTTON":"Cancel","COM_EASYSOCIAL_ASSIGN_BUTTON":"Assign","COM_EASYSOCIAL_PROFILES_ASSIGN_USER_DIALOG_TITLE":"Assign User","COM_EASYSOCIAL_PROFILES_FORM_CLEAR_AVATAR":"Clear","COM_EASYSOCIAL_CLOSE_BUTTON":"Close","COM_EASYSOCIAL_REPORTS_VIEW_REPORTS_DIALOG_TITLE":"Viewing Reports","COM_EASYSOCIAL_REPORTS_ACTIONS_DIALOG_TITLE":"Actions","COM_EASYSOCIAL_FRIENDS_REQUEST_SENT":"Friend request sent","COM_EASYSOCIAL_CONVERSATIONS_ERROR_EMPTY_RECIPIENTS":"Please add some recipients to your conversation.","COM_EASYSOCIAL_CONVERSATIONS_ERROR_EMPTY_MESSAGE":"Add a message to start your conversation.","COM_EASYSOCIAL_PRIVACY_TOOLTIPS_SHARED_WITH_PUBLIC":"Shared with: Everyone","COM_EASYSOCIAL_PRIVACY_TOOLTIPS_SHARED_WITH_MEMBER":"Shared with: Registered users","COM_EASYSOCIAL_PRIVACY_TOOLTIPS_SHARED_WITH_FRIENDS_OF_FRIEND":"Shared with: My friends of friends","COM_EASYSOCIAL_PRIVACY_TOOLTIPS_SHARED_WITH_FRIEND":"Shared with: My friends","COM_EASYSOCIAL_PRIVACY_TOOLTIPS_SHARED_WITH_ONLY_ME":"Shared with: Only me","COM_EASYSOCIAL_PRIVACY_TOOLTIPS_SHARED_WITH_CUSTOM":"Shared with: Custom","COM_EASYSOCIAL_AT_LOCATION":"at %s","COM_EASYSOCIAL_ACTIVITY_APPS_UNHIDE_SUCCESSFULLY":"Feeds from this app will now be visible on your stream.","COM_EASYSOCIAL_ACTIVITY_USERS_UNHIDE_SUCCESSFULLY":"Feed items from this user will now re-appear on your activity stream.","COM_EASYSOCIAL_ACTIVITY_LOG_LOAD_PREVIOUS_STREAM_ITEMS":"Load previous activity items","COM_EASYSOCIAL_COMMENTS_STATUS_SAVE_ERROR":"Save error","COM_EASYSOCIAL_COMMENTS_STATUS_LOADING":"Loading","COM_EASYSOCIAL_COMMENTS_STATUS_LOAD_ERROR":"Load error","COM_EASYSOCIAL_COMMENTS_STATUS_DELETING":"Deleting","COM_EASYSOCIAL_COMMENTS_STATUS_DELETE_ERROR":"Delete error","COM_EASYSOCIAL_LIKES_LIKE":"Like","COM_EASYSOCIAL_LIKES_UNLIKE":"Unlike","COM_EASYSOCIAL_COMMENTS_LOADED_OF_TOTAL":"%1s of %2s","COM_EASYSOCIAL_COMMENTS_STATUS_SAVING":"Saving","COM_EASYSOCIAL_COMMENTS_STATUS_SAVED":"Saved","COM_EASYSOCIAL_NO_BUTTON":"No","COM_EASYSOCIAL_CONVERSATION_REPLY_POSTED_SUCCESSFULLY":"Your reply has been posted successfully.","COM_EASYSOCIAL_CONVERSATION_REPLY_FORM_EMPTY":"Please enter some message in the form below.","COM_EASYSOCIAL_STREAM_FILTER_WARNING_TITLE_EMPTY":"Filter name is empty. Please enter filter name to proceed.","COM_EASYSOCIAL_STREAM_FILTER_WARNING_HASHTAG_EMPTY":"Hashtag is empty. Please enter your hash tag to proceed.","COM_EASYSOCIAL_EXPLORER_ENTER_FOLDER_NAME":"Enter folder name:","COM_EASYSOCIAL_EXPLORER_INVALID_FOLDER_NAME":"Invalid folder name.","COM_EASYSOCIAL_FRIENDS_REQUEST_SENT_PENDING_APPROVAL":"A request has been sent to <strong>%1s<\/strong>.","COM_EASYSOCIAL_FRIENDS_REQUEST_DIALOG_TITLE":"Friend Request","COM_EASYSOCIAL_FRIENDS_CANCEL_REQUEST_DIALOG_CANCELLED":"Your friend request to %1s has been cancelled.","COM_EASYSOCIAL_FRIENDS_DIALOG_CANCEL_REQUEST":"Cancel friend request","COM_EASYSOCIAL_YES_CANCEL_MY_REQUEST_BUTTON":"Yes, cancel my request","COM_EASYSOCIAL_REGISTRATION_ERROR_DIALOG_TITLE":"Error!","COM_EASYSOCIAL_STREAM_LOAD_PREVIOUS_STREAM_ITEMS":"Load previous stream items","COM_EASYSOCIAL_FRIENDS_REQUEST_SENT_NOTICE":"Friend request sent.","COM_EASYSOCIAL_SEARCH_LOAD_MORE_ITEMS":"Load more items","COM_EASYSOCIAL_SUBSCRIPTION_INFO":"Info","COM_EASYSOCIAL_FRIENDS_REQUEST_REJECTED":"Friend request rejected.","COM_EASYSOCIAL_LOCATION_PERMISSION_ERROR":"Unable to determine your current location. Did you allow your browser to share your location?","COM_EASYSOCIAL_STREAM_META_JOINER":" ","COM_EASYSOCIAL_STORY_SUBMIT_ERROR":"An error occured while posting your status.","COM_EASYSOCIAL_STORY_CONTENT_EMPTY":"Did you forget to write your status text?","COM_EASYSOCIAL_STORY_NOT_ON_STREAM_FILTER":"The story you've just posted is not displayed in this stream because it does not contain relevant hashtags to this stream filter.","COM_EASYSOCIAL_STREAM_STORY_WITH":"with","COM_EASYSOCIAL_STREAM_STORY_WITH_JOINER":", ","COM_EASYSOCIAL_STREAM_STORY_WITH_LAST_JOINER":" and ","COM_EASYSOCIAL_AND":"and","COM_EASYSOCIAL_LOCATION_TIMEOUT_ERROR":"Connection timeout while trying to determine your current location.","COM_EASYSOCIAL_LOCATION_UNAVAILABLE_ERROR":"Your current location could not be determined.","COM_EASYSOCIAL_STREAM_AT":"at","COM_EASYSOCIAL_MOOD_FEELING_CUSTOM":"feeling %1$s","COM_EASYSOCIAL_SUBSCRIPTION_DIALOG_UNSUBSCRIBE":"Unsubscribe","COM_EASYSOCIAL_SUBSCRIPTION_DIALOG_SUBSCRIBE":"Subscribe","COM_EASYSOCIAL_SUBSCRIPTION_BUTTON_OK":"OK","COM_EASYSOCIAL_SUBSCRIPTION_BUTTON_SUBMIT":"Submit","COM_EASYSOCIAL_SUBSCRIPTION_BUTTON_CANCEL":"Cancel","COM_EASYSOCIAL_SUBSCRIPTION_BUTTON_UNSUBSCRIBE":"Unsubscribe","COM_EASYSOCIAL_SUBSCRIPTION_ARE_YOU_SURE_UNSUBSCRIBE":"Are you sure you want to un-subcribe from this item?","COM_EASYSOCIAL_SUBSCRIPTION_BUTTON_SUBSCRIBE":"Subscribe","COM_EASYSOCIAL_STREAM_DIALOG_FEED":"Feed","COM_EASYSOCIAL_STREAM_BUTTON_CLOSE":"Close"});
});
