<?php
    namespace phpUnitPCHOME\Test;

/*    class DrupalWebtestBase extends \PHPUnit_Extensions_Selenium2TestCase
    {

    public function setUpPage()
    {
        parent::setUpPage();

        if( $this->width && $this->height )
        {
            $this->window('');
            $window = $this->currentWindow();
            $window->size( array(
                'width'     => $this->width,
                'height'    => $this->height) );
        }
    }
    }*/

    class WebTest extends \PHPUnit_Extensions_Selenium2TestCase
    {
        /*
        protected $captureScreenshotOnFailure = TRUE;
        protected $screenshotPath = './';

         */

        public static $browsers = array(
 /*           array(
                'browserName'    => 'firefox',
                'host'    => '127.0.0.1',
                'port'    => 4444
            ),*/
            array(
                'ie.enableFullPageScreenshot'   =>  false,
                'browserName'   => 'internet explorer',
                'host'          => '192.168.56.103',
                'port'          => 4444
            ),
            array(
                'browserName'   => 'chrome',
                'host'          => '127.0.0.1',
                'port'          => 4444
            )
        );

        public $keywords = array('sony', 'asus', 'apple');
        protected function setUp()
        {
            //$this->setHost('10.0.2.15');
            //$this->setport(4444);
            $this->setBrowserUrl('http://www.pchome.com.tw/');
            //$this->setBrowser('chrome');
        }

        public function testTitle2()
        {
            //$this->setHost('10.0.2.15');
//            $this->url('http://www.whatsmybrowser.org/');
            //            sleep(10);
            $this->url('http://24h.pchome.com.tw/');
//            $this->assertEquals('PChome 24h購物', $this->title());
            $this->currentWindow()->maximize();
            foreach($this->keywords as $v)
            {
                $this->byId('keyword')->clear();
                $this->byId('keyword')->value($v);
                $this->byId('doSearch')->click();
                //$this->timeouts()->implicitWait(25000);
                sleep(2);
                $this->screenshot( __DIR__.'/'.$this->getName().'-' .$this->getBrowser(). '-' .time(). '.png');
                $this->url('http://24h.pchome.com.tw/');
            }
        }


        public function screenshot($file) 
        {
            $filedata = $this->currentScreenshot();
            file_put_contents($file, $filedata);
        }
    }
?>
