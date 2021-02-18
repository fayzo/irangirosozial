/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
	config.extraPlugins = 'wordcount,notification';
	// config.toolbar = [
	// 	{ name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'ExportPdf', 'Preview', 'Print', '-', 'Templates' ] },
	// 	{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
	// 	{ name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
	// 	{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
	// 	'/',
	// 	{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
	// 	{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
	// 	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
	// 	{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
	// 	'/',
	// 	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
	// 	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
	// 	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
	// 	{ name: 'about', items: [ 'About' ] }
	// ];
	config.wordcount = {
	
		// Whether or not you want to show the Paragraphs Count
		showParagraphs: true,
	
		// Whether or not you want to show the Word Count
		showWordCount: true,
	
		// Whether or not you want to show the Char Count
		showCharCount: false,
	
		// Whether or not you want to count Spaces as Chars
		countSpacesAsChars: false,
	
		// Whether or not to include Html chars in the Char Count
		countHTML: false,
		
		// Whether or not to include Line Breaks in the Char Count
		countLineBreaks: false,
	
		// Maximum allowed Word Count, -1 is default for unlimited
		maxWordCount: -1,
	
		// Maximum allowed Char Count, -1 is default for unlimited
		maxCharCount: -1,
		
		// Maximum allowed Paragraphs Count, -1 is default for unlimited
		maxParagraphs: -1,
	
		// How long to show the 'paste' warning, 0 is default for not auto-closing the notification
		pasteWarningDuration: 0,

		// Add filter to add or remove element before counting (see CKEDITOR.htmlParser.filter), Default value : null (no filter)
		filter: new CKEDITOR.htmlParser.filter({
			elements: {
				div: function( element ) {
					if(element.attributes.class == 'mediaembed') {
						return false;
					}
				}
			}
		})
	};
};