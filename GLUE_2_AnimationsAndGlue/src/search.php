<?php

/**
 * @copyright  Copyright 2012 metaio GmbH. All rights reserved.
 * @link       http://www.metaio.com
 * @author     Frank Angermann
 **/

require_once '../library/arel_xmlhelper.class.php';
 
/**
 * When the channel is being viewed, a poi request will be sent
 * $_GET['l']...(optional) Position of the user when requesting poi search information
 * $_GET['o']...(optional) Orientation of the user when requesting poi search information
 * $_GET['p']...(optional) perimeter of the data requested in meters.
 * $_GET['uid']... Unique user identifier
 * $_GET['m']... (optional) limit of to be returned values
 * $_GET['page']...page number of result. e.g. m = 10: page 1: 1-10; page 2: 11-20, e.g.
 **/
 
//use the Arel Helper to start the output with arel

//start output
ArelXMLHelper::start(NULL, WWW_ROOT . "/arel/index.php", "http://www.junaio.com/publisherDownload/tutorial/tracking_tutorial.zip");

//return the metaio man on coordinate system 1 / reference image 1
$oObject = ArelXMLHelper::createGLUEModel3D(
		"1",	//ID 
	"http://dev.junaio.com/publisherDownload/tutorial/metaioman.md2", //model Path 
	"http://dev.junaio.com/publisherDownload/tutorial/metaioman.png", //texture Path
	array(0,-100,0), //translation
	array(3,3,3), //scale
	new ArelRotation(ArelRotation::ROTATION_EULERDEG, array(-90,0,0)), //rotation
	1 //CoordinateSystemID
);

//output the object
ArelXMLHelper::outputObject($oObject);

//end the output
ArelXMLHelper::end();