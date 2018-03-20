<?php

/** IMPORTANT
 *  Change the below variable to the path to your wiki installation (without the trailing slash)
 */

$bluwiki_skin_url = 'http://www.bluwiki.com';

/**
 * bluwiki_skin nouveau
 *
 * Translated from gwicke's previous TAL template version to remove
 * dependency on PHPTAL.
 *
 * @todo document
 * @package MediaWiki
 * @subpackage Skins
 */


if( !defined( 'MEDIAWIKI' ) )
	die();

/** */
require_once('includes/SkinTemplate.php');

/**
 * Inherit main code from SkinTemplate, set the CSS and template filter.
 * @todo document
 * @package MediaWiki
 * @subpackage Skins
 */
class Skinbluwiki_skin extends SkinTemplate {
	/** Using bluwiki_skin. */
	function initPage( &$out ) {
		SkinTemplate::initPage( $out );
		$this->skinname  = 'bluwiki_skin';
		$this->stylename = 'bluwiki_skin';
		$this->template  = 'bluwiki_skinTemplate';
	}
}

/**
 * @todo document
 * @package MediaWiki
 * @subpackage Skins
 */
class bluwiki_skinTemplate extends QuickTemplate {
	/**
	 * Template filter callback for bluwiki_skin skin.
	 * Takes an associative array of data set from a SkinTemplate-based
	 * class, and a wrapper for MediaWiki's localization database, and
	 * outputs a formatted page.
	 *
	 * @access private
	 */
	function execute() {
		// Suppress warnings to prevent notices about missing indexes in $this->data
		wfSuppressWarnings();

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php $this->text('lang') ?>" lang="<?php $this->text('lang') ?>" dir="<?php $this->text('dir') ?>">
  <head>
    <meta http-equiv="Content-Type" content="<?php $this->text('mimetype') ?>; charset=<?php $this->text('charset') ?>" />
    <?php $this->html('headlinks') ?>
    <title><?php $this->text('title') ?></title>
    <style type="text/css" media="screen">/*<![CDATA[*/ @import "<?php $bluwiki_skin_url.$this->text('stylepath') ?>/<?php $this->text('stylename') ?>/main.css"; /*]]>*/</style>
    <link rel="stylesheet" type="text/css" <?php if(empty($this->data['printable']) ) { ?>media="print"<?php } ?> href="<?php $bluwiki_skin_url.$this->text('stylepath') ?>/bluwiki_skin/clean.css" />
    <!--[if lt IE 5.5000]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE50Fixes.css";</style><![endif]-->
    <!--[if IE 5.5000]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE55Fixes.css";</style><![endif]-->
    <!--[if gte IE 6]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE60Fixes.css";</style><![endif]-->
    <!--[if IE]><script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath') ?>/common/IEFixes.js"></script>
    <meta http-equiv="imagetoolbar" content="no" /><![endif]-->

	<!--[if lt IE 7]>
	<script defer type="text/javascript" src="<?php $this->text('stylepath') ?>/common/pngfix.js"></script>
	<![endif]-->

    <?php if($this->data['jsvarurl'  ]) { ?><script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('jsvarurl'  ) ?>"></script><?php } ?>
    <script type="<?php $this->text('jsmimetype') ?>" src="<?php                                   $this->text('stylepath' ) ?>/common/wikibits.js"></script>
    <?php if($this->data['usercss'   ]) { ?><style type="text/css"><?php              $this->html('usercss'   ) ?></style><?php    } ?>
    <?php if($this->data['userjs'    ]) { ?><script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('userjs'    ) ?>"></script><?php } ?>
    <?php if($this->data['userjsprev']) { ?><script type="<?php $this->text('jsmimetype') ?>"><?php      $this->html('userjsprev') ?></script><?php   } ?>
    <?php if($this->data['trackbackhtml']) print $this->data['trackbackhtml']; ?>

 	<!-- Head Scripts -->
 	<?php $this->html('headscripts') ?>

  </head>
  <body <?php if($this->data['body_ondblclick']) { ?>ondblclick="<?php $this->text('body_ondblclick') ?>"<?php } ?>
        <?php if($this->data['body_onload'    ]) { ?>onload="<?php     $this->text('body_onload')     ?>"<?php } ?>
        <?php if($this->data['nsclass'        ]) { ?>class="<?php      $this->text('nsclass')         ?>"<?php } ?>>

	<div id="titleBar">
		<?php foreach($this->data['personal_urls'] as $key => $item) {
			if ($key == 'userpage' || $key =='anonlogin' || $key == 'login'){ ?>
				<a href="<?php echo htmlspecialchars($item['href']) ?>"<?php if(!empty($item['class'])) { ?> class="<?php
			    echo htmlspecialchars($item['class']) ?>"<?php } ?> title="<?php echo htmlspecialchars($item['text']) ?>"><?php echo htmlspecialchars($item['text']) ?></a>
			<?php }
			if ($key == 'logout'){ ?>
				<a href="<?php echo htmlspecialchars($item['href']) ?>"<?php if(!empty($item['class'])) { ?> class="<?php
			    echo htmlspecialchars($item['class']) ?>"<?php } ?> title="<?php echo htmlspecialchars($item['text']) ?>"><img src="<?php $this->text('stylepath') ?>/bluwiki_skin/<?php echo htmlspecialchars($item['text']) ?>-small.png" alt="<?php echo htmlspecialchars($item['text']) ?>"/></a>
			<?php }
			
		} ?>
		
		<?php foreach($this->data['content_actions'] as $key => $action) {
			if ($key == 'edit' || $key == 'history' || $key == 'watch' || $key == 'unwatch' || $key == 'talk'){ ?>
				<a href="<?php echo htmlspecialchars($action['href']);?>" title="<?php echo htmlspecialchars($action['text']) ?>"><img src="<?php $this->text('stylepath') ?>/bluwiki_skin/<?php echo htmlspecialchars($action['text']) ?>-small.png"  class="<?php echo htmlspecialchars($action['class']) ?>" alt="<?php echo htmlspecialchars($action['text']) ?>"/></a>
			<?php } ?>
			
			<?php if ($key == 'nstab-main' || $key == 'nstab-user' || $key == 'nstab-wp' || $key == 'nstab-help'){ ?>
				<a href="<?php echo htmlspecialchars($action['href']);?>" title="<?php echo htmlspecialchars($action['text']) ?>"><img src="<?php $this->text('stylepath') ?>/bluwiki_skin/Article-small.png" class="<?php echo htmlspecialchars($action['class']) ?>" alt="<?php echo htmlspecialchars($action['text']) ?>"/></a>
			<?php } ?>
			
						
		<?php } ?>
		
		
		
		
	<a href="#toolbox" title="Go to the site toolbox"><img src="<?php $this->text('stylepath') ?>/bluwiki_skin/Gobottom-small.png" alt="Go to the site toolbox" /></a>
	</div>

    <div id="globalWrapper">
	<div id="content">
	  <a name="top" id="contentTop"></a>
	  <?php if($this->data['sitenotice']) { ?><div id="siteNotice"><?php $this->html('sitenotice') ?></div><?php } ?>
	  <h1 class="firstHeading"><?php $this->text('title') ?></h1>
	  <div id="bodyContent">
	    <h3 id="siteSub"><?php $this->msg('tagline') ?></h3>
	    <div id="contentSub"><?php $this->html('subtitle') ?></div>
	    <?php if($this->data['undelete']) { ?><div id="contentSub"><?php     $this->html('undelete') ?></div><?php } ?>
	    <?php if($this->data['newtalk'] ) { ?><div class="usermessage"><?php $this->html('newtalk')  ?></div><?php } ?>
	    <!-- start content -->
	    <?php $this->html('bodytext') ?>
	    <?php if($this->data['catlinks']) { ?><div id="catlinks"><?php       $this->html('catlinks') ?></div><?php } ?>
	    <!-- end content -->
	    <div class="visualClear"></div>
	  </div>
	</div>

    
      <div class="visualClear"></div>


	<div id="toolbox">
		<a name="toolbox"></a>
		<h3>Site Toolbox:</h3>
	
	
	<div id="p-search" class="portlet">
	  <h5><label for="searchInput"><?php $this->msg('search') ?></label></h5>
	  <div class="pBody">
	    <form name="searchform" action="<?php $this->text('searchaction') ?>" id="searchform">
	      <input id="searchInput" name="search" type="text"
	        <?php if($this->haveMsg('accesskey-search')) {
	          ?>accesskey="<?php $this->msg('accesskey-search') ?>"<?php }
	        if( isset( $this->data['search'] ) ) {
	          ?> value="<?php $this->text('search') ?>"<?php } ?> /><br/>
	      <input type='submit' name="go" class="searchButton" id="searchGoButton"
	        value="<?php $this->msg('go') ?>"
	        /><input type='submit' name="fulltext"
	        class="searchButton"
	        value="<?php $this->msg('search') ?>" />
	    </form>
	  </div>
	</div>
		
	<div id="p-cactions" class="portlet">
		<h5><?php $this->msg('views') ?></h5>
		<ul>
		<?php foreach($this->data['content_actions'] as $key => $action) {
		   	?><li id="ca-<?php echo htmlspecialchars($key) ?>"
	    	<?php if($action['class']) { ?>class="<?php echo htmlspecialchars($action['class']) ?>"<?php } ?>
		    ><a href="<?php echo htmlspecialchars($action['href']) ?>"><?php
		    echo htmlspecialchars($action['text']) ?></a></li><?php
		  } ?>
		</ul>
	</div>


	<div class="portlet" id="p-tb">
	  <h5><?php $this->msg('toolbox') ?></h5>
	  <div class="pBody">
	    <ul>
		  <?php if($this->data['notspecialpage']) { foreach( array( 'whatlinkshere', 'recentchangeslinked' ) as $special ) { ?>
		  <li id="t-<?php echo $special?>"><a href="<?php
		    echo htmlspecialchars($this->data['nav_urls'][$special]['href'])
		    ?>"><?php echo $this->msg($special) ?></a></li>
		  <?php } } ?>
              <?php if(isset($this->data['nav_urls']['trackbacklink'])) { ?>
		  <li id="t-trackbacklink"><a href="<?php
		    echo htmlspecialchars($this->data['nav_urls']['trackbacklink']['href'])
		    ?>"><?php echo $this->msg('trackbacklink') ?></a></li>
	      <?php } ?>
	      <?php if($this->data['feeds']) { ?><li id="feedlinks"><?php foreach($this->data['feeds'] as $key => $feed) {
	        ?><span id="feed-<?php echo htmlspecialchars($key) ?>"><a href="<?php
	        echo htmlspecialchars($feed['href']) ?>"><?php echo htmlspecialchars($feed['text'])?></a>&nbsp;</span>
	        <?php } ?></li><?php } ?>
	      <?php foreach( array('contributions', 'emailuser', 'upload', 'specialpages') as $special ) { ?>
	      <?php if($this->data['nav_urls'][$special]) {?><li id="t-<?php echo $special ?>"><a href="<?php
	        echo htmlspecialchars($this->data['nav_urls'][$special]['href'])
	        ?>"><?php $this->msg($special) ?></a></li><?php } ?>
	      <?php } ?>
	      <?php if(!empty($this->data['nav_urls']['print']['href'])) { ?>
	      <li id="t-print"><a href="<?php
		    echo htmlspecialchars($this->data['nav_urls']['print']['href'])
		    ?>"><?php echo $this->msg('printableversion') ?></a></li>
	      <?php } ?>
	
		<?php if(!empty($this->data['nav_urls']['permalink']['href'])) { ?>
				<li id="t-permalink"><a href="<?php echo htmlspecialchars($this->data['nav_urls']['permalink']['href'])
				?>"><?php $this->msg('permalink') ?></a></li><?php
		} elseif ($this->data['nav_urls']['permalink']['href'] === '') { ?>
				<li id="t-ispermalink"><?php $this->msg('permalink') ?></li><?php
		}
		
		#Note: I added this line in but didn't properly make sure it's compatible.
		wfRunHooks( 'MonoBookTemplateToolboxEnd', array( &$this ) );
?>

	    </ul>
	  </div>
	</div>

	<div class="portlet" id="p-personal">
	  <h5><?php $this->msg('personaltools') ?></h5>
	  <div class="pBody">
	    <ul>
	    <?php foreach($this->data['personal_urls'] as $key => $item) {
	       ?><li id="pt-<?php echo htmlspecialchars($key) ?>"><a href="<?php
	       echo htmlspecialchars($item['href']) ?>"<?php
	       if(!empty($item['class'])) { ?> class="<?php
	       echo htmlspecialchars($item['class']) ?>"<?php } ?>><?php
	       echo htmlspecialchars($item['text']) ?></a></li><?php
	    } ?>
	    </ul>
	  </div>
	</div>



	
	<div class="portlet" id="p-logo">
	  <a style="background-image: url(<?php $this->text('logopath') ?>);"
	    href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href'])?>"
	    title="<?php $this->msg('mainpage') ?>"></a>
	</div>
	<script type="<?php $this->text('jsmimetype') ?>"> if (window.isMSIE55) fixalpha(); </script>
	<?php foreach ($this->data['sidebar'] as $bar => $cont) { ?>
	<div class='portlet' id='p-<?php echo htmlspecialchars($bar) ?>'>
	  <h5><?php $out = wfMsg( $bar ); if (wfEmptyMsg($bar, $out)) echo $bar; else echo $out; ?></h5>
	  <div class='pBody'>
	    <ul>
	    <?php foreach($cont as $key => $val) { ?>
	      <li id="<?php echo htmlspecialchars($val['id']) ?>"><a href="<?php echo htmlspecialchars($val['href']) ?>"><?php echo htmlspecialchars($val['text'])?></a></li>
	     <?php } ?>
	    </ul>
	  </div>
	</div>
	<?php } ?>



	<?php if( $this->data['language_urls'] ) { ?><div id="p-lang" class="portlet">
	  <h5><?php $this->msg('otherlanguages') ?></h5>
	  <div class="pBody">
	    <ul>
	      <?php foreach($this->data['language_urls'] as $langlink) { ?>
	      <li class="<?php echo htmlspecialchars($langlink['class'])?>">
	      <a href="<?php echo htmlspecialchars($langlink['href'])
	        ?>"><?php echo $langlink['text'] ?></a>
	      </li>
	      <?php } ?>
	    </ul>
	  </div>
	</div>
	
	<?php } ?>

    <div class="visualClear"></div>

		<table width = "100%">
			<tr><td width="5%" align="left" nowrap='nowrap'><?php if($this->data['copyrightico']) { ?><div id="f-copyrightico"><?php $this->html('copyrightico') ?></div><?php } ?></td>
				<td align="center">
	   <?php if($this->data['lastmod'   ]) { ?><?php    $this->html('lastmod')    ?> - <?php } ?>
	  <?php if($this->data['viewcount' ]) { ?><?php  $this->html('viewcount')  ?> - <?php } ?>
	  <?php if($this->data['numberofwatchingusers' ]) { ?><?php  $this->html('numberofwatchingusers') ?> - <?php } ?>
	  <?php if($this->data['credits'   ]) { ?><?php    $this->html('credits')    ?> - <?php } ?>
	  <?php if($this->data['tagline']) { ?><?php echo $this->data['tagline'] ?> - <?php } ?>
	  <?php if($this->data['disclaimer']) { ?><?php $this->html('disclaimer') ?> - <?php } ?>
	  <?php if($this->data['about'     ]) { ?><?php      $this->html('about')      ?><?php } ?>
	</td>
			<?php $credits = '<br/><a href="&#104;t&#116;p&#58;//b&#108;u&#119;ik&#105;.&#99;om&#47;&#103;&#111;&#47;&#66;luW&#105;&#107;i&#58;&#83;ki&#110;">B&#108;uWiki&#39;&#115; si&#109;ple sk&#105;&#110;</a>'; ?>
			
			<td width="5%" align="right" nowrap='nowrap'><?php if($this->data['poweredbyico']) { ?><div id="f-poweredbyico"><?php $this->html('poweredbyico'); echo $credits; ?></div><?php } ?></td></tr></table>

    
	</div>



    <?php $this->html('reporttime') ?>

	<?php 
	if (file_exists("google_stats.php")) { 
		include ("google_stats.php");
	}
	
	if (file_exists("honeypot.php")) { 
		include ("honeypot.php");
	}
	
	?>

	</div> <!-- Close global wrapper -->
  </body>
</html>
<?php
	wfRestoreWarnings();
	}
}
?>
