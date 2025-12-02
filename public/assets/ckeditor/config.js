/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

// CKEDITOR.editorConfig = function( config ) {
// 	// Define changes to default configuration here.
// 	// For complete reference see:
// 	// https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html

// 	// The toolbar groups arrangement, optimized for two toolbar rows.
// 	config.toolbarGroups = [
// 		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
// 		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
// 		{ name: 'links' },
// 		{ name: 'insert' },
// 		{ name: 'forms' },
// 		{ name: 'tools' ,		groups: [ 'table', 'pastefromword', 'magicline' ] },
// 		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
// 		{ name: 'others' },
// 		'/',
// 		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
// 		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
// 		{ name: 'styles' },
// 		{ name: 'colors' },
// 		{ name: 'about' }
// 	];

// 	// Remove some buttons provided by the standard plugins, which are
// 	// not needed in the Standard(s) toolbar.
// 	config.removeButtons = 'Underline,Subscript,Superscript';

// 	// Set the most common block elements.
// 	config.format_tags = 'p;h1;h2;h3;pre';

// 	// Simplify the dialog windows.
// 	config.removeDialogTabs = 'image:advanced;link:advanced';

// 	// config.extraPlugins = 'imageuploader';
// 	config.allowedContent = true;
//     config.extraAllowedContent = '*(*);*{*}';
	
// };

CKEDITOR.editorConfig = function(config) {
    // Allow all content without filtering
    config.allowedContent = true;

    // Explicitly allow all tags, attributes, classes, and styles
    config.extraAllowedContent = '*(*);*{*}';

    // Disable auto-wrapping content in <p> tags
    config.autoParagraph = false;

    // Disable automatic entity conversion (e.g., & to &amp;)
    config.entities = false;
    config.basicEntities = false;
    config.entities_additional = '';
    
    // Ensure that pasted content is not filtered
    config.forcePasteAsPlainText = false;
    config.pasteFromWordRemoveFontStyles = false;
    config.pasteFromWordRemoveStyles = false;

    // Disable auto inline style processing
    config.disallowedContent = 'script; *[on*]';

    // Prevent CKEditor from adding empty blocks or modifying structure
    config.fillEmptyBlocks = false;

    // Disable Magicline, which adds extra elements
    config.removePlugins = 'magicline,elementspath';

    // Start in Source mode by default to avoid any modification
    config.startupMode = 'source';

    // Simplify the toolbar to only allow editing in source mode
    // config.toolbar = [
    //     { name: 'document', items: ['Source'] },
    //     { name: 'basicstyles', items: ['Bold', 'Italic'] }
    // ];
		config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' ,		groups: [ 'table', 'pastefromword', 'magicline' ] },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

    // Prevent any automatic conversion of special characters
    config.forceSimpleAmpersand = true;
};



