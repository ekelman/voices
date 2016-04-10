/*
 * FCKeditor - The text editor for Internet - http://www.fckeditor.net
 * Copyright (C) 2003-2010 Frederico Caldeira Knabben
 *
 * == BEGIN LICENSE ==
 *
 * Licensed under the terms of any of the following licenses at your
 * choice:
 *
 *  - GNU General Public License Version 2 or later (the "GPL")
 *    http://www.gnu.org/licenses/gpl.html
 *
 *  - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 *    http://www.gnu.org/licenses/lgpl.html
 *
 *  - Mozilla Public License Version 1.1 or later (the "MPL")
 *    http://www.mozilla.org/MPL/MPL-1.1.html
 *
 * == END LICENSE ==
 *
 * Creation and initialization of the "FCK" object. This is the main
 * object that represents an editor instance.
 * (Gecko specific implementations)
 */

FCK.Description = "FCKeditor for Gecko Browsers" ;

FCK.InitializeBehaviors = function()
{
	// When calling "SetData", the editing area IFRAME gets a fixed height. So we must recalculate it.
	if ( window.onresize )		// Not for Safari/Opera.
		window.onresize() ;

	FCKFocusManager.AddWindow( this.EditorWindow ) ;

	this.ExecOnSelectionChange = function()
	{
		FCK.Events.FireEvent( "OnSelectionChange" ) ;
	}

	this._ExecDrop = function( evt )
	{
		if ( FCK.MouseDownFlag )
		{
			FCK.MouseDownFlag = false ;
			return ;
		}

		if ( FCKConfig.ForcePasteAsPlainText )
		{
			if ( evt.dataTransfer )
			{
				var text = evt.dataTransfer.getDatarst InsertHtml() call.
	this.Events.FireEvent( "OnSelectionChange" ) ;
}

FCK.PasteAsPlainText = function()
{
	// TODO: Implement the "Paste as Plain Text" code.

	// If the function is called immediately Firefox 2 does automatically paste the contents as soon as the new dialog is created
	// so we run it in a Timeout and the paste event can be cancelled
	FCKTools.RunFunction( FCKDialog.OpenDialog, FCKDialog, ['FCKDialog_Paste', FCKLang.PasteAsText, 'dialog/fck_paste.html', 400, 330, 'PlainText'] ) ;

/*
	var sText = FCKTools.HTMLEncode( clipboardData.getData("Text") ) ;
	sText = sText.replace( /\n/g, '<BR>' ) ;
	this.InsertHtml( sText ) ;
*/
}
/*
FCK.PasteFromWord = function()
{
	// TODO: Implement the "Paste as Plain Text" code.

	FCKDialog.OpenDialog( 'FCKDialog_Paste', FCKLang.PasteFromWord, 'dialog/fck_paste.html', 400, 330, 'Word' ) ;

//	FCK.CleanAndPaste( FCK.GetClipboardHTML() ) ;
}
*/
FCK.GetClipboardHTML = function()
{
	return '' ;
}

FCK.CreateLink = function( url, noUndo )
{
	// Creates the array that will be returned. It contains one or more created links (see #220).
	var aCreatedLinks = new Array() ;

	// Only for Safari, a collapsed selection may create a link. All other
	// browser will have no links created. So, we check it here and return
	// immediatelly, having the same cross browser behavior.
	if ( FCKSelection.GetSelection().isCollapsed )
		return aCreatedLinks ;

	FCK.ExecuteNamedCommand( 'Unlink', null, false, !!noUndo ) ;

	if ( url.length > 0 )
	{
		// Generate a temporary name for the link.
		var sTempUrl = 'javascript:void(0);/*' + ( new Date().getTime() ) + '*/' ;

		// Use the internal "CreateLink" command to create the link.
		FCK.ExecuteNamedCommand( 'CreateLink', sTempUrl, false, !!noUndo ) ;

		// Retrieve the just created links using XPath.
		var oLinksInteractor = this.EditorDocument.evaluate("//a[@href='" + sTempUrl + "']", this.EditorDocument.body, null, XPathResult.UNORDERED_NODE_SNAPSHOT_TYPE, null) ;

		// Add all links to the returning array.
		for ( var i = 0 ; i < oLinksInteractor.snapshotLength ; i++ )
		{
			var oLink = oLinksInteractor.snapshotItem( i ) ;
			oLink.href = url ;

			aCreatedLinks.push( oLink ) ;
		}
	}

	return aCreatedLinks ;
}

FCK._FillEmptyBlock = function( emptyBlockNode )
{
	if ( ! emptyBlockNode || emptyBlockNode.nodeType != 1 )
		return ;
	var nodeTag = emptyBlockNode.tagName.toLowerCase() ;
	if ( nodeTag != 'p' && nodeTag != 'div' )
		return ;
	if ( emptyBlockNode.firstChild )
		return ;
	FCKTools.AppendBogusBr( emptyBlockNode ) ;
}

FCK._ExecCheckEmptyBlock = function()
{
	FCK._FillEmptyBlock( FCK.EditorDocument.body.firstChild ) ;
	var sel = FCKSelection.GetSelection() ;
	if ( !sel || sel.rangeCount < 1 )
		return ;
	var range = sel.getRangeAt( 0 );
	FCK._FillEmptyBlock( range.startContainer ) ;
}
