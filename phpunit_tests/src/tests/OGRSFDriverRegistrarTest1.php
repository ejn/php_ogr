<?php

class OGRSFDriverRegistrarTest1 extends PHPUnit_Framework_TestCase {
    var $strPathToData;
    var $bUpdate;
    var $hOGRSFDriver;
    var $strFilename;

    // called before the test functions will be executed
    // this function is defined in PHPUnit_Framework_TestCase and overwritten 
    // here
    function setUp() {
        $this->strPathToData = "./dataBad/mif";
        $this->strFilename = "road.tab";
        $this->bUpdate = FALSE;
        $this->hOGRSFDriver = null;
    }
    // called after the test functions are executed    
    // this function is defined in PHPUnit_Framework_TestCase and overwritten 
    // here    
    function tearDown() {
        // delete your instance
        unset($this->strPathToData);
        unset($this->strFilename);
        unset($this->bUpdate);
        unset($this->hOGRSFDriver);
    }
/***********************************************************************
*                       testOGROpen0()
*
************************************************************************/

    function testOGROpen0() {
        $hDS = @OGROpen($this->strPathToData, $this->bUpdate, 
                          $this->hOGRSFDriver);

        $this->assertNull($hDS, "Problem with OGROpen():  handle ".
                             "is supposed to be NULL when a bad path ".
                             "is entered.");

        $this->assertNull($this->hOGRSFDriver, "Problem with OGROpen():  ".
                             "hOGRSFDriver is supposed to be NULL ".
                             "when a bad path is specified.");

    }
/***********************************************************************
*                       testOGROpen1()
*
************************************************************************/

    function testOGROpen1() {
        OGRRegisterAll();

        $hDS = @OGROpen($this->strPathToData, $this->bUpdate, 
                          $this->hOGRSFDriver);

        $this->assertNull($hDS, "Problem with OGROpen():  handle ".
                             "is supposed to be NULL when a bad path ".
                             "is entered eventhough, all drivers are ".
                             "registered.");

        $this->assertNull($this->hOGRSFDriver, "Problem with OGROpen():  ".
                             "hOGRSFDriver is supposed to be NULL ".
                             "when a bad path is specified, eventhough ".
                             "all drivers are registered.");
    }
}

?> 
